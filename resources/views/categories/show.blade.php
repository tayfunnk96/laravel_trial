<link href="{{ mix('css/app.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')


<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">

            @foreach($categories as $category)
            <h1 class="fw-bolder">{{ $category->name }}</h1>
            @endforeach

        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p class="lead mb-0"></p>
        </div>
    </div>
</div>


@endsection