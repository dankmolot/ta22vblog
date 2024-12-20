<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PublicController extends Controller
{
    public function index() {
        $posts = Post::select()->orderByDesc('id')->simplePaginate(16);
        return view('welcome', compact('posts'));
    }
}
