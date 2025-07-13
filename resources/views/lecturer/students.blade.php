
@extends('layouts.app')
@section('title', 'My Students')

@section('content')
<h1>My Students</h1>

<div class="mb-3">
    <input type="text" id="student-search" class="form-control" placeholder="Search students by name or email...">
</div>

<table class="table table-bordered table-hover" id="students-table">
    <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <a href="{{ route('private.chat', $student->id) }}" class="btn btn-primary btn-sm">Chat</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('scripts')
<script>
    document.getElementById('student-search').addEventListener('input', function() {
        const search = this.value.toLowerCase();
        document.querySelectorAll('#students-table tbody tr').forEach(function(row) {
            const name = row.children[0].textContent.toLowerCase();
            const email = row.children[1].textContent.toLowerCase();
            row.style.display = (name.includes(search) || email.includes(search)) ? '' : 'none';
        });
    });
</script>
@endpush
@endsection