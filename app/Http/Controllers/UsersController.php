<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ChatRoomRepository;
use App\Repositories\Interfaces\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll() {
        return $this->userRepository->getAll();
    }

    public function findById(Request $request) {
        $recipient_id = $request['recipientId'];
        return $this->userRepository->findById($recipient_id);
    }

    public function findByUsername(Request $request) {
        $username = $request['username'];
        $user = auth()->user();
        $users = $this->userRepository->findByUsername($username, $user->id);

//        $res = $users->filter(function ($value, $key) use ($user) {
//            return $value->id != $user->id;
//        });

        return $users;
    }
}
