<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function select()
    {
        $user = Session::get('user');
        if($user[0]->role_id == 2)
        {
            $user = DB::table('users')
                ->join('lawyers', 'lawyers.user_id', '=', 'users.id')
                ->select('users.*', 'lawyers.*')
                ->where('users.id', '=', $user[0]->id)
                ->get();
            return view('layouts.profile')->with(compact('user'));
        }
        else
        {
            $user = DB::table('users')
                ->where('users.id', '=', $user[0]->id)
                ->get();
            return view('layouts.profile')->with(compact('user'));
        }
    }

    public function edit(Request $request)
    {
        $user = Session::get('user');
        if($user[0]->role_id == 3)
        {
            $rules = [
                'name' => 'required|max:255',
                'age' => 'integer|min:0|max:100',
                'address' => 'max:255',
                'email' => 'required|max:255'
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator -> fails()){
                return  redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            if($request->file != null)
            {
                $path = $request->file('file')->store('public');
                $path = $request->file('file')->hashName();
            }
            else
            {
                $path = $user[0]->photo;
            }
            $password_hashed = '';
            if($request->password == null)
            {
                $password_hashed = $user[0]->password;
            }
            else
            {
                $password_hashed = Hash::make($request->password);
            }
            $values = [
                'name' => $request->name,
                'age' => $request->age,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $password_hashed,
                'role_id' => $user[0]->role_id,
                'photo' => $path
            ];
            DB::table('users')
                ->where([['id', '=', $user[0] -> id]])
                ->update($values);
            Session::flush();
            $user = DB::table('users')
                ->where('id','=',$user[0]->id)->get();
            Session::push('user',$user[0]);

            return  redirect()->back()->with(['edit_success' => 'Edit Profile Successfully'])->with('path');
        }
        else
        {
            $rules = [
                'name' => 'required|max:255',
                'age' => 'integer|min:0|max:100',
                'address' => 'max:255',
                'email' => 'required|max:255',
                'exp' => 'integer|min:0|max:100'
            ];
            $validator = Validator::make($request->all(), $rules);

            if($validator -> fails()){
                return  redirect()->back()->withErrors($validator)->withInput($request->all());
            }
            if($request->file != null)
            {
                $path = $request->file('file')->store('public');
                $path = $request->file('file')->hashName();
            }
            else
            {
                $path = $user[0]->photo;
            }
            $password_hashed = '';
            if($request->password == null)
            {
                $password_hashed = $user[0]->password;
            }
            else
            {
                $password_hashed = Hash::make($request->password);
            }
            $values = [
                'name' => $request->name,
                'age' => $request->age,
                'address' => $request->address,
                'email' => $request->email,
                'password' => $password_hashed,
                'role_id' => $user[0]->role_id,
                'photo' => $path
            ];
            DB::table('users')
                ->where([['id', '=', $user[0] -> id]])
                ->update($values);
            DB::table('lawyers')
                ->where([['user_id', '=', $user[0] -> id]])
                ->update([
                    'exp_years'=>$request->exp,
                    'graduate_date' => $request->g_date
                ]);
            Session::flush();
            $user = DB::table('users')
                ->where('id','=',$user[0]->id)->get();
            Session::push('user',$user[0]);

            return  redirect()->back()->with(['edit_success' => 'Edit Profile Successfully'])->with('path');
        }
    }
}
