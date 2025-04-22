<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest as RequestsStorePostRequest;
use App\Models\Category;
use App\Models\Post;
//use Illuminate\Http\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        // Tüm postları kategori ilişkisiyle birlikte çekiyoruz
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Tüm kategorileri çekiyoruz
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(RequestsStorePostRequest $request)
    {
        // Form doğrulama

        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Post oluşturma
        Post::create([

            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        // Postu ve kategorileri düzenleme için gönderiyoruz
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(RequestsStorePostRequest $request, Post $post)
    {
        // Form doğrulama
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Postu güncelleme
        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        // Postu silme
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function show(Post $post)
    {
        $posts = Post::all();
        // Belirli bir postun detayını gösterme
        return view('posts.show', compact('post'));
    }
}
