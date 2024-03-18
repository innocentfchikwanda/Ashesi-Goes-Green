<?php
    // Including the connection file
    include("../settings/connection.php");
    $userEmail = $POST['email'];

    $linkToken = bin2hex(random_bytes(20));
    $linkToken_Hash = hash("sha256", $linkToken);

    $linkExpiration = date("Y-m-d H:i:s", time() + 60 * 1440);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="" method="POST">
            <h1>Reset Password</h1>
            <div class="input-box">
                <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <button type="submit" class="button">Send Email</button>
            <div class="register-link">
            <p>We will send you an email to reset your password!!!</p>
           </div>
        </form>
    </div>
</body>
</html>