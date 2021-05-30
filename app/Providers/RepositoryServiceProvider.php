<?php

namespace App\Providers;

use App\Repositories\Interfaces\ChatRoomRepository;
use App\Repositories\Interfaces\UserRepository;
use App\Repositories\SocialChatRoomRepository;
use App\Repositories\SocialUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            SocialUserRepository::class
        );

        $this->app->bind(
            ChatRoomRepository::class,
            SocialChatRoomRepository::class
        );
    }
}
