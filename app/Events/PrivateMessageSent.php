<?php

namespace App\Events;

use App\Models\PrivateChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PrivateMessageSent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $chatId;
    public $senderId;
    public $receiverId;

    public function __construct(PrivateChatMessage $message, $receiverId)
    {
        $this->message = $message->load('user');
        $this->chatId = $message->private_chat_id;
        $this->senderId = $message->user_id;
        $this->receiverId = $receiverId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('private-chat.' . $this->chatId . '.' . $this->receiverId);
    }

    public function broadcastWith()
    {
        return [
            'message' => [
                'id' => $this->message->id,
                'user' => [
                    'id' => $this->message->user->id,
                    'name' => $this->message->user->name,
                ],
                'message' => $this->message->message,
                'created_at' => $this->message->created_at->toDateTimeString(),
            ]
        ];
    }
}
