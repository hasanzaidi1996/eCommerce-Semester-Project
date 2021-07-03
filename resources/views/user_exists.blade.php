<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Exists</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Uh oh!</h1>
        <p class="lead">
            This username or email is already taken... Please try another one...
        </p>

        <button class="btn btn-lg btn-warning" name="button" onclick="window.location.href='/login'">Login</button>
        {{-- <form action="" method="">
            <button class="btn btn-lg btn-warning" type="submit" name="button">Try Again</button>
        </form> --}}

      </div>
    </div>

</body>


</html>
