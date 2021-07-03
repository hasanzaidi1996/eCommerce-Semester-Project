<?php 
use App\Http\Controllers\ProductController;
Session();
$totalItems = 0;
if(Session()->has('user')) {
  $totalItems = ProductController::itemsInCart(); 
}
?>

@extends('Layouts.header')

@section('title', 'Cart')

@section('content')

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/cart.css">
  
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

    <!-- Cart Section -->

    <section class="white-section" id="cart-section">

        <div class="container mb-4">
            <div class="row">
                @if(!$products->isEmpty())
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                
                                <thead>
                                    <tr>
                                        <th scope="col"> </th>
                                        <th scope="col">Product</th>
                                        {{-- <th scope="col">Available</th>
                                        <th scope="col" class="text-center">Quantity</th> --}}
                                        <th scope="col" class="text-right">Price</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                        
                                @foreach($products as $item)
                                <tbody id="product-body">
                                    <tr>
                                        <td><img src="{{$item->image}}"/></td>
                                        <td>{{$item->name}}</td>
                                        {{-- <td>In stock</td> --}}
                                        {{-- <td><input class="form-control" type="text" value="0"></td> --}}
                                        <td class="text-right">${{$item->price}}</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-right">
                                            <button class="btn btn-sm btn-danger" onclick="window.location.href='/cart/{{$item->cart_id}}'">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- <tr>
                                        <td></td>
                                    </tr> --}}

                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total Items</td>
                                    <td class="text-right">{{$totalItems}}</td>
                                </tr>

                                {{-- <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Sub-Total</td>
                                    <td class="text-right">Rs. 0.00</td>
                                </tr> --}}

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Shipping</td>
                                    <td class="text-right">$ 2.50</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-right"><strong>$ {{($totalItems * $item->price) + 2.50}}</strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
                                <button class="btn btn-light btn-outline-dark btns top-btn">
                                    <img id="cart-sec-btn" src="/images/shopping-cart.png" alt="shopping"> 
                                    <a class="btn-link" href="/products">Continue Shopping</a>
                                </button>
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <button class="btn btn-light btn-outline-dark btns" onclick="window.location.href='/billing'">
                                    <img id="cart-sec-btn" src="/images/debit-card.png" alt="debit-card"> Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <h4>Your Cart is Empty... Go and get something for you... :)</h4>
                @endif
            </div>
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

    <script src="{{asset('/JS/index.js')}}"></script>
</body> 

</html>
