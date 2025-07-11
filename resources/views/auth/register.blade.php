<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - UniLink</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="border-radius:18px;overflow:hidden;">
                <div class="card-header text-center fw-bold bg-primary text-white" style="font-size:1.5rem;display:flex;align-items:center;justify-content:center;gap:16px;">
                    <img src="/logo.png" alt="UniLink Logo" style="height:48px;width:48px;border-radius:12px;background:#fff;object-fit:cover;box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                    UniLink &mdash; Register
                </div>
                <div class="card-body p-5">

                    {{-- Display Validation Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Register Form --}}
                    <form method="POST" action="{{ route('register.submit') }}">
                        @csrf


                        <div class="mb-3">
                            <label for="student_staff_id" class="form-label">Student/Staff ID</label>
                            <input type="text" class="form-control" id="student_staff_id" name="student_staff_id" value="{{ old('student_staff_id') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Registering as</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" disabled selected>Select your role</option>
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
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password (min. 8 characters)</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                        <div class="text-center mt-3">
                            Already registered? <a href="{{ route('login') }}">Login here</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
