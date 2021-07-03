<?php 

/*
$cookie_value = ;

$cookie_name = "User";
$expireTime = time() + 60 * 60 * 24; // 24 hours
setcookie($cookie_name, $cookie_value, $expireTime, '/home');

// retrieve the cookie
$cookie = $_COOKIE[$cookie_name] . " is logged in!";
echo '<script type="text/JavaScript">

        var cookie = "'.$cookie.'"
        alert(cookie);
      </script>';
*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>

    <!-- Custom styles for this template -->
    <link href="/css/sign-up.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

</head>

<body class="text-center">

    <main class="form-signin">

        <form action="/signup" method="POST">

            <img class="mb-4" src="./images/signup.jpg" alt="" width="350" height="200">
            <h1 class="h3 mb-3 fw-normal">Signup to Our Website</h1>

            <!-- This token verifies that the operations or requests are sent 
                by the authenticated user    
            -->
            @csrf
            
            <input name="firstName" type="text" class="top" placeholder="First Name" required autofocus onkeyup="validate(this)">
            <p>First name must be consists of letters only</p>

            <input name="lastName" type="text" class="middle" placeholder="Last Name" required onkeyup="validate(this)">
            <p>Last name must be consists of letters only</p>

            <input name="username" type="text" class="middle" placeholder="Username" required onkeyup="validate(this)">
            <p>Username must be consists of letters and must be 5 - 12 characters long</p>

            <input name="email" type="text" class= "middle" placeholder="name@example.com" required onkeyup="validate(this)">
            <p>Enter a valid email address, e.g. hello@example.com</p>

            <input name="password" type="password" class="bottom" placeholder="Password" required onkeyup="validate(this)">
            <p>Password must be alphanumeric + special characters + 8 to 20 characters long</p>
            
            <input name="profile_pic" accept="image/*" type="file" id="file" class="bottom"  onchange="addProfilePic(this)">
            <p>Upload image in valid format</p>
            <img id="profile" src="" width="150px" height="150px" style="display: none; margin-top: 5px;">

            <br>

            <button class="w-100 btn btn-dark btn-lg about-btn" type="submit">
                <img id="sign-up-img" src="/images/sign-up.png" alt="sign up"> Sign Me Up!
            </button>

        </form>

            <br>
            <p id="Login-ID">Have an account? <a href="/login">Login</a></p>

    </main>

    
     <!-- Custom JS -->
    <script src="{{asset('/js/signup-form-validation.js')}}"></script>

</body>

</html>
