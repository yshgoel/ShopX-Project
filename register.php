<?php include('components/header.php'); ?>
<?php
    include('connection/server.php');
    if(isset($_SESSION['logged_in'])){
        header('location: account.php');
        exit;
    }
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        if($password !== $confirmPassword){
            header('location: register.php?error=Passwords do not match');
        }else if(strlen($password) < 6){
            header('location: register.php?error=At Least 6 characters required for password');
        }else{
            $stmt1= $connection->prepare("SELECT count(*) FROM users where user_email=?");
            $stmt1->bind_param('s',$email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();
            if($num_rows != 0){
                header('location: register.php?error=User already exists! Try new one.');
            }else{
                $stmt = $connection->prepare("INSERT INTO users (user_name,user_email,user_password) VALUES (?,?,?)");
                $stmt->bind_param('sss',$name,$email,md5($password));
                if($stmt->execute()){
                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    header('location: account.php?register_success=Registered successfully');
                }else{
                   header('location: register.php?error=Something went wrong');
                }
            }
        }
    }
?>
<head>
    <title>Register</title>
</head>
    <section style = "
        background :linear-gradient(rgba(0,0,0,0), rgba(0,0,0,0.9)), url('assets/img/bg/register.png');
        background-size: cover;
        "
        id = "" class = "mt-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 style = "color:white" class="font-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        
        <div class="max-auto container" >
            <form style = "background-color : white; border-radius:15px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;" id="register-form"  method="POST" action="register.php" >
                <?php if(isset($_GET['error'])){?><p style = "color:red;"><?php echo $_GET["error"]?> </p><?php } ?>
                <div class="form-group" >
                    <label for="register-name">Username</label>
                    <input type="text" class = "form-control" id = "register-name" name = "name" placeholder = "Set Username" required>
                </div>
                <div class="form-group" >
                    <label for="register-email">Email</label>
                    <input type="email" class = "form-control" id = "register-email" name = "email" placeholder = "Enter Email" required>
                </div>
                <div class="form-group">
                    <label for="register-password">Password</label>
                    <input type="password" class = "form-control" id = "register-password" name = "password" placeholder = "Make Password" required>
                </div>
                <div class="form-group">
                    <label for="register-cpassword">Confirm Password</label>
                    <input type="password" class = "form-control" id = "register-confirm-password" name = "confirm-password" placeholder = "Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class = "btn" id = "register-btn" value = "Register" name="register"/>
                </div>
                <div class="form-group">
                    <a href = "login.php" style = "margin-left : 100px" id = "login-url" class = "btn">Already Registered? Login</a>
                </div>
            </form>
        </div>

    </section>

    <?php include('components/footer.php'); ?>