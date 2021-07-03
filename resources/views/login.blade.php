@extends('Layouts.header')

@section('title', 'Login')

@section('content')

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/login.css">
  
@endsection


  <body class="text-center">

    <main class="form-signin">

      <form action="/login" method="POST">

        <img class="mb-4" src="./images/signup.jpg" alt="" width="350" height="200">
        <h1 class="h3 mb-3 fw-normal">Login to Our Website</h1>
        
        @csrf

        <input value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" name="username" type="username" placeholder="Username" required autofocus onkeyup="validate(this)">
        <p>Username must be consists of letters and must be 5 - 12 characters long</p>
      
        <input value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" name="password" type="password" placeholder="Password" required onkeyup="validate(this)">
        <p>Password must be alphanumeric + special characters + 8 to 20 characters long</p>
        
         
        <button class="w-100 btn btn-dark btn-lg about-btn" type="submit">
          <img id="login-img" src="/images/log-in.png" alt="login"> Login
        </button>

        <input type="checkbox" name="RememberMe" id="rememberMe" value="remember_me" unchecked>
        <label for="rememberMe">Remember me</label>
        <br><br>
        <p id="msg">Don't have an account? <a href="/signup">Sign up</a></p>

      </form>

    </main>

    <script src="{{asset('/js/login_validation.js')}}"></script>
  </body>

</html>
