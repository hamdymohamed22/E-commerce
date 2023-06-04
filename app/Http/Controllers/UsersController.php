<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function all_users(){
        $users = User::all();
        $admin = Auth::user();
        return view('admin.all_users',compact('users','admin'));
    }
    public function promote($id){
        $user = User::findorfail($id);
        if ($user) {
            if ($user->role != "admin") {
                $user->role = 'admin';
                $user->save();
                return redirect()->route('all_users')->with('success',"user promoted successfuly");
            }else {
                return redirect()->route('all_users')->with('wrong',"user is already admin");
            }
        }
    }

    public function down($id){
        $user = User::findorfail($id);
        if ($user) {
            if ($user->role != "user") {
                $user->role = 'user';
                $user->save();
                return redirect()->route('all_users')->with('success',"user down successfuly");
            }else {
                return redirect()->route('all_users')->with('wrong',"user is already user");
            }
        }
    }
}
