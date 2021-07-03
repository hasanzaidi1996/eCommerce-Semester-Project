<?php 
use App\Http\Controllers\ProductController;
Session();
$totalItems = 0;
if(Session()->has('user')) {
  $totalItems = ProductController::itemsInCart(); 
}
?>


@extends('Layouts.header')

@section('title', 'Profile')

@section('content')

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/profile.css">

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
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

    <!-- Profile Section -->
    <div class="container">
    
        <div class="py-5 text-left">
        @if(Session()->has('user'))
            <h1>{{Session()->get('user')['first_name'] . " " . Session()->get('user')['last_name']}}</h1>
        </div>
        @else
            <h1>Profile</h1>
        @endif

        <div class="row">

            {{-- <div class="col-md-5 order-md-2">
                <div class="card mb-3 text-center profile-col">
                    <div class="card">
                        <img id="profile-image" src="{{Session()->get('user')['profile']}}" alt="...">
                    </div>
                    <input name="profile_pic" accept="image/*" type="file" id="file" class="bottom"  
                        style="margin-top: 10px; display: none;" onchange="addProfilePic()">
                </div>
            </div> --}}

            <div class="col-md-7 order-md-1">
            
                <form action="/profile" method="post">

                    @csrf

                    @foreach($details as $detail) 

                        <div class="card mb-3 text-center profile-col">
                            <div class="card">
                                <img id="profile-image" src="{{$detail->profile}}" alt="...">
                            </div>
                            <input name="profile_pic" accept="image/*" type="file" id="file" class="bottom"  
                                style="margin-top: 10px; display: none;" onchange="addProfilePic()">
                            {{-- <img id="profile" src="" width="150px" height="150px" style="display: none; margin-top: 5px;"> --}}
                        </div> 

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <h4 class="inputs" style="display: block">{{$detail->user_name}}</h4>
                            <div class="input-group">
                                <input type="text" name="username" class="form-control input-data" id="username" placeholder="Username"
                                required style="display: none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <h4 class="inputs" style="display: block">{{$detail->email}}</h4>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control input-data" id="email" placeholder="Email"
                                required style="display: none;">
                            </div>
                        </div>
                    @endforeach

                    <br><br>

                    <button class="btn btn-light edit-btn" onclick="editProfile(this)">
                        <img id="edit-img" src="/images/edit.png" alt="edit"> Edit Profile
                    </button>

                    <button type="submit" class="btn btn-light done-btn" onclick="done()">
                        <img id="done-img" src="/images/done.png" alt="done"> Done
                    </button>

                </form>

            </div>
        </div>

        {{--  <button class="btn btn-light edit-btn" onclick="editProfile(this)">
            <img id="edit-img" src="/images/edit.png" alt="edit"> Edit Profile
        </button>

        <button data-id="{{Session()->get('user')['id']}}" class="btn btn-light done-btn" onclick="done(this)">
            <img id="done-img" src="/images/done.png" alt="done"> Done
        </button>  --}}
    </div>

    <!-- Footer -->

    <footer class="white-section" id="footer">

        <div class="container-fluid">
            <p>© Copyright 2021 Made with <i class="fas fa-heart fa-2x icon-3"></i> by Rehber Odhano</p>
        </div>

    </footer>

    <script src="{{asset('/js/edit_profile.js')}}"></script>
</body>

</html>
