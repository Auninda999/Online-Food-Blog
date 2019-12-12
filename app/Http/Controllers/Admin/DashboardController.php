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

    public function registered(){
        $users = User::all();
        return view('admin.register')->with('users', $users);
    }

    public function registeredit(Request $request, $id){
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users', $users);
    }

    public function registerupdate(Request $request, $id){
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->usertype = $request->input('usertype');
        $users->update();

        return redirect('/role-register')->with('status', 'User data updated');
    }

    public function registerdelete(Request $request, $id){
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')->with('status', 'User data removed');
    }
}
