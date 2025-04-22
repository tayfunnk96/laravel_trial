<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">


</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ url()->current() == route('home') ? 'active' : ''}}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ url()->current() == route('about') ? 'active' : ''}}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ url()->current() == route('contact') ? 'active' : ''}}" href="{{ route('contact') }}">Contact</a></li>
                    <li class="nav-item"><a class="nav-link {{ url()->current() == route('blog') ? 'active' : ''}}" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="row"> <!-- Kartlar için row sınıfı eklendi -->
                    @foreach($posts as $post)
                    <div class="col-lg-6 mb-4"> <!-- Her kart ekran genişliğinin yarısını kaplayacak -->

                        <div class="card mb-4" style="width: 80%;">
                            <a href="{{ route('posts.show', $post->id) }}"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="Placeholder image"></a>
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                            <div class="card-body">
                                <div class="text-muted small">{{ $post->created_at }}</div>
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <p class="card-text">{{ $post->post_text }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-unstyled mb-0">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('home') }}?category_id={{ $category->id }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="< asset('js/scripts.js') }} >"></script>

</body>

</html>