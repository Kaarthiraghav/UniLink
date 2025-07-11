
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Groups Management</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Group Name</th>
                <th>Lecturers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>
                        @foreach($group->users->where('role.name', 'lecturer') as $lecturer)
                            <span class="badge bg-primary">{{ $lecturer->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('groups.delete', $group->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this group?')">Delete</button>
                        </form>
                        <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
