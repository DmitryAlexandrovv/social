<?php


    namespace App\Repositories\Interfaces;


    use App\Models\ChatRoom;
    use App\Models\User;

    interface ChatRoomRepository
    {
        public function findBySenderIdAndRecipientId($senderId, $recipientId);
        public function findById($id);
        public function create(User $sender,User $recipient);
        public function getRoomMessages($chat_id, $user_id);
        public function chatOpened($user_id, $chat_id);
    }
