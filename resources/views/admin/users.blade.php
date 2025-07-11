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
            </tr>
        </thead>
        <tbody>
            @foreach($lecturers as $lecturer)
                <tr>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->student_staff_id }}</td>
                    <td>{{ $lecturer->email }}</td>
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
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->student_staff_id }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
</div>
