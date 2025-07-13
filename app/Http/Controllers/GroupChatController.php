<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupChatMessage;

class GroupChatController extends Controller
{
    public function show($groupId)
    {
        $group = Group::with('users')->findOrFail($groupId);
        $messages = GroupChatMessage::where('group_id', $groupId)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('chat.group', compact('group', 'messages'));
    }

    public function send(Request $request, $groupId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);
        $group = Group::findOrFail($groupId);
        $user = $request->user();
        GroupChatMessage::create([
            'group_id' => $group->id,
            'user_id' => $user->id,
            'message' => $request->message,
        ]);
        return back();
    }
}
