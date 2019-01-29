<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hr\Product;
use App\Comment;
use App\Order;
use Sentinel;

class CommentsController extends Controller
{
    public function store(Product $product, Request $request)
    {
    	$comment = new Comment;
    	$comment->body = $request->body;
    	$comment->user()->associate(Sentinel::getUser());
    	$product->comments()->save($comment);
    	return back();
    }

    public function replay_store(Product $product, Comment $comment, Request $request)
    {
        $replay = new Comment;
    	$replay->body = $request->body;
    	$replay->user()->associate(Sentinel::getUser());
    	$replay->parent_id = $comment->id;
    	$product->comments()->save($replay);
    	return back();

    }
    
}
