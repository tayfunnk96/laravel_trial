@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <!-- /resources/views/post/create.blade.php -->

                <h1>Create Post</h1>



                <!-- Create Post Form -->

                <h2>Add a New Post</h2>
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>

                    <label for="text">Text:</label>
                    <textarea id="text" name="text" required></textarea>

                    <label for="category_id">Category:</label>
                    <select id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit">Add Post</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection