<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function selectAll()
    {
        $user = Session::get('user');
        $not_law ='';
        if($user[0] -> role_id == 3)
        {
            $posts_list = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name', 'users.photo')
                ->where([['users.id', '=', $user[0] -> id]])
                ->get();
            $replys_list = DB::table('replys')
                ->join('users','users.id','=','replys.lawyer_id')
                ->join('posts', 'posts.id', '=', 'replys.post_id')
                ->select('replys.*', 'posts.user_id', 'users.name' , 'users.rate', 'users.photo')
                ->where([['posts.user_id', '=', $user[0] -> id]])->get();
            return view('layouts.posts')
                ->with(compact('posts_list','replys_list','not_law'));
        }
        else
        {
            $not_law = 'law';
            $posts_list = DB::table('posts')
                ->join('users', 'users.id', '=', 'posts.user_id')
                ->select('posts.*', 'users.name', 'users.photo')
                ->get();
            $replys_list = DB::table('replys')
                ->join('users','users.id','=','replys.lawyer_id')
                ->select('replys.*', 'users.name' , 'users.rate', 'users.photo')
                ->get();
            return view('layouts.posts')
                ->with(compact('posts_list','replys_list', 'not_law'));
        }
    }

    public function storePost(Request $request)
    {
        $user = Session::get('user');
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'contents'=>'required'
        ]);
        if($validator ->fails())
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
        Post::create([
            'user_id'=> $user[0]->id,
            'title'=> $request->title,
            'contents'=> $request->contents
        ]);
        return redirect()->back()
            ->with(['add_success'=>'Post Added Successfully'])
            ->with(['not_law' => 'not_law']);
    }

    public function storeReply(Request $request)
    {
        $user = Session::get('user');
        $validator = Validator::make($request->all(),[
            'contents'=>'required'
        ]);
        if($validator ->fails())
            return  redirect()->back()->withErrors($validator)->withInput($request->all());
        Reply::create([
            'post_id' => $request -> post_id,
            'lawyer_id' => $user[0] -> id,
            'contents' => $request -> contents
        ]);
        return redirect()->back();
    }

    public function chooseLawyer(Request $request)
    {
        //add post to issues
        $post_id = $request->post_id;
        $post = DB::table('posts')
            ->where('id','=',$post_id)
            ->get()->first();

        Issue::create([
            'user_id'=>$post->user_id,
            'lawyer_id'=>$request->lawyer_id,
            'title'=> $post->title,
            'contents'=> $post->contents,
            'issue_finished'=> 0
        ]);
        // delete post from posts
        $post = Post::find($post_id);
        $post -> delete();

        return view('layouts.issues');
    }
}
