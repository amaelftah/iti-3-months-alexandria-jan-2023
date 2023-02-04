<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show($postId)
    {
        return Post::find($postId);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->all();

        $title = $data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];

        //store the form data inside the database
        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId,
        ]);

        return $post;
    }
}
