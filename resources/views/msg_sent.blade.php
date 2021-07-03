<?php
Session();
$first_name = Session()->get('user')['first_name'];
$last_name = Session()->get('user')['last_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message is successfully sent</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Thank you for contacting us....!</h1>
        <p class="lead">
          Dear {{$first_name . " " . $last_name}}, your message is successfully sent... :)
        </p>
        <button class="btn btn-lg btn-info" name="button" onclick="window.location.href='/home'">Home</button>
      </div>
    </div>

</body>


</html>
