<?php


    namespace App\Http\Controllers;


    use App\Repositories\Interfaces\ChatRoomRepository;
    use App\Repositories\Interfaces\UserRepository;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;
    use Psy\Util\Json;
    use Symfony\Component\Console\Input\Input;
    use function Symfony\Component\Translation\t;

    class ChatRoomController
    {
        private $chatRoomRepository;
        private $userRepository;
        public function __construct(ChatRoomRepository $chatRoomRepository, UserRepository $userRepository)
        {
            $this->chatRoomRepository = $chatRoomRepository;
            $this->userRepository = $userRepository;
        }

        public function findChatRoom(Request $request) {
            $recipient_id = $request['recipientId'];
            $sender_id = $request['senderId'];

            $recipient = $this->userRepository->findById($recipient_id);
            $sender = $this->userRepository->findById($sender_id);

            $chat_room = $this->chatRoomRepository->findBySenderIdAndRecipientId($sender_id, $recipient_id);

            if ($chat_room == null) {
                $chat_room = $this->chatRoomRepository->create($sender, $recipient);
            }

            $this->chatRoomRepository->chatOpened($sender_id, $chat_room->id);

            return $chat_room;
        }

        public function getRoomMessages(Request $request) {
            $chat_id = $request['chatId'];
            //Это получатель сообщений
            $user_id = $request['userId'];
            //$messages = $this->chatRoomRepository->getRoomMessages($chat_id);

//            $answer = [];
//
//            foreach ($messages as $message) {
//                $user = $this->userRepository->findByName($message->recipient_name);
//            }
            Log::debug($this->chatRoomRepository->getRoomMessages($chat_id, $user_id));
            return $this->chatRoomRepository->getRoomMessages($chat_id, $user_id);
        }
    }
