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

    public function showRenameGroup(Group $group)
    {
        return view('admin.rename-group', compact('group'));
    }

    public function renameGroup(Request $request, Group $group)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $group->name = $request->name;
        $group->save();
        return redirect()->route('groups.list')->with('success', 'Group renamed successfully.');
    }

    public function deleteGroup(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.list')->with('success', 'Group deleted successfully.');
    }

    public function showAddUsers(Group $group)
    {
        $lecturers = User::whereHas('role', function ($query) {
            $query->where('name', 'lecturer');
        })->get();
        $students = User::whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->get();
        return view('admin.add-users', compact('group', 'lecturers', 'students'));
    }

    public function addUsers(Request $request, Group $group)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);
        $group->users()->syncWithoutDetaching($request->user_ids);
        return redirect()->route('groups.list')->with('success', 'Users added to group successfully.');
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

}
