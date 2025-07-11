<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturer = auth()->user();
        // Assuming a many-to-many relationship: $lecturer->groups
        $groups = $lecturer->groups()->with('users')->get();
        return view('lecturer.dashboard', compact('groups'));
    }

    public function groups()
    {
        $lecturer = auth()->user();
        // Assuming a many-to-many relationship: $lecturer->groups
        $groups = $lecturer->groups()->with('users')->get();
        return view('lecturer.groups', compact('groups'));
    }

    public function students()
    {
        $lecturer = auth()->user();
        // Get all students from all groups the lecturer is part of
        $groups = $lecturer->groups()->with('users.role')->get();
        $students = collect();
        foreach ($groups as $group) {
            $students = $students->merge(
                $group->users->where('role.name', 'student')->all()
            );
        }
        // Remove duplicates by user id
        $students = $students->unique('id');
        return view('lecturer.students', compact('students'));
    }
}
