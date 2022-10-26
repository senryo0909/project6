<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $tweets = Post::latest()->get();
        return view('auth.timeline', compact('tweets')); 
    }

    public function postTweet(Request $request)
    {
        $validator = $request->validate([ 
            'body' => ['required', 'string', 'max:280'],
        ]);
        Post::create([ 
            'user_id' => Auth::user()->id,
            'body' => $request->body,
        ]);
        return back();
    }

    public function delete(Request $request) {
        Post::find($request["id"])->delete();
        return redirect()->route('timeline');
    }
}
