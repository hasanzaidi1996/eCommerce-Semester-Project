<?php 
use App\Http\Controllers\ProductController;
Session();
$totalItems = 0;
if(Session()->has('user')) {
  $totalItems = ProductController::itemsInCart(); 
}
?>

@extends('Layouts.header')

@section('title', 'About Us')
    
@section('content')
    <link rel="stylesheet" href="css/about-us.css">
@endsection


<body>

    <!-- Nav Bar -->
    <section class="colored-section" id="title">

        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand brand btn-link" href="/home">eCommerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="/about">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/products">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link cart-count" href="/cart">
                                @if($totalItems == 0)
                                    Cart <span></span>  
                                @else
                                    Cart <span class= "badge bg-danger">{{$totalItems}}</span>
                                @endif
                            </a>
                        </li>
                        @if(Session()->has('user'))
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Session()->get('user')['first_name'] . " " . Session()->get('user')['last_name']}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="my_nav_item">
                                    <a class="dropdown-item my_nav_item_text" href="/profile">Profile</a>
                                </li>
                                <li class="my_nav_item">
                                    <a class="dropdown-item my_nav_item_text" href="/logout">Logout</a>
                                </li>
                            </ul>
                            </li>
                        @else
                            <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endif
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li> --}}
                    </ul>
                </div>
            </nav>

        </div>

    </section>

    <!-- About Us Section -->
    <section class="white-section" id="about">

        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="about-us">
                    <h1>About Us</h1>
                    <p>Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem qui.
                    </p>
                    <p id="read-more" style="display: none;">
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem qui.
                        Lorem IpsumExercitation esse qui quis magna consequat ut ad tempor deserunt est. Pariatur consequat officia esse sunt velit est irure commodo eiusmod irure magna occaecat ea ipsum. Ut consectetur nisi magna culpa id incididunt quis eiusmod ullamco exercitation. Aliqua reprehenderit sit commodo esse nisi qui incididunt adipisicing quis consectetur in est laboris. Do non ex voluptate mollit Lorem qui.
                    </p>
                    <button class="btn btn-dark btn-lg about-btn" type="button" onclick="viewMore(this)">Read More</button>
                </div>
            </div>
        </div>

    </section>

    <!-- Testimonials -->

    <section class="colored-section" id="testimonials">

        <div id="testimonial-carousel" class="carousel slide" data-ride="false">
            <div class="carousel-inner">
                <div class="carousel-item active container-fluid">
                    <h2 class="testimonial-text">Consectetur minim tempor magna aute dolor consectetur. Reprehenderit
                        reprehenderit</h2>
                    <img class="testimonial-img" src="images/client.jpg" alt="profile">
                    <em>John, New York</em>
                </div>
                <div class="carousel-item container-fluid">
                    <h2 class="testimonial-text">Consectetur minim tempor magna aute dolor consectetur. Reprehenderit
                        reprehenderit</h2>
                    <img class="testimonial-img" src="images/lady-img.jpg" alt="lady-profile">
                    <em>Beverly, Illinois</em>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>

    </section>

    <hr>

    <!-- Footer -->
    @extends('Layouts.footer')

    <script src="{{asset('/js/read_more.js')}}"></script>
</body>

</html>
