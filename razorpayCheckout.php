<?php
session_start();
if(isset($_POST['order_now'])){
    $apiKey = "rzp_test_Usn5NvXIjlr3Di";
    $orderId = $_POST['order_id'];
    $orderAmount = $_POST['order_amount'];
    if(isset($_POST['cart_pay'])){
        $cartpay = $_POST['cart_pay'];
    }
}else{
    header("location: index.php");
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <style>
        
        .razorpay-payment-button {border : none; cursor : pointer;background-image: linear-gradient(to right, #000046 0%, #1CB5E0  51%, #000046  100%)}
        .razorpay-payment-button {
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .razorpay-payment-button:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
         
    </style>
</head>

<body style = "width : 100%; height : 100vh; display : flex; flex-direction : column; justify-content : center; align-items : center;  background :linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.9)), url('assets/img/bg/payment.jpg');
        background-size: cover;
        ">

<div style = "padding : 30px; background-color : white; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; border-radius : 20px;
             display : flex; flex-direction : column; justify-content : center; align-items : center;   ">
    <img src="assets/img/razor.png" style = "width : 300px; margin : 20px" />
    <form action="connection/after_payment.php" method="POST" style = "display : flex; justify-content: center; align-items: center;">
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php if(isset($apiKey)){ echo $apiKey; }?>"
                data-amount="<?php if(isset($orderAmount)) {echo $orderAmount * 100;}?>"
                data-currency="INR"
                data-id="<?php echo 'OID'.rand(10,100)."$order_id";?>"
                data-buttontext="Pay with Razorpay"
                data-name="Shopx Shopping"
                data-description="Online Shopping Platform"
                data-image="https://drive.google.com/uc?id=1YmQGsmzgb43BBz1hswDHm_TMB0Kh8dLf"
                data-prefill.name="<?php echo $_SESSION['user_name'];?>"
                data-prefill.email="<?php echo $_SESSION['user_email'];?>"
                data-prefill.contact="<?php echo $_SESSION['user_phone'];?>"
                data-theme.color="#03adfc"
                
            >
            // alert(response.razorpay_payment_id);
            </script>
        
            <input type="hidden" custom="Hidden Element" name="hidden">
            <input type="hidden" name="transaction_id" value="<?php echo 'OID'.rand(10,100)."transcationid";?>"/>
            <input type="hidden" name="order_id" value="<?php echo $orderId; ?>"/>
            <?php if(isset($cartpay)){ ?><input type="hidden" name="paybycart" value="<?php echo $cartpay; ?>"/> <?php } ?>
    </form>
    <img src="assets/img/secure-pay.png" style = "width : 150px; margin : 20px" />
    <small>Powered By Razorpay</small>

<div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
