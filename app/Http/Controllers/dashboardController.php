<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class dashboardController extends Controller
{
    public function index()
    {
        if(Session::get('login') != null){
            $data = array(
                'title' => 'dashboard',
            );
            return view('pages/dashboard', $data);
        }else{
            return redirect('/login');
        }
    }
}
