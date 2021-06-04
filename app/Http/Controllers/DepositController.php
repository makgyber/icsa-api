<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepositRequest; 
use App\Models\Deposit; 

class DepositController extends Controller
{
    public function deposit(DepositRequest $request) {
        $data = $request->validated();


        if ($file = $request->file('photo')) {
            $path = $file->storePublicly('public/files');
            $name = $file->getClientOriginalName();
  
            $data['user_id'] = request()->user()->ID;
            $data['photo'] =  env('APP_URL') . str_replace('public/', 'storage/', $path);
            //store your file into directory and db
            Deposit::create($data);
               
            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
   
        }
    }
}
