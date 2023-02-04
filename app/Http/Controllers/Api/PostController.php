<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return PostResource::collection($posts);

//        $response = [];
//
//        foreach ($posts as $post) {
//            $response [] = [
//                'id' => $post->id,
//                'title' => $post->title,
//                'description' => $post->description,
//            ];
//        }
//
//        return $response;
    }

    public function show($postId)
    {
        $post = Post::find($postId);

        return new PostResource($post);
//        return [
//            'id' => $post->id,
//            'title' => $post->title,
//            'description' => $post->description,
//        ];
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
