<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
        return view ('admin.login');
    }

    public function auth(Request $request){
        $email = $request->post('email');
        $password = $request->post('password');
        //$result=Admin::Where(['email'=>$email,'password'=>$password])->get();
        $result=Admin::Where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'), $result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error','Please Enter Right password');
                return redirect('admin');
            }

        }else{
            $request->session()->flash('error','Please Enter valid email-id and password');
            return redirect('admin');
        }
    }
    public function dashboard(){
        return view('admin/dashboard');
    }

}
