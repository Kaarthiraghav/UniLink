@extends('layouts.app')
@section('title', 'Group Chat')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Group Chat: {{ $group->name }}</h1>
    <div class="card">
        <div class="card-body">
            <div id="chat-messages" style="height:300px; overflow-y:auto; background:#f8f9fa; border-radius:6px; padding:16px; margin-bottom:16px;">
                @if(isset($messages) && $messages->count())
                    @foreach($messages as $msg)
                        <div style="margin-bottom:10px;">
                            <strong>{{ $msg->user->name ?? 'Unknown' }}:</strong>
                            <span>{{ $msg->message }}</span>
                            <span class="text-muted" style="font-size:12px;">{{ $msg->created_at->format('H:i') }}</span>
                        </div>
                    @endforeach
                @else
                    <div class="text-muted">No messages yet.</div>
                @endif
            </div>
            <form id="chat-form" action="{{ route('group.chat.send', $group->id) }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" id="message" name="message" class="form-control" placeholder="Type your message..." required>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
