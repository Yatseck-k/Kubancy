<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): View|Factory|Application
    {
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }

    public function create(): View|Factory|Application
    {
        return view('posts.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $createRequest = new CreatePostRequest($request);
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Пост успешно создан');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
