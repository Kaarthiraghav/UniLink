<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PrivateChat;
use App\Models\PrivateChatMessage;
use App\Models\User;
use App\Events\PrivateMessageSent;

class PrivateChatController extends Controller
{
    public function show($userId)
    {
        $user = auth()->user();
        $other = User::findOrFail($userId);
        $chat = PrivateChat::firstOrCreate([
            'user_one_id' => min($user->id, $other->id),
            'user_two_id' => max($user->id, $other->id)
        ]);
        $messages = $chat->messages()->with('user')->orderBy('created_at', 'asc')->get();
        return view('private.chat', compact('chat', 'other', 'messages'));
    }

    public function send(Request $request, $userId)
    {
        $request->validate(['message' => 'required|string|max:1000']);
        $user = auth()->user();
        $other = User::findOrFail($userId);
        $chat = PrivateChat::firstOrCreate([
            'user_one_id' => min($user->id, $other->id),
            'user_two_id' => max($user->id, $other->id)
        ]);
        $message = PrivateChatMessage::create([
            'private_chat_id' => $chat->id,
            'user_id' => $user->id,
            'message' => $request->message,
        ]);

        // Determine the receiver (the other user in the chat)
        $receiverId = ($user->id === $chat->user_one_id) ? $chat->user_two_id : $chat->user_one_id;
        broadcast(new PrivateMessageSent($message, $receiverId))->toOthers();

        return back();
    }
}
