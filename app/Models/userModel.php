<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class userModel extends Model
{
    protected $table = 'users';

    public function auth($data)
    {
        if(UserModel::where('email', $data['email'])){
            $dataUser = UserModel::where('email', $data['email'])->first();
            if($dataUser['password'] == $data['password']){
                $dataSession = array(
                    'email' => $dataUser['email'],
                    'name' => $dataUser['name'],
                    'division' => $dataUser['division'],
                    'role' => $dataUser['role'],
                    'status' => true
                );
                Session::put('login', $dataSession);
                return true;
            }else{
                return false;
            }
        }
    }
}
