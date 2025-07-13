<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $groups = $user->groups;
        $lecturerRoleId = \App\Models\Role::where('name', 'lecturer')->value('id');
        $lecturers = \App\Models\User::where('role_id', $lecturerRoleId)->get();
        return view('student.dashboard', compact('groups', 'lecturers'));
    }
}
