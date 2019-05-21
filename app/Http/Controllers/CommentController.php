<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Tweet;

class CommentController extends Controller
{
    public function store(Request $request, $id)
	{
		$comment = new Comment();

		$comment->content = $request->input("content");
        $comment->tweet_id = $id;

        $comment->save();

		return redirect()->route('tweets.show', ['id' => $id])->with('message', 'Comment created successfully.');
	}
}
