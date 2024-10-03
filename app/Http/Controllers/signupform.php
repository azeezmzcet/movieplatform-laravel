<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class signupform extends Controller
{
    public function register(Request $request){
      $validator = Validator::make($request->all(),
        [        
          'name'=>'required',
          'email'=>'required|email',
          'password'=>'required',
          'c_password'=>'required|same:password'

        ]);

        if ($validator->fails()) {
            return response()->json(['message'=>'please  check the register'],400);

        }

        $data =$request->all();
        $data['password']=Hash::make($data['password']);
        $signuplist = User::create($data);
        logger('0');

        $tokenResult =$signuplist->createToken('asas');
       $res=$tokenResult->plainTextToken;
        return response()->json([
            "tokenName"=>$res,
            'tok.type'=>'Bearer'
            
        ],200);
    }

        
    


    public function login(Request $request){
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $signuplist = Auth::user();
            logger('1');

            $tokenResult =$signuplist->createToken('asas');
            logger('2');
            $res=$tokenResult->plainTextToken;
            return response()->json([
                'tokenNmae'=>$res,
                "toknType"=>'Bearer'
            ]
            ,200);
        }else{
            return response()->json(['message'=>'inlidate cridential error'],400);   
        }

    }

    public function detail(){

        $signuplist= Auth::user();   //DETAILS METHOAD IS IMPORTANT
       // $response['signuplist']=$signuplist;
        return response()->json($signuplist,200);

    }





    public function deleteUser($id) {
        
        $signuplist = User::find($id);
    
      
        if (!$signuplist) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        
        $signuplist->delete();
    
        
        return response()->json(['message' => 'User deleted successfully'], 200);
    }


    public function deleteAllUsers() {
        
        if (User::count() === 0) {
            return response()->json(['message' => 'No users found'], 404);
        }
    
        
        User::truncate();
    
       
        return response()->json(['message' => 'All users deleted successfully'], 200);
    }
    
    
};
