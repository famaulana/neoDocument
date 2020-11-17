<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectModel;
use Session;

class dashboardController extends Controller
{
    public function index()
    {
        if(Session::get('login') != null){
            
            $project = projectModel::getNameProject();
            $data = array(
                'title' => 'dashboard',
                'project' => $project,
            );
            return view('pages/dashboard', $data);
        }else{
            return redirect('/login');
        }
    }
}
