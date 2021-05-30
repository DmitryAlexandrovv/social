<?php


    namespace App\Repositories\Interfaces;


    use App\Models\User;

    interface UserRepository
    {
        public function findById($id);
        public function findByUsername($username, $user_id);
        public function getAll();
    }
