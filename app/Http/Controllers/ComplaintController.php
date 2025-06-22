<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['message'=>'required']);
        if($validator -> fails()){
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $user = Session::get('user');
        if($user == null)
            return redirect()->back()->with('fail','You Must Loged in');
        else
        {
            Complaint::create([
                'user_id' => $user[0]->id,
                'message' => $request -> message
            ]);
            return redirect()->back()->with('success','Your Complaint Sent');
        }
    }
}
