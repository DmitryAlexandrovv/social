<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OpenChats extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'users_open_chats';

    protected $fillable = [
        'content',
        'user_id',
        'open_chats_id'
    ];
}
