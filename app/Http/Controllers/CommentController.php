<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
	{
		$comment = new Comment();

		$comment->content = $request->input("content");
        $comment->tweet_id = $id;

		$comment->save();

		return redirect()->route('tweets.index')->with('message', 'Comment created successfully.');
	}
}
