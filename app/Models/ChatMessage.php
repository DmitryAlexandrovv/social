<?php

namespace App\Models;

use App\Dto\MessageStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ChatMessage extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'chat_message';

    protected $fillable = [
        'content',
        'recipient_id',
        'recipient_name',
        'sender_id',
        'sender_name',
        'status',
        'chat_id'
    ];

//    protected $casts = [
//        'status' => MessageStatus::class,
//    ];

    public function getId(): int
    {
        return 1;
    }
}
