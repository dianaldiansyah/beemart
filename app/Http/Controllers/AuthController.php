<?php

namespace App\Http\Controllers;


use Response;
use Session;
use App\Models\Staff;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('pages.login');
    }

    public function validateLogin(Request $request) {
        try{
            $username = $request->username;
            $password = $request->password;
            $account = Staff::where('username',$username)->first();
            if(!$account){
                return Response::json([
                    'error' => true, 
                    'msg' => 'Your account is not registered.'
                ]);
            }
            if( Hash::check($password, $account->password) ){
                Session::put('account_id', $account->id);
                Session::put('username', $account->username);
                Session::put('name', $account->name);


                return Response::json([
                    'error' => false, 
                    'msg' => 'Login Successful. Redirecting to Dashboard...'
                ]);
            }else{
                return Response::json([
                    'error' => true, 
                    'msg' => 'Username or Password invalid.'
                ]);
            }
        }catch(\Exception $e){
            return Response::json([
                'error' => true, 
                'msg' => 'Login Failed.'
            ]);
        }
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        return redirect('/login');
    }
}
