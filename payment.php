<?php include('components/header.php'); ?>
<?php
if(!isset($_SESSION['logged_in'])){
    header('location: index.php');
    exit;
}
if(isset($_POST['order_pay_btn']) ){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
}

?>
<head>
    <title>Payment</title>
</head>
<body>

    <section id = "" class = "my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="font-weight-bold">Pay Your Amount</h2>
            <hr class="mx-auto">
        </div>
        <div class="max-auto container text-center">
        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
                   <?php $amount = strval($_POST['order_total_price']); ?>
                   <?php $order_id = $_POST['order_id']; ?>
                    <p>Total payment: $<?php echo $_POST['order_total_price']; ?></p>
                    <form method="POST" action="razorpayCheckout.php">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
                        <input type="hidden" name="order_amount" value="<?php echo $amount; ?>"/>
                        <input type="submit" name = "order_now" class = "btn btn-secondary" id = "checkout-btn" value = "Pay Now">            
                    </form>

        <?php } else if(isset($_SESSION['total'])  && $_SESSION['total'] != 0){?>
               <?php $amount = strval($_SESSION['total']); ?>
               <?php $order_id = $_SESSION['order_id']; ?>
                <p>Total payment: $<?php echo $_SESSION['total']; ?>  </p>
                <form method="post" action="razorpayCheckout.php">
                    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
                    <input type="hidden" name="cart_pay" value="paymentbycart"/>
                    <input type="hidden" name="order_amount" value="<?php echo $amount; ?>"/>
                    <input type="submit" name = "order_now" class = "btn btn-secondary" id = "checkout-btn" value = "Pay Now">            
                </form>

        <?php } else {  ?>
                     <p>Access Denied</p>            
                     <small>Check Your orders in account</small>            
           <?php } ?>
        </div>
    </section>


<?php include('components/footer.php'); ?>


