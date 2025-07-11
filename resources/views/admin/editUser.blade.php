@extends('layouts.app')
@section('title', 'Edit User')
@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h3 class="mb-0"><i class="bi bi-person-lines-fill me-2"></i>Edit User: {{ $user->name }}</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="student_staff_id" class="form-label">Student/Staff ID</label>
                                <input type="text" class="form-control form-control-lg" id="student_staff_id" name="student_staff_id" value="{{ old('student_staff_id', $user->student_staff_id) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select form-select-lg" id="role" name="role" required>
                                    <option value="" disabled>Select a role</option>
                                    <option value="student" {{ $user->role->name == 'student' ? 'selected' : '' }}>Student</option>
                                    <option value="lecturer" {{ $user->role->name == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                                    <option value="admin" {{ $user->role->name == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="password" class="form-label">Password <span class="text-muted" style="font-size:0.9em;">(leave blank to keep current)</span></label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password" autocomplete="new-password">
                            </div>
                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg shadow-sm">
                                <i class="bi bi-save me-2"></i>Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection