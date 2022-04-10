
<?php include('components/header.php'); ?>
<?php
    include('connection/server.php');
    if(!isset($_SESSION['logged_in'])){
        header('location: login.php');
        exit;
    }

    if(isset($_GET['logout'])){
        if(isset($_SESSION['logged_in'])){
            unset($_SESSION['logged_in']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            header('location: login.php');
            exit;
        }
    } 
    if(isset($_POST['change_password'])){
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $user_email = $_SESSION['user_email'];

        if($password !== $confirmPassword){
          header('location: account.php?error=Passwords do not match!');

        }else if(strlen($password) < 6){
          header('location: account.php?error=6 characters need for a password');
        }else{
           
          $stmt = $connection->prepare("UPDATE users SET user_password=? WHERE user_email=?");
          $stmt->bind_param('ss',md5($password),$user_email);

          if($stmt->execute()){
            header('location: account.php?message=Password has been updated successfully');
          }else{
            header('location: account.php?error=Something Went Wrong !');
          }
          
        }
    }
    if(isset($_SESSION['logged_in'])){
        $user_id = $_SESSION['user_id'];
        $stmt = $connection->prepare("SELECT * FROM orders WHERE user_id=? ");
        $stmt->bind_param('i',$user_id);
        $stmt->execute();
        $orders = $stmt->get_result();
    }
?>
<head>
    <title>User Account</title>
</head>

    <section class = "mt-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <div class="account-info">
                    <h3 class="font-weight-bold">Your Account</h3>
                    <hr class="">
                    <p>Name - <span><?php if(isset($_SESSION['user_name'])) {echo ucfirst($_SESSION['user_name']); }?></span></p>
                    <p>Email - <span><?php if(isset($_SESSION['user_email'])) {echo $_SESSION['user_email'];} ?></span></p>
                    <p><a href="#orders" id = "order-btn">Your Orders</a></p>
                    <p><a href="account.php?logout=1" id = "logout-btn">Logout</a></p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <form method = "POST" action="account.php" id="account-form">
                   <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                   <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
                    <h3>Change Password</h3>
                    <hr class = "">
                    <div class="form-group">
                        <label for="">New Password</label>
                        <input type="password" class = "form-control" id="account-password" placeholder="Password" name = "password" required/>
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" class = "form-control" id="account-password-confirm" placeholder="Confirm Password" name = "confirmPassword" required/>
                    </div>
                    <div class="form-group">
                        <input name = "change_password" type="submit" value = "Change Password" class = "btn" id = "change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section id = "orders" class = "orders container">
   
        <div class="container">
            <h2 class = "font-weight-bold">Your Orders</h2>
            <hr>
        </div>
        <table class = "my-5 pt-5">
            <tr>
                <th>ID</th>
                <th>Cost</th>
                <th>Status</th>
                <th>Date</th>
                <th>Details</th>
            </tr>
            <?php  while($row = $orders->fetch_assoc() ){ ?>        
                    <tr>
                        <td>
                        <span><?php echo $row['order_id']; ?></span>
                        </td>

                        <td>
                        <span>₹ <?php echo $row['order_cost']; ?></span>
                        </td>

                        <td>
                        <span><?php echo ucfirst($row['order_status']); ?></span>
                        </td>

                        <td>
                        <span><?php echo $row['order_date']; ?></span>
                        </td>
                    
                        <td>
                        <form method="POST" action="orderDetails.php">
                            <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status"/>
                            <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id"/>
                            <input class="btn btn-primary" name="order_details_btn" type="submit" value="details"/>
                        </form>
                        </td>
                    
                    </tr>
                    

                <?php } ?>        

            
        </table> 
    </section>

    <?php include('components/footer.php'); ?>
