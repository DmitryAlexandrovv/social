<?php


    namespace App\Repositories;


    use App\Models\User;
    use App\Repositories\Interfaces\UserRepository;
    use Illuminate\Support\Facades\Log;

    class SocialUserRepository implements UserRepository
    {

        public function findById($id)
        {
            $user = User::where('id', $id)->first();

            if ($user) {
               return $user;
            }

            return null;
        }

        public function getAll()
        {
            return User::all();
        }

        //TODO переписать без id(вынести логику)
        public function findByUsername($username, $user_id)
        {
            return User::where('username', 'like', $username.'%')
                ->where('id', 'not like', $user_id)
                ->get();
        }

        public function findByName($name)
        {
            return User::where('name', 'like', $name.'%')
                ->get();
        }
    }
