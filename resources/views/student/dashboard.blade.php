@extends('layouts.app')
@section('title', 'Student Dashboard')
@section('content')
<h1>Student Dashboard</h1>
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Welcome, {{ Auth::user()->name }}!</h5>
        <p class="card-text">Here you can quickly view your group and chat activity.</p>
        <ul>
            <li><strong>Groups:</strong> {{ $groups->count() }}</li>
            <li><strong>Lecturers available for chat:</strong> {{ $lecturers->count() }}</li>
        </ul>
        <p class="text-muted">Use the sidebar to access your groups and chats.</p>
    </div>
</div>
@endsection