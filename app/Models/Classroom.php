<?php

namespace App\Models;

class Classroom
{
    protected static $data = [
        'students' => [
            ['name' => 'John Doe', 'age' => 20, 'id' => 1],
            ['name' => 'Jane Smith', 'age' => 22, 'id' => 2],
            ['name' => 'Sam Brown', 'age' => 19, 'id' => 3],
        ],
        'teachers' => [
            ['name' => 'Mr. Smith', 'subject' => 'Math', 'id' => 1],
            ['name' => 'Ms. Johnson', 'subject' => 'Science', 'id' => 2],
            ['name' => 'Mrs. Brown', 'subject' => 'English', 'id' => 3],
        ],
    ];


    // Students
    // get all students
    public static function getStudents()
    {
        return self::$data['students'];
    }

    // get student by id
    public static function getStudentById($id)
    {
        $students = self::getStudents();
        $student = array_filter($students, function($student) use ($id) {
            return $student['id'] == $id;
        });
        return array_values($student)[0] ?? null;
    }

    // create student
    public static function createStudent($data)
    {
        $students = self::getStudents();
        $id = count($students) + 1;
        $data['id'] = $id;
        self::$data['students'][] = $data;
        return $data;
    }

    // delete student by id
    public static function deleteStudent($id)
    {
        $students = self::getStudents();
        $students = array_filter($students, function($student) use ($id) {
            return $student['id'] != $id;
        });
        self::$data['students'] = array_values($students);
        return true;
    }

    // patch exitsing student by id
    public static function patchStudent($id, $data)
    {
        $student = self::getStudentById($id);
        if ($student) {
            $student = array_merge($student, $data);
            return $student;
        }
        return null;
    }


    // Teachers
    // get all teachers
    public static function getTeachers()
    {
        return self::$data['teachers'];
    }

    // get teacher by id
    public static function getTeacherById($id)
    {
        $teachers = self::getTeachers();
        $teacher = array_filter($teachers, function($teacher) use ($id) {
            return $teacher['id'] == $id;
        });
        return array_values($teacher)[0] ?? null;
    }

    // create teacher
    public static function createTeacher($data)
    {
        $teachers = self::getTeachers();
        $id = count($teachers) + 1;
        $data['id'] = $id;
        self::$data['teachers'][] = $data;
        return $data;
    }

    // delete teacher by id
    public static function deleteTeacher($id)
    {
        $teachers = self::getTeachers();
        $teachers = array_filter($teachers, function($teacher) use ($id) {
            return $teacher['id'] != $id;
        });
        self::$data['teachers'] = array_values($teachers);
        return true;
    }

    // patch exitsing teacher by id
    public static function patchTeacher($id, $data)
    {
        $teacher = self::getTeacherById($id);
        if ($teacher) {
            $teacher = array_merge($teacher, $data);
            return $teacher;
        }
        return null;
    }
}