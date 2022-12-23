<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPostLogin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('fake.login:user')->only(['index']);
    //     //$this->middleware('fake.login:user')->except('test');
    // }
    public function index(Request $request){

        return view('login.form_login');
    }
    public function test(){
        return "test";
    }
    public function handle(FormPostLogin $request){
        $user = $request->username;
        $pass = $request->password;
        if($user === 'admin' && $pass === '12345'){
            $request->session()->put('username',$user);
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error_login','tai khoan ko ton tai');
        }
    }
}
