@extends('layouts.app')
@section('title', 'My Chats')
@section('content')
<h1>Lecturers (Private Chat)</h1>
<div class="mb-3">
    <input type="text" id="lecturer-search" class="form-control" placeholder="Search lecturers by name or email...">
</div>
<table class="table table-bordered table-hover" id="lecturers-table">
    <thead class="table-light">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($lecturers as $lecturer)
            <tr>
                <td>{{ $lecturer->name }}</td>
                <td>{{ $lecturer->email }}</td>
                <td>
                    <a href="{{ route('private.chat', $lecturer->id) }}" class="btn btn-primary btn-sm">Chat</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
<script>
    document.getElementById('lecturer-search').addEventListener('input', function() {
        const search = this.value.toLowerCase();
        document.querySelectorAll('#lecturers-table tbody tr').forEach(function(row) {
            const name = row.children[0].textContent.toLowerCase();
            const email = row.children[1].textContent.toLowerCase();
            row.style.display = (name.includes(search) || email.includes(search)) ? '' : 'none';
        });
    });
</script>
@endpush
@endsection
