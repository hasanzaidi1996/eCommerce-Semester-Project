<?php 
use App\Http\Controllers\ProductController;
Session();
$totalItems = 0;
if(Session()->has('user')) {
  $totalItems = ProductController::itemsInCart(); 
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="E:\CUI\5th Semester\Web Technologies\Assignments\eCommerce-Project\images\favicon.ico">
    <title>eCommerce</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,700;0,900;1,100;1,600;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- CSS stylesheets - External CSS + Bootstrap for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/products.css">

    <!-- Bootstrap Scripts for JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

</head>

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
                            <a class="nav-link" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
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
                
                    </ul>
                </div>
            </nav>
        </div>

    </section>

    <section id="pricing">

        <h2 class="section-heading">Searched Results</h2>
        <br>

        @if($products->isEmpty())
            <h5>Uh oh! The items you are searching for are not available... :(</h5>
        @else
            <h5>Following products are found for <strong>{{$query}}!</strong></h5>
        @endif
        <br>

        <!-- Products using bootstrap cards-->
        <div class="row">

            @foreach($products as $product)
            <div class="pricing-column col-lg-4 col-md-6">
                <div class="card mb-3 text-center">
                    <img class="product-image" src="{{$product["image"]}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h2 class="card-title product-text">{{$product["name"]}}</h2>
                    <h3 class="card-title price-text">$ {{$product["price"]}}</h3>
                    <p class="card-text">{{$product["description"]}}</p>

                    {{--  this form is used to add data to the cart  --}}
                    <form action="/home/{{$product['id']}}" method="POST" >
                            @csrf
                            <input type="hidden", name="product_id", value="{{$product["id"]}}">
                        <button class="btn btn-outline-dark col-12 mx-auto btn-large" onclick="disable(this)" type="submit">
                        <a class="btn-link">Buy Now</a>
                        </button>
                    </form>

                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>

    <!-- Footer -->
    <footer class="white-section" id="footer">

        <div class="container-fluid">
            <span><a class="social-link" href="https://twitter.com/?lang=en"><i
                        class="fab fa-twitter fa-2x icon-3"></i></a></span>
            <span><a class="social-link" href="https://www.facebook.com/"><i
                        class="fab fa-facebook-f fa-2x icon-3"></i></a></span>
            <span><a class="social-link" href="https://www.instagram.com/"><i
                        class="fab fa-instagram fa-2x icon-3"></i></a></span>
            <span><a class="social-link"
                    href="https://accounts.google.com/signin/v2/identifier?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><i
                        class="fas fa-envelope fa-2x icon-3"></i></a></span>
            <br><br><br><br>

            <span>
                <a class="links" href="/index.html">Home</a>
                <a class="links" href="/about-us.html">About Us</a>
                <a class="links" href="/products.html">Products</a>
                <a class="links" href="/Contact.html">Contact</a>
            </span>

            <br><br><br>
            <p>© Copyright 2021 Made with <i class="fas fa-heart fa-2x icon-3"></i> by Rehber Odhano</p>
        </div>

    </footer>

</body>


</html>