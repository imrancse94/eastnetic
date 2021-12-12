<?php

namespace App\Services;

use App\Models\User;

class UserService extends Service{

    public function addNewUser($inputData){
        return User::create($inputData);
    }
}