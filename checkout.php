<?php include('components/header.php'); ?>
<?php
  if(!isset($_SESSION['logged_in'])){
    header('location: index.php');
     exit;
  }
  if( !empty($_SESSION['cart'])){

  }else{
    header('location: index.php');
  }
?>
<head>
    <title>Checkout</title>
</head>
<body>

    <section id = "" class = "my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Delivery Details</h2>
            <hr class="mx-auto">
        </div>
        <div class="max-auto container">
            <form method="POST" action="connection/place_user_order.php" id="checkout-form">
                <div class="form-group checkout-small-element" >
                    <label for="register-name">Username</label>
                    <input value = "<?php echo $_SESSION['user_name'] ?>" type="text" class = "form-control" id = "checkout-name" name = "name" placeholder = "Your Name" required>
                </div>
                <div class="form-group checkout-small-element" >
                    <label for="checkout-email">Email</label>
                    <input value = "<?php echo $_SESSION['user_email'] ?>" type="email" class = "form-control" id = "checkout-email" name = "email" placeholder = "Your Email" required>
                </div>
                <div class="form-group checkout-small-element" >
                    <label for="checkout-email">Phone</label>
                    <input type="number" class = "form-control" id = "checkout-phone" name = "phone" placeholder = "Your Phone no." required>
                </div>
                <div class="form-group checkout-small-element" >
                    <label for="checkout-city">City</label>
                    <input type="text" class = "form-control" id = "checkout-city" name = "city" placeholder = "Your City" required>
                </div>
                <div class="form-group checkout-large-element" >
                    <label for="checkout-address">Address</label>
                    <input type="text" class = "form-control" id = "checkout-address" name = "address" placeholder = "Your address" required>
                </div>
                
                <div class="form-group checkout-btn-container">
                    <p>Pay: ₹ <?php echo $_SESSION['total']; ?></p>
                    <input type="submit" name = "order_click" class = "btn" id = "checkout-btn" value = "Proceed Now">
                </div>
               
            </form>
        </div>

    </section>
    <?php include('components/footer.php'); ?>