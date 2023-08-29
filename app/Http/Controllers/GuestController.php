<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function ganti_password(Request $request){
        $user = Users::where('email', $request->email)->get();
        $email_user = array();
        $name_user = array();
        $nohp_user = array();
        $id_user = array();
        foreach ($user as $users){
            $email_user[] =  $users->email ;
            $name_user[] =  $users->name ;
            $nohp_user[] =  $users->nohp ;
            $id_user[] =  $users->id ;
        }
        if(count($user) > 0){
                if ($email_user[0] == $request->email and $name_user[0] == $request->name and $nohp_user[0] == $request->nohp){
                $id_userr = Users::find($id_user[0]);
                $id_userr->password =  Hash::make($request->password) ;
                 $id_userr->save();
                return Redirect()->route('login')->with('success','password berhasil di ubah');
            }
        }
        return Redirect()->route('ganti_password')->with('error','akun tidak di temukan');
    }
    public function ganti_password_home(){
        return view('ganti_password');
    }
}
