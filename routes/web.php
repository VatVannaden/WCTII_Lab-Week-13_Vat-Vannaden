<?php

use Illuminate\Support\Facades\Route;
use App\Models\Classroom;

// Students
Route::get('/students', function () {
    return response()->json(Classroom::getStudents());
});

Route::get('/students/{id}', function ($id) {
    $student = Classroom::getStudentById($id);
    return $student ? response()->json($student) : response()->json(['message' => 'Student not found'], 404);
});

Route::post('/students', function () {
    $data = request()->all();
    $newStudent = Classroom::createStudent($data);
    return response()->json(['message' => 'Student created', 'data' => $newStudent], 201);
});

Route::delete('/students/{id}', function ($id) {
    return Classroom::deleteStudent($id) 
        ? response()->json(['message' => 'Student deleted']) 
        : response()->json(['message' => 'Student not found'], 404);
});

Route::patch('/students/{id}', function ($id) {
    $data = request()->all();
    $patchedStudent = Classroom::patchStudent($id, $data);
    return $patchedStudent 
        ? response()->json(['message' => 'Student updated', 'data' => $patchedStudent]) 
        : response()->json(['message' => 'Student not found'], 404);
});

// Teachers
Route::get('/teachers', function () {
    return response()->json(Classroom::getTeachers());
});

Route::get('/teachers/{id}', function ($id) {
    $teacher = Classroom::getTeacherById($id);
    return $teacher ? response()->json($teacher) : response()->json(['message' => 'Teacher not found'], 404);
});

Route::post('/teachers', function () {
    $data = request()->all();
    $newTeacher = Classroom::createTeacher($data);
    return response()->json(['message' => 'Teacher created', 'data' => $newTeacher], 201);
});

Route::delete('/teachers/{id}', function ($id) {
    return Classroom::deleteTeacher($id) 
        ? response()->json(['message' => 'Teacher deleted']) 
        : response()->json(['message' => 'Teacher not found'], 404);
});

Route::patch('/teachers/{id}', function ($id) {
    $data = request()->all();
    $patchedTeacher = Classroom::patchTeacher($id, $data);
    return $patchedTeacher 
        ? response()->json(['message' => 'Teacher updated', 'data' => $patchedTeacher]) 
        : response()->json(['message' => 'Teacher not found'], 404);
});