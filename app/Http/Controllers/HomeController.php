<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })
            ->latest()
            ->get();


        return view(
            'categories.index',
            ['categories' => $categories, 'posts' => $posts]
        );
    }

    public function home() // home.blade.php
    {
        $categories = Category::all();
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })
            ->latest()
            ->get();

        return view(
            'home',
            ['categories' => $categories, 'posts' => $posts]
        );
    }

    /*
    public function home()
    {
        $categories = Category::all();
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })
            ->latest()
            ->get();

        return view(
            'categories.home',
            ['categories' => $categories, 'posts' => $posts]
        );
    }
    */

    public function about()
    {
        $categories = Category::all();
        $post = Post::find(1); // düzelt

        return view(
            'about',
            [
                'categories' => $categories,
                'post' => $post
            ]
        );
    }

    public function app()
    {
        $categories = Category::all();

        return view('about', ['categories' => $categories]);
    }
}
