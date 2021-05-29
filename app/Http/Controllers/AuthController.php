<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Validation\ValidationException;
use MikeMcLin\WpPassword\Facades\WpPassword;
use App\Models\User;
use App\Models\Account;
use App\Models\UserMeta;
use App\Models\CreateUser;
use App\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{
    use ApiResponser;

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        $user = User::where('user_email', $request->email)->first();
        
        if (! $user || !WpPassword::check($request->password, $user->user_pass)) {
            return $this->error('Credentials not match', 401);
        }
    
        return $this->success(
            [
                'token' => $user->createToken($request->device_name)->plainTextToken,
                'user' => $user
            ]
        );
    }

    public function register(RegistrationRequest $request) {

        $preValidated = $request->validated();
        $userCreator = new CreateUser();
        $user = $userCreator->create($preValidated['user']);

        //account
        Account::create([
            "created_date" => $user->user_registered,
            "balance"  => 0,
            "user_id"  =>  $user->ID  ,
            "account_type" => 'Savings',
            "status"    => 'Active'
        ]);

        // usermeta
        foreach( $preValidated['user_meta'] as $key => $value ) {
            UserMeta::create([
                'user_id' => $user->ID,
                'meta_key' => $key,
                'meta_value' => $value
            ]);
        }

        $token = $user->createToken($user->user_nicename)->plainTextToken;

        return $this->success(['user' => $user, 'token' => $token]);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return $this->success('Logout success');
    }
}
