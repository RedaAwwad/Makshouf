<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $categories = PostCategory::with('publishedPosts')->get();
        $posts = Post::where('status', 'published')->get();

        return view('frontend.pages.blog', compact('categories', 'posts'));
    }

    public function post(Post $post): View
    {
        return view('frontend.pages.post', compact('post'));
    }
}
