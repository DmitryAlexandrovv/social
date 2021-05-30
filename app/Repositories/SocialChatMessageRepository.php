<?php


    namespace App\Repositories;

    use App\Repositories\Interfaces\ChatMessageRepository;
    use Illuminate\Support\Facades\DB;

    class SocialChatMessageRepository implements ChatMessageRepository
    {

        public function findById($id)
        {
            return null;
        }
    }
