<?php
  session_start();
  include("../settings/connection.php");
  include("../functions/function.php");

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

      // Read the information from the database.
      $query = "SELECT * FROM users where email = ? limit 1";
      $statement = mysqli_prepare ($connection, $query);
      mysqli_stmt_bind_param($statement, 's', $email);
      mysqli_stmt_execute($statement);

      $result = mysqli_stmt_get_result($statement);
                        
      if ($result && mysqli_num_rows($result) > 0){

        $user_data = mysqli_fetch_assoc($result);

        // Verifying the user hashed password.
        if(password_verify($password, $user_data['passwd'])){
            
          session_regenerate_id(true);
          $_SESSION['userId'] = $user_data['userId'];
          $_SESSION['fullname'] = $user_data['fname'] . ' ' . $user_data['lname'];
          $_SESSION['email'] = $user_data['email'];
          
          // Redirect to the administrator dashboard.
          header("Location:../view/dashboard.php");
          die;  
        }
        else{
          $_SESSION['errorMessage'] = 'Invalid Password!!!';
        }
      }
      else{
        $_SESSION['errorMessage'] = 'Ensure you have registered!!!';
      }
    }
    else{
      $_SESSION['errorMessage'] = 'Please enter valid information!!!';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  <div class="wrapper">
    <div id="error-message" class="error-container" style="<?php echo empty($_SESSION['errorMessage'])? 'display:none;': ''; ?>">
      <span class="closeButton" onclick="this.parentElement.style.display='none';">&times;</span> 
      <?php
        if(!empty($_SESSION['errorMessage'])){
          echo htmlspecialchars($_SESSION['errorMessage']);
          unset($_SESSION['errorMessage']);
        }
      ?>
    </div>
    <form action="" method="post">
      <h1>Login</h1>
      <div class="input-box">
        <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="Username" name="email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" placeholder="Password" name="password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        <label><input type="checkbox">Remember Me</label>
        <a href="password.php">Forgot Password</a>
      </div>
      <button type="submit" class="button">Login</button>
      <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>