<?php

namespace App\Services;

use App\Models\User;

class UserService extends Service{

    public function addNewUser($inputData){
        $inputData['password'] = bcrypt($inputData['password']);
        return User::create($inputData);
    }
}