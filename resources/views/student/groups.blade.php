@extends('layouts.app')
@section('title', 'My Groups')
@section('content')
<h1>My Groups</h1>
<ul class="list-group mb-4">
    @forelse($groups as $group)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $group->name }}
            <a href="{{ route('group.chat', $group->id) }}" class="btn btn-success btn-sm">Group Chat</a>
        </li>
    @empty
        <li class="list-group-item">You are not in any groups.</li>
    @endforelse
</ul>
@endsection
