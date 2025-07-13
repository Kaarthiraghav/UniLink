<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function groups()
    {
        $groups = Group::with('users.role')->get();
        return view('admin.groups', compact('groups'));
    }

    public function deleteGroup(Group $group)
    {
        $group->users()->detach(); // Detach all users from the group
        $group->delete(); // Delete the group
        return redirect()->route('groups.list')->with('success', 'Group deleted successfully.');
    }

    public function editGroup(Group $group)
    {
        // Get all lecturers
        $lecturers = User::whereHas('role', function ($q) {
            $q->where('name', 'lecturer');
        })->get();

        // Get all students
        $students = User::whereHas('role', function ($q) {
            $q->where('name', 'student');
        })->get();

        // Get IDs of lecturers in this group
        $groupLecturerIds = $group->users()->whereHas('role', function ($q) {
            $q->where('name', 'lecturer');
        })->pluck('users.id')->toArray();

        // Get IDs of students in this group
        $groupStudentIds = $group->users()->whereHas('role', function ($q) {
            $q->where('name', 'student');
        })->pluck('users.id')->toArray();

        return view('admin.editGroup', compact('group', 'lecturers', 'students', 'groupLecturerIds', 'groupStudentIds'));
    }

    public function updateGroup(Request $request, $groupId)
    {
        $group = Group::findOrFail($groupId);
        $group->name = $request->input('group_name');
        $group->save();

        // Sync lecturers and students via pivot table
        $lecturerIds = $request->input('lecturers', []);
        $studentIds = $request->input('students', []);
        $allUserIds = array_merge($lecturerIds, $studentIds);
        $group->users()->sync($allUserIds);

        return redirect()->route('groups.edit', $groupId)->with('success', 'Group updated successfully.');
    }

    public function users()
    {
        $users = User::with('role')->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('users.list')->with('success', 'User deleted successfully.');
    }

    public function editUser(User $user)
    {
        return view('admin.editUser', compact('user'));
    }

    public function index()
    {
        $lecturers = User::whereHas('role', function ($query) {
            $query->where('name', 'lecturer');
        })->get();
        $students = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->get();
        return view('admin.dashboard', compact('lecturers', 'students'));
    }

    public function createGroup(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255',
            'lecturer_id' => 'required|array',
            'students' => 'required|array',
        ]);

        $group = Group::create([
            'name' => $request->group_name,
        ]);

        // Attach only the selected lecturers and students
        $allUserIds = array_merge($request->lecturer_id, $request->students);
        $group->users()->attach($allUserIds);

        return redirect()->back()->with('success', 'Group created with students and lecturers.');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Attach the role to the user
        $user->roles()->attach($request->role);

        return redirect()->route('users.list')->with('success', 'User created successfully.');
    }


}
