<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            font-family: 'Segoe UI', sans-serif;
        }
        .main-container {
            display: flex;
        }
        .content-area {
            flex: 1;
            padding: 30px;
        }
        .card {
            border-radius: 18px;
            box-shadow: 0 6px 24px rgba(41,128,185,0.10);
            border: none;
        }
        .card-header {
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 1px;
            background: linear-gradient(90deg, #2980b9 60%, #6dd5fa 100%);
            color: #fff;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary, .btn-success {
            background: linear-gradient(90deg, #2980b9 60%, #6dd5fa 100%);
            border: none;
            font-weight: 600;
            letter-spacing: 1px;
            box-shadow: 0 2px 8px rgba(41,128,185,0.10);
        }
        .btn-primary:hover, .btn-success:hover {
            background: linear-gradient(90deg, #1f618d 60%, #2980b9 100%);
        }
        .card-body {
            background: #fff;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    <div class="main-container">
        @include('layouts.sidebar')

        <div class="content-area">


            <div class="d-flex justify-content-center gap-4 flex-wrap">
                <div class="card flex-fill" style="max-width: 600px; min-width: 320px; min-height: 600px;">
                    <div class="card-header">Add New User</div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('create.submit') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="student_staff_id" class="form-label">Student/Staff ID</label>
                                <input type="text" class="form-control" id="student_staff_id" name="student_staff_id" value="{{ old('student_staff_id') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Registering as</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="" disabled selected>Select a role</option>
                                    <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                                    <option value="lecturer" {{ old('role') == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email (optional)</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">Register User</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card flex-fill d-flex flex-column" style="max-width: 600px; min-width: 320px; min-height: 600px;">
                    <div class="card-header">Create New Group</div>
                    <div class="card-body d-flex flex-column flex-grow-1 p-4">
                        <form method="POST" action="{{ route('group.create') }}" class="d-flex flex-column h-100">
                            @csrf

                            <div class="mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <input type="text" class="form-control" id="group_name" name="group_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="lecturer_id" class="form-label">Select Lecturer</label>
                                <select multiple class="form-select" id="lecturer_id" name="lecturer_id[]" required>
                                    @foreach($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id }}">{{ $lecturer->name }} ({{ $lecturer->student_staff_id }})</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Hold Ctrl (or Cmd on Mac) to select one or more lecturers</small>
                            </div>

                            <div class="mb-3">
                                <label for="students" class="form-label">Select Students</label>
                                <select multiple class="form-select" id="students" name="students[]" required>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->student_staff_id }})</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Hold Ctrl (or Cmd on Mac) to select multiple students</small>
                            </div>

                            <div class="d-grid mt-auto">
                                <button type="submit" class="btn btn-success btn-lg">Create Group</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
