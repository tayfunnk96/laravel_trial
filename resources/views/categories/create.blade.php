<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Category') }}
        </h2>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        Name :
                        <br>
                        <input type="text" name="name" class='rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50'>
                        <br><br>

                        <button type=" submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection