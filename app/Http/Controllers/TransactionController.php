<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class TransactionController extends Controller
{ 
    use ApiResponser;
    public function show(Request $request) {
        return $this->success(['transactions' => $request->user()->transactions]);
    }
}
