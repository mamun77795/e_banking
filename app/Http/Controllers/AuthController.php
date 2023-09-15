<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function auth(Request $request){
        $email = $request->email;
        $password = $request->password;
        
        $u = DB::select("select * from users where email='$email'");
        if(count($u)==1 && Hash::check($password, $u[0]->password)){

            $session_id=session()->getId();  
            session(['sess_id'=>$session_id,
                     'sess_user_id'=>$u[0]->id,
                     'sess_user_name' =>$u[0]->name,
                     'sess_email'=>$u[0]->email,
                     ]); 
            return redirect("/users");
        }else{
            return redirect("/");
        }
        
    }

    public function logout(){
        session()->forget(['sess_id', 'sess_user_id','sess_user_name','sess_email']);
        session()->flush();
        session()->regenerate();  
        return redirect("/");    
      }
}
