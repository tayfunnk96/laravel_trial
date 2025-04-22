<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

<h2 class="font-semibold text-xl text-gray-800 leading-tight">

    <div class="text-center my-5">
        <p class="mt-5">{{ __('Posts') }}</p>
        <br>
    </div>
</h2>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{ route('posts.create') }}">Add New Post</a>

                <br><br>
                <table>
                    <thead>

                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->text }}</td>
                            <td>{{ $post->category->name ?? 'No Category' }}</td>
                            <td>
                                <a href="{{ route('posts.edit', $post) }}">Edit</a>

                                <form method="POST" action="{{ route('posts.destroy', $post) }}">

                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-indigo-50 hover:bg-indigo-50 text-white font-bold py-2 px-4 border border-indigo-50 rounded" type="submit" onclick="return confirm('Are you sure ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection