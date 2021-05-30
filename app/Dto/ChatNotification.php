<?php


    namespace App\Dto;


    class ChatNotification
    {
        protected $fillable = [
            'message_id',
            'sender_id',
            'recipient_id'
        ];
    }
