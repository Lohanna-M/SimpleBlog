<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return redirect()->route('Admin.dashboard', ['id' => $post->id])->with(['success' => 'Post criado com sucesso!', 'post' => $post]);
    }

    public function likePost($id)
    {
        $post = Post::findOrFail($id);
        $user = auth()->user();

        // Recuperar a lista de posts que o usuário já curtiu na sessão
        $likedPosts = session()->get('liked_posts', []);

        if (in_array($id, $likedPosts)) {
            // Se o usuário já deu like, remover o like
            $post->likes = max(0, $post->likes - 1);
            $likedPosts = array_diff($likedPosts, [$id]); // Remover o ID do post da lista
        } else {
            // Se o usuário ainda não deu like, adicionar like
            $post->likes++;
            $likedPosts[] = $id; // Adicionar o ID do post à lista
        }

        // Salve os likes atualizados no banco de dados
        $post->save();

        // Atualize a sessão com a lista de posts atualizada
        session()->put('liked_posts', $likedPosts);

        // Redireciona de volta para a página do post
        return back()->with('success', 'Sua reação foi registrada.');
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

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('meuspostsedit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Atualize os campos do post
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->category = $request->input('category');

        if ($request->hasFile('image')) {
            // Armazene a nova imagem e atualize o campo
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
        }

        // Salve o post atualizado
        $post->save();

        return redirect()->route('Admin.dashboard', ['id' => $post->id])->with('success', 'Post atualizado com sucesso!');
    }
    
}
