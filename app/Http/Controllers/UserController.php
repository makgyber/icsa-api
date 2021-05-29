<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserMeta;
use App\Traits\ApiResponser;

class UserController extends Controller
{
    use ApiResponser;

    public function profile(Request $request) {

        return $this->success(['base' => $request->user(), 'profile' => $request->user()->profile()]);

    }

}
