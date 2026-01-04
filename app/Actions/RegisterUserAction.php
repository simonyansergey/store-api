<?php

namespace App\Actions;

use DB;
use Hash;
use App\Models\User;
use App\Jobs\ProcessSendingMail;

class RegisterUserAction
{
    /**
     * @param array $data
     * @return User
     */
    public function __invoke(array $data): User
    {
        $data['password'] = Hash::make($data['password']);
        
        return DB::transaction(function () use ($data) {
            $user = User::create($data);
            ProcessSendingMail::dispatch($user->email)->afterCommit();

            return $user;
        });
    }
}
