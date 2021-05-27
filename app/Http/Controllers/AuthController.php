<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Validation\ValidationException;
use MikeMcLin\WpPassword\Facades\WpPassword;
use App\Models\User;

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

    public function logout(Request $request) {

        $request->user()->tokens()->delete();
        return $this->success('Logout success');
    }
}
