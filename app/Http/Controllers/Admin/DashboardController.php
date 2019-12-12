<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;


class DashboardController extends Controller
{
    public function adduser(){
        return view('admin.adduser');
    }

    public function insertuser(Request $req){
        $user = new User();  
        $user->name = $req->username;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->password = $req->password;
        if($user->save()){
            return redirect('/role-register');
        }else{
            return redirect('/adduser');
        }
    }
}
