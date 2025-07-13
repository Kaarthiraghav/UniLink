@extends('layouts.app')
@section('title', 'My Groups')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">My Groups</h1>
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Groups You Are Part Of</h5>
            </div>
            <div class="card-body p-0">
                @if(isset($groups) && count($groups) > 0)
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Members</th>
                                <th>Chat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $group->users->count() }}</td>
                                    <td>
                                        <a href="{{ route('group.chat', $group->id) }}" class="btn btn-outline-primary btn-sm">Group Chat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="p-3 text-muted">You are not part of any groups.</div>
                @endif
            </div>
        </div>
    </div>
@endsection