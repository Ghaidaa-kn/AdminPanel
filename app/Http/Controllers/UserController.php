<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request){
    	$this->validate($request,[
            'email' => 'required | email',
            'password' => 'required'
        ]);
    	$user = User::where('email' , $request->email)->first( );
    	if(!$user || !Hash::check($request->password , $user->password)){
    		return redirect()->back()->withErrors(['error' => 'Email or password Error']);
    	}else{
    		echo redirect('/getEmployees');
    	}
    }
}
