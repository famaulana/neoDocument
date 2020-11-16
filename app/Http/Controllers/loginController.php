<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use Session;

class loginController extends Controller
{
    public function index(){
        if(Session::get('login') == null){
            return view('login');
        }else{
            return redirect('/dashboard');
        }
    }

    public function auth(Request $request)
    {
        $userModel = new userModel();
        if(!empty($request->input('email')) && !empty($request->input('password'))){
            if ($userModel->auth($request->all())){
                return redirect('/dashboard');
            }else{
                Session::flash('status', 'Please input username/password correctly!!');
                return redirect('/login');
            }
        } else{
            Session::flash('status', 'Please fill username/password fields!!');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Session::forget('login');
        return redirect('/login');
    }

}
