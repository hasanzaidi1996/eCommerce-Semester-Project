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
    <title>Products</title>

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

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

    <!-- Products -->

    <section id="pricing">

        <!-- Search Bar -->
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <form id="search-form" action="/search">
                    <div class="searchbar">
                        <input class="search_input" name="query" type="text" id="input" value=""
                         placeholder="Search..." onkeyup="ProductSuggestions()">
                        <a href="#" class="search_icon" onclick="submitUsingAnchorTag()"><i class="fas fa-search"></i></a>
                    </div>
                </form>
            </div>
        </div>

        <br><br><br><br>

        <h2 class="section-heading">Our Products</h2>

        <!-- Displaying Products using bootstrap cards-->
        <div class="products">
            <div class="row">
                @foreach($products as $product)
                    <div class="pricing-column col-lg-4 col-md-6">
                        <div class="card mb-3 text-center">
                            <img class="card-img-top product-image" src="{{$product["image"]}}" alt="...">
                            <div class="card-body">
                                <h2 class="card-title product-text">{{$product['name']}}</h2>
                                <h3 class="card-title price-text">$ {{$product['price']}}</h3>
                                <p class="card-text">{{$product['description']}}</p>

                                {{--  this form is used to add data to the cart  --}}
                                <form action="/products/{{$product['id']}}" method="POST" >
                                        @csrf
                                    <input type="hidden", name="product_id", value="{{$product["id"]}}">
                                    <button class="btn btn-outline-dark col-12 mx-auto btn-large" type="submit">
                                        <a class="btn-link">Buy Now</a>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row">
            <h3 id="msg"></h3>
            <div class="pricing-column col-lg-4 col-md-6 searched_products" style="display: none;">
                <div class="card mb-3 text-center">
                    <img class="card-img-top" id="product_image" src="" alt="...">
                    <div class="card-body">
                        <h2 class="card-title" id="product_text"></h2>
                        <h3 class="card-title" id = "price_text"></h3>
                        <p class="card-text" id="description"></p>

                        {{--  this form is used to add data to the cart  --}}
                        <form id="form" action="" method="POST" >
                                @csrf
                            <input id="productID" type="hidden", name="product_id", value="">
                            <button class="btn btn-outline-dark col-12 mx-auto btn-large" type="submit">
                                <a class="btn-link">Buy Now</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="pricing-column col-lg-4 col-md-12 view_products" style="display: none;">
                <div class="card mb-3 text-center">
                    <img class="product-image card-img-top" src="\images\product6.png" alt="...">
                    <div class="card-body">
                        <h2 class="card-title product-text">Product Name</h2>
                        <h3 class="card-title price-text">Rs. 999</h3>
                        <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
                        <button class="btn btn-outline-dark col-12 mx-auto btn-large" type="button">Buy Now</button>
                    </div>
                </div>
            </div>

            <div class="pricing-column col-lg-4 col-md-12 view_products" id="card-1" style="display: none;">
                <div class="card mb-3 text-center">
                    <img class="product-image card-img-top" src="\images\product8.png" alt="...">
                    <div class="card-body">
                        <h2 class="card-title product-text">Product Name</h2>
                        <h3 class="card-title price-text">Rs. 999</h3>
                        <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
                        <button class="btn btn-outline-dark col-12 mx-auto btn-large" type="button">Buy Now</button>
                    </div>
                </div>
            </div>

            <div class="pricing-column col-lg-4 col-md-12 view_products" id="card-2" style="display: none;">
                <div class="card mb-3 text-center">
                    <img class="product-image card-img-top" src="\images\product6.png" alt="...">
                    <div class="card-body">
                        <h2 class="card-title product-text">Product Name</h2>
                        <h3 class="card-title price-text">Rs. 999</h3>
                        <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
                        <button class="btn btn-outline-dark col-12 mx-auto btn-large" type="button">Buy Now</button>
                    </div>
                </div>
            </div>

            <div class="pricing-column col-lg-4 col-md-12 view_products" id="card-3" style="display: none;">
                <div class="card mb-3 text-center">
                    <img class="product-image card-img-top" src="\images\product7.png" alt="...">
                    <div class="card-body">
                        <h2 class="card-title product-text">Product Name</h2>
                        <h3 class="card-title price-text">Rs. 999</h3>
                        <p class="card-text">Lorem Ipsum Lorem Ipsum Lorem</p>
                        <button class="btn btn-outline-dark col-12 mx-auto btn-large" type="button">Buy Now</button>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 col-md-12 mx-auto">
                <button type="button" class="btn btn-lg btn-outline-dark view-btn" onclick="viewMore(this)">View More</button>
            </div>

            <hr>
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
                <a class="links" href="/home">Home</a>
                <a class="links" href="/about">About Us</a>
                <a class="links" href="/products">Products</a>
                <a class="links" href="/contact">Contact</a>
            </span>

            <br><br><br>
            <p>© Copyright 2021 Made with <i class="fas fa-heart fa-2x icon-3"></i> by Rehber Odhano</p>
        </div>

    </footer>

    <!-- Custom JS -->
    <script src="{{asset('/js/view_more.js')}}"></script>

    <script>

        
    
    </script>

</body>

</html>
