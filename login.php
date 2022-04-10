<?php include('components/header.php'); ?>
<?php
 if(isset($_SESSION['logged_in'])){
    header('location: index.php');
    exit;
 }   
 include('connection/server.php');
 if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $stmt = $connection->prepare("SELECT user_id,user_name, user_email, user_password FROM users WHERE user_email = ? AND user_password = ? LIMIT 1");
    $stmt->bind_param('ss',$email,$password);
    if($stmt->execute()){
        $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
        $stmt->store_result();
        if($stmt->num_rows() == 1){
            $stmt->fetch();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;
            header('location: account.php?login_success=Login successfully');
        }else{
            header('location: login.php?error=Account does not exist');
        }
    }else{
        header('location: login.php?error=Something went wrong');
      }
 }
?>
<head>
    <title>Login</title>
</head>


    <section style = "
        background :linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.9)), url('assets/img/bg/login.jpg');
        background-size: cover;
        " id = "" class = "mt-5 py-5">
        
        <div class="max-auto container">
            <form method="POST" action="login.php" class = "my-5" style = "background-color : white; border-radius:15px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" method="POST"  action="login.php" id="login-form">
                <?php if(isset($_GET['error'])){?><p style = "color:red;"><?php echo $_GET["error"]?> </p><?php } ?>
                <div class="container text-center my-4 ">
                    <h2 style = "color:black" class="font-weight-bold">Login</h2>
                    <hr class="mx-auto">
                </div>
                <div class="form-group" >
                    <label for="login-email">📧 Email</label>
                    <input type="email" class = "form-control" id = "login-email" name = "email" placeholder = "abc@xyz.com..." required>
                </div>
                <div class="form-group">
                    <label for="login-password">🙈 Password</label>
                    <input type="password" class = "form-control" id = "login-password" name = "password" placeholder = "123******" required>
                </div>
                <div class="form-group">
                    <input type="submit" class = "btn" id = "login-btn" value = "Login" name = "login_btn" />
                </div>
                <div class="form-group">
                    <a href = "register.php" style = "margin-left : 100px" id = "register-url" class = "btn">New account ? Register</a>
                </div>
            </form>
        </div>

    </section>
    <?php include('components/footer.php'); ?>
