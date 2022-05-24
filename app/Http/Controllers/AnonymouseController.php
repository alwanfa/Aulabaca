<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AnonymouseController extends Controller
{
    public function index()
    {
        return view('/Dashboard/posts/index');
    }

    public function show(Post $post)
    {
      
        return view(
            'DashboardAnonymous.bookpage',
            [
                'post' => $post
            ]
        );
    }
    public function read(Post $post)
    {
        $post->increment('view');
        return view(
            'DashboardAnonymous.show',
            [
                'post' => $post
            ]
        );
    }
}
