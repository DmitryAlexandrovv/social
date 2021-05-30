<?php


    namespace App\Repositories;


    use App\Models\ChatMessage;
    use App\Models\ChatRoom;
    use App\Models\OpenChats;
    use App\Models\User;
    use App\Repositories\Interfaces\ChatRoomRepository;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;

    class SocialChatRoomRepository implements ChatRoomRepository
    {
        public function findBySenderIdAndRecipientId($sender_id, $recipient_id)
        {
            $chatRoom = ChatRoom::where('sender_id', $sender_id)
                ->where('recipient_id', $recipient_id)
                ->first();

            if ($chatRoom == null) {
                $chatRoom = ChatRoom::where('recipient_id', $sender_id)
                    ->where('sender_id', $recipient_id)
                    ->first();
            }

            return $chatRoom;
        }

        public function create(User $sender, User $recipient)
        {
            $chatRoom = ChatRoom::create([
                'sender_id' => $sender->id,
                'recipient_id' => $recipient->id
            ]);

            return $chatRoom;
        }

        public function findById($id)
        {
            return ChatRoom::where('id', $id)->first();
        }

        //TODO нужно переделать, творится дичь какая-то
        public function getRoomMessages($chat_id, $user_id)
        {
            return DB::table('chat_message')
                ->join('users', function($join)
                {
                    $join
                        ->on('users.id', '=', 'chat_message.recipient_id');
                })
                ->where('chat_id', '=', $chat_id)
                ->get(['chat_message.*', 'users.name', 'users.path_to_image']);
        }

        public function chatOpened($user_id, $chat_id)
        {
            $chat = OpenChats::where('user_id', $user_id)
                ->where('open_chats_id', $chat_id)
                ->first();

            if ($chat == null) {
                $chat = OpenChats::create([
                    'user_id' => $user_id,
                    'open_chats_id' => $chat_id
                ]);
            }

            Log::debug($chat);

            return $chat;
        }
    }
