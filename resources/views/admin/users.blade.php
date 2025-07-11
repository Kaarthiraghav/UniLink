@extends('layouts.app')

@section('title', 'All Users')

@section('content')
<div class="container">
    <h2 class="mb-4">All Lecturers</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Staff ID</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users->where('role.name', 'lecturer') as $lecturer)
                <tr>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->student_staff_id }}</td>
                    <td>{{ $lecturer->email ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('users.delete', $lecturer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                        <a href="{{ route('users.edit', $lecturer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mb-4 mt-5">All Students</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Student ID</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users->where('role.name', 'student') as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->student_staff_id }}</td>
                    <td>{{ $student->email ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('users.delete', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                        <a href="{{ route('users.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mb-4 mt-5">All Admins</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Staff ID</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users->where('role.name', 'admin') as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->student_staff_id }}</td>
                    <td>{{ $admin->email ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('users.delete', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                        <a href="{{ route('users.edit', $admin->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
