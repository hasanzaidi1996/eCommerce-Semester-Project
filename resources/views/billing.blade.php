@extends('Layouts.header')

@section('title', 'Billing')

@section('content')

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/billing.css">
  
@endsection

<body>

    <!-- Billing Section -->
    <div class="container">
        <div class="py-5 text-center">
            <img id="shopping-cart" src="/images/shopping-cart.png" alt="shoping-cart">
            <h2>eCommerce</h2>
        </div>

            <div class="col-md-12 order-md-1">
                <h4 class="mb-3 heading">Billing Details</h4>

                <form action="/success" method="POST">

                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Will" value="" required>
                            <br>

                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Smith" value="" required>
                            <br>

                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                            <br>

                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
                            <br>

                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Park Road" required>
                        </div>
                    </div>

                    <br>
                    <hr class="mb-4">
                    <h4 class="mb-3">Payment</h4>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" onclick="checkPaymentMethod(this)">
                            <label for="credit">Credit Card</label>

                            <input class="ms-4" id="cash" name="paymentMethod" type="radio" class="custom-control-input" onclick="checkPaymentMethod(this)">
                            <label for="cash">Cash on Delivery</label>
                            <br>

                            <br>
                            <div id="payment">
                                <label for="cc-name">Name on Credit Card</label>
                                <input type="text" class="form-control" name="nameOnCC" id="cc-name" placeholder="Will" required>
                                
                                <br>
                                <label for="cc-number">Credit Card Number</label>
                                <input type="text" class="form-control" name="numberOnCc" id="cc-number" placeholder="1234-1234-4321-4321" required>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary bill-btn" type="submit">Continue to checkout</button>
                    <button class="btn btn-primary bill-btn" type="button" onclick="window.location.href='/products'">Back to Shop</button>

                </form>

            </div>
        </div>

    </div>

    <!-- Footer -->
    
    <footer class="white-section" id="footer">

        <div class="container-fluid">
            <p>© Copyright 2021 Made with <i class="fas fa-heart fa-2x icon-3"></i> by Rehber Odhano</p>
        </div>

    </footer>

    <script src="{{asset('/js/billing_validation.js')}}"></script>
</body>

</html>
