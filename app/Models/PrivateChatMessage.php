<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivateChatMessage extends Model
{
    use HasFactory;
    protected $fillable = ['private_chat_id', 'user_id', 'message'];

    public function chat()
    {
        return $this->belongsTo(PrivateChat::class, 'private_chat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
