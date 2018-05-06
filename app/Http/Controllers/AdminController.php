<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //
    public function login(){
      //  Auth::logout();
        return view('admins.login');
    }
    public function check(Request $request,Admin $admin){
        $t=$admin->where('name','=',$request->name);
        if($t->first()) {
            $t=$t->first();
            if ($t->password==md5($request->password)) {
                echo "<script>window.location.href='http://localhost/Boss/public/admin';</script>";
            } else {
                return back()->with('warning', '密码用户名不匹配');
            }
        }else {
            return back()->with('warning', '密码用户名不匹配');
        }
    }
}
