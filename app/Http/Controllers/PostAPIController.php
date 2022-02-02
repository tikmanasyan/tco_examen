<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function index() {
        return response()->json([
            'posts' => Post::get()
        ]);
    }

    public function store(Request $request) {
        $data = [
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => $request['user_id'],
            'created_at' => NOW(),
            'updated_at' => NOW()
        ];

        $store = Post::create($data);
        if($store) {
            return response()->json([
                'msg' => 'Post successfully posted!'
            ]);
        }


    }
}
