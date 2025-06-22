<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class IssueController extends Controller
{
    public function selectAll()
    {
        $user = Session::get('user');
        if($user[0]->role_id == 3)
        {
            $issues = DB::table('issues')
                ->where([['user_id', '=', $user[0] -> id]])->get();
            return view('layouts.issues')->with(compact('issues'));
        }
        else
        {
            $issues = DB::table('issues')
                ->where([['lawyer_id', '=', $user[0] -> id]])->get();
            return view('layouts.issues')->with(compact('issues'));
        }

    }

    public function selectOne($id)
    {
        $user = Session::get('user');
        if($user[0]->role_id == 3)
        {
            $issue = DB::table('issues')
                ->join('users', 'users.id', '=', 'issues.lawyer_id')
                ->select('issues.*','users.name','users.photo')
                ->where([['issues.id', '=', $id]])->first();
            return view('layouts.issue')->with(compact('issue'))
                ->with(['role'=>'3']);
        }
        else
        {
            $issue = DB::table('issues')
                ->join('users', 'users.id', '=', 'issues.user_id')
                ->select('issues.*','users.name','users.photo')
                ->where([['issues.id', '=', $id]])->first();
            return view('layouts.issue')->with(compact('issue'))
                ->with(['role'=>'2']);
        }

    }

    public function edit($id)
    {
        Issue::whereId($id)->update(['issue_finished' => 1]);
        return redirect()->back()->with('finished', 'Issue Finished');
    }
}
