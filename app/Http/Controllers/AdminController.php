<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admindashboard', compact('posts'));
    }

    public function novopost()
    {
        return view('adminnovopost');
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para criar um post.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'user_id' => auth()->id(),
            'category' => $request->category,
            'likes' => 0,
        ]);

        return redirect()->route('Admin.dashboard', ['id' => $post->id])->with(['success'=>'Post criado com sucesso!', 'post'=>$post]);
    }

    public function show($id)
{
    $post = Post::findOrFail($id);
    return view('adminnovopost', compact('post'));
}

    public function meusposts()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('adminmeusposts', compact('posts'));
    }
}
