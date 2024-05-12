<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function login(AdminLoginRequest $request){

        if(auth()->guard('admin')->attempt(['username'=>$request->input("username"),'password'=>$request->input("password")]))
        {

          return redirect()->route('admin.dashboard');
        }
        return redirect()->route('get.admin.login')->with(['error'=>'هناك خطأ في البيانات']);
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('get.admin.login');
    }
}
