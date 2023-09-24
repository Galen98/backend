<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'hometown' => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
            'tipe'      => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // $tipe=$request->tipe;
        // if($tipe == 'family'){
        //     $family = "1";
        //     $backpacker = "0";
        //     $grup = "0";
        // }
        // if($tipe == 'backpacker'){
        //     $family = "0";
        //     $backpacker = "1";
        //     $grup = "0";
        // }
        // if($tipe == 'grup'){
        //     $family = "0";
        //     $backpacker = "0";
        //     $grup = "1";
        // }
        //create user
        $user = User::create([
            'name'      => $request->name,
            'hometown'      => $request->hometown,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'tipe' => $request->tipe
        ]);

        //create profil
        
        //return response JSON user is created
        if($user) {
            return response()->json([
                'success' => true,
                'user'    => $user,  
            
            ], 201);
        }

        

        //return JSON process insert failed 
        return response()->json([
            'success' => false,
        ], 409);
    }
}