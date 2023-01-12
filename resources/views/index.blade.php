<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MY Blog</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/front/HomePage/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }} ">MY BLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>

                    <!-- Login Register and Logout button -->
                    @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @else
                    <!--Show Admin Dashboard Option to Admin -->
                    @if(Auth()->user()->role->id == 1)
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>

                    <!--Show Author Dashboard Option to Author -->
                    @elseif(Auth()->user()->role->id == 2)
                    <li class="nav-item"><a class="nav-link" href="{{ route('author.dashboard') }}">Dashboard</a></li>
                    @endif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary rounded pill" type="submit">Logout</button>
                    </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page header with logo and tagline-->
    <header class="bg-light border-bottom mb-4">
        <div class="container-fluid img-fluid" style="background-image: url('assets/front/HomePage/img/blog-image.jpg'); height: 350px;">
            <div class="text-center text-white">
                <h1 class="fw-bolder p-5">Welcome to MY Blog!</h1>
                <p class="lead mb-0">A Blog where you can explore interesting things all day</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <!-- Blog entries-->
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="{{ route('home.readPost', ['slug'=> $featuredPost->slug]) }}"><img class="card-img-top img-fluid" style="max-height:350px;" src="/storage/post/Laravel.jpg" alt="image" /></a>
                        <div class="card-body">
                            <div class="small text-muted">{{ $featuredPost->created_at->format('M d, Y') }} <span>by</span> {{ $featuredPost->user->name }} </div>
                            <h3 class="card-title text-uppercase"><a href="{{ route('home.readPost', ['slug'=> $featuredPost->slug]) }}"> {{ $featuredPost->title }} </a></h3>
                            <p class="card-text">{{ Str::limit($featuredPost->description, 50) }} </p>
                            <a class="btn btn-success" href="{{ route('home.readPost', ['slug'=> $featuredPost->slug]) }}">Read more →</a>
                        </div>
                    </div>
                </div>
                <!-- Blogs posts -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach($latestPosts as $key=>$post)
                            @if ($featuredPost->id == $post->id)
                            @continue
                            @endif
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top img-fluid" style="max-height:200px;" src="{{ $post->image }}" alt="image" /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ $post->created_at->format('M y, Y') }} <span class="text-dark">by</span> {{ $featuredPost->user->name }}</div>
                                        <h2 class="card-title h4">{{ $post->title }}</h2>
                                        <p class="card-text">{{ Str::limit($post->description, 50) }}</p>
                                        <a class="btn btn-success" href="{{ route('home.readPost', ['slug'=> $post->slug]) }} ">Read more →</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts -->
            <!-- Pagination-->
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-success" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!">{{ $category->name }}</a></li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $latestPosts->links('vendor.pagination.bootstrap-5') !!}
        </div>
    </div>


    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; MY BLOG 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/front/HomePage/js/scripts.js') }}"></script>
</body>

</html>