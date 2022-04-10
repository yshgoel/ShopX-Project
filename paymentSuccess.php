<?php include('components/header.php'); ?>
<?php
  if(!isset($_SESSION['logged_in'])){
    header('location: index.php');
     exit;
  }
  if(!isset($_GET['payment_message'])){
     header('location: index.php');
     exit;
  }
?>
<head>
    <title>Payment successful</title>
</head>
<body>

<section id = "" class = "cart container my-5 py-5">
        <div class="container mt-5">
            <h1 class = "font-weight-bold">Order Placed 🎉</h1>
            <h5 class = "font-weight-bold"><?php echo $_GET['payment_message'] ?></h5>
            <hr>
            <small>You will recieve an email for shipment details. Stay tuned!</small><br>
            <a class = "mt-5" href="shop.php"><button class = "btn btn-primary mt-5">Shop More!</button></a>
        </div> 
    </section>
   
<?php include('components/footer.php'); ?>