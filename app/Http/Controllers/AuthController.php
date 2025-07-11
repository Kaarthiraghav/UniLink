<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'student_staff_id' => 'required|string|unique:users,student_staff_id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:student,lecturer,admin',
        ]);

        $roleId = \App\Models\Role::where('name', $validated['role'])->value('id');

        $user = User::create([
            'student_staff_id' => $validated['student_staff_id'],
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'password' => bcrypt($validated['password']),
            'role_id' => $roleId,
        ]);

        Auth::login($user);

        return match ($validated['role']) {
            'admin' => redirect('/admin/dashboard'),
            'lecturer' => redirect('/lecturer/dashboard'),
            'student' => redirect('/student/dashboard'),
        };
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'student_staff_id' => 'required|string|unique:users,student_staff_id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:student,lecturer,admin',
        ]);

        $roleId = \App\Models\Role::where('name', $validated['role'])->value('id');

        $user = User::create([
            'student_staff_id' => $validated['student_staff_id'],
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'password' => bcrypt($validated['password']),
            'role_id' => $roleId,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'student_staff_id' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::with('role')->where('student_staff_id', $credentials['student_staff_id'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();

            $role = $user->role_id;
            // $roleName = ($role && is_object($role)) ? $role->name : null;
            // dump($roleName);
            // dump($role);
            if ($role === 1) {
                return redirect('/admin/dashboard');
            } elseif ($role === 2) {
                return redirect('/lecturer/dashboard');
            } elseif ($role === 3) {
                return redirect('/student/dashboard');
            } else {
                // dump("Invalid role");
                Auth::logout();
                return back()->withErrors(['student_staff_id' => 'Your account does not have a valid role.']);
            }
        }
        // dump($user);
        // dump($credentials);

        return back()->withErrors(['student_staff_id' => 'Invalid ID or password.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
