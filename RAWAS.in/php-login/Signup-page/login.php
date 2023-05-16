<!-- +++++++++++++++ PHP ++++++++++++++ -->

<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome.php");
                            
                        }
                    }

                }

    }
}    


}


?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RAWAS.in Login Page</title>
        <link rel="stylesheet" href="login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    </head>

    <body>




        <!-- =============== WEB LOGIN =============== -->

        <div class="card">
            <div class="logincard">
                <div class="login-card-header">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#00abfb" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                      </svg>
                    </a>
                    <img width="250" src="white.png" alt="...">
                </div>
                <h1>Sign-in to Rawas.in</h1>
                <form action="" method="post">
                <a href="#" class="btn" style="margin-bottom: 1.5rem;">
                    <img width="40" src="google.svg" alt="">Continue with Google</a>
                <a href="#" class="btn" style="margin-bottom: 1.5rem;">
                    <img width="50" src="apple.svg" alt="">Continue with Apple</a>
                </a>

                <br>
                <div class="or">
                    <div class="line"></div>
                    <p>or</p>
                    <div class="line"></div>
                </div><br>
                <div class="input-group">
                    <input type="text" name="username" id="input" placeholder="Phone, email or username">
                </div>
                <br>
                <div class="input-group">
                    <input type="password" name="password" id="input" placeholder="Password">
                </div>
                <br><br>
                <button type="submit"> 
            
              <strong> Next</strong></button>
        
                <a href="#" class="btn btn1">Forgot Password</a>
                <div class="signup">Don't have a account?
                    <a href=" # ">
                        <a href="register.php"><b>Sign up </b></a>
                    </a>
                </div>
            </div>
</form>
            <div class="foot">
                <center>
                    <footer>Copyright © 2023 - 2024 RAWAS.in®. All rights reserved.</footer>
                </center>
            </div>
        </div>
    </body>

    </html>