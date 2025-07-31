<?php
session_start();

if (isset($_SESSION['username'])) {
    header("location:welcome.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter both username and password.";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) {
        $sql = "SELECT id, username, password FROM login WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION['username'] = $username;
                            $_SESSION['id'] = $id;
                            $_SESSION['loggedin'] = true;
                            header("location:welcome.php");
                            exit;
                        } else {
                            $err = "invalid username or password.";
                        }
                    }
                } else {
                    $err = "No account found with that username.";
                }
            } else {
                $err = "Something went wrong. Please try again.";
            }

            mysqli_stmt_close($stmt);
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Student Login</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2 class="login-title">STUDENT LOGIN</h2>
      <div class="login-form">
        <h3>Welcome Back!</h3>
        <p>Please sign in to your account</p>
        <form action="" method="post">
          <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name = "username" placeholder="Enter your email" required />
          </div>
          <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name = "password" placeholder="Enter your password" required />
          </div>
          <div class="form-options">
            <label><input type="checkbox" /> Remember me</label>
            <a href="#">Forgot password?</a>
          </div>
          <button type="submit" class="login-btn">Sign In</button>
          <a href="register.php" class = "new" target="_blank">New Registration</a>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>
