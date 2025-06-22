<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class LawyerController extends Controller
{
    public function selectAll()
    {
        $list_lawyer = DB::table('users')
            ->join('lawyers', 'users.id', '=', 'lawyers.user_id')
            ->select('users.*', 'lawyers.exp_years')
            ->get();
        return view('layouts.lawyers')->with(compact('list_lawyer'));
    }

    public function rateLawyer(Request $request)
    {
        $validator = Validator::make($request->all(), ['rate'=>'integer|min:0|max:5']);

        if($validator -> fails()){
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        User::whereId($request -> lawyerId)->update(['rate' => $request->rate]);
        return redirect()->back();
    }
}
