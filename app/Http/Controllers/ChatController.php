<?php

namespace App\Http\Controllers;

use App\Dto\MessageStatus;
use App\Events\ChatNotification;
use App\Models\ChatMessage;
use App\Models\User;
use App\Providers\RepositoryServiceProvider;
use App\Repositories\Interfaces\ChatRoomRepository;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\SocialUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    private $userRepository;
    private $chatRoomRepository;

    public function __construct(UserRepository $userRepository, ChatRoomRepository $chatRoomRepository)
    {
        $this->userRepository = $userRepository;
        $this->chatRoomRepository = $chatRoomRepository;
    }

    public function index(Request $request)
    {
        $message = $request->input('message', '');
        $chat_id = $request->input('chatId', '');
        $recipient_id = $request->input('recipientId', '');
        $sender_id = $request->input('senderId', '');

        $recipient = $this->userRepository->findById($recipient_id);
        $sender = $this->userRepository->findById($sender_id);

        $chatRoom = $this->chatRoomRepository->findById($chat_id);

        if ($chatRoom === null) {
            $chatRoom = $this->chatRoomRepository->create($sender, $recipient);
        }

        $chatMessage = ChatMessage::create([
            'content' => $message,
            'recipient_id' => $recipient->id,
            'recipient_name' => $recipient->name,
            'sender_id' => $sender->id,
            'sender_name' => $sender->name,
            'status' => MessageStatus::RECEIVED(),
            'chat_id' => $chatRoom->id
        ]);
        Log::debug('send new message');
        if ($chatMessage) {
            event(new ChatNotification($chatMessage, $sender, $recipient));
            return $chatMessage;
        }
    }
}
