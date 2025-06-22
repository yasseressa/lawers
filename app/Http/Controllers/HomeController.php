<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function get_all()
    {
        $type_list = DB::table('issue_types')->get();
        $lawyer_list = DB::table('users')->where('role_id','=','2')
            ->get();
        return view('layouts.home')->with(compact('type_list','lawyer_list'));
    }

    public function get_about()
    {
        return view('layouts.about');
    }

    public function get_contact()
    {
        return view('layouts.contact');
    }

    public function get_login()
    {
        return view('layouts.login');
    }

    public function post_login(Request $request)
    {
        $user = DB::table('users')
            ->where('email', '=', $request -> email)->get();

        if($user->isEmpty())
            return redirect()->back()->with('auth_fail','Wrong Email or Password');

        if( Hash::check($request -> password, $user[0]->password))
        {
            Session::push('user',$user[0]);
            return $this->get_all();
        }
        else{
            return redirect()->back()->with('auth_fail','Wrong Email or Password');
        }
    }

    public function get_signup()
    {
        return view('layouts.signup');
    }

    public function post_signup(Request $request)
    {

        $rules = [
            'name' => 'required|max:255',
            'age' => 'integer|min:0|max:100',
            'address' => 'max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|max:255',
            'confirm' => 'required|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator -> fails()){
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $hash = Hash::make($request->password);

        User::create([
            'name' => $request->name,
            'age' => $request->age,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $hash,
            'role_id' => $request->role_id,
        ]);
        $user = DB::table('users')->where('email','=', $request->email)->get()->first();

        if($user->role_id == 2)
        {
            Lawyer::create([
                'user_id'=>$user->id
            ]);
        }
        return  view('layouts.login')->with(['signup_success' => 'Signup Successfully']);
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }
}
