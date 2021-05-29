<?php

namespace App\Models;

use App\Models\Users;
use Illuminate\Support\Facades\Validator;
use MikeMcLin\WpPassword\Facades\WpPassword;

class CreateUser 
{

    public function create(array $input) {
        
        $validator = Validator::make($input, [
            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:isv_users']
        ])->validate();
        
        $input['user_pass'] = WpPassword::make($input['user_pass']);
        // $input['user_nicename'] = str_replace(['.','@'], ['-'], $input['user_nicename']);
 
        return User::create($input);
    }

}
