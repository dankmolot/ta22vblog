<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PublicController extends Controller
{
    public function index() {
        $posts = Post::simplePaginate(16);
        return view('welcome', compact('posts'));
    }
}
