<?php
    session_start();

    if (isset($_SESSION['userId'])){
        unset($_SESSION['userId']);

        // Destroy all data registered the session
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log Out</title>
  <link rel="stylesheet" type="text/css" href="../css/logout.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="">
            <h1>Logging Out</h1><br><br>
            <div class="logout">
                <p>You have logged out!!!</p><br>
                <p>Click the link to <a href="login.php">Log in</a>.</p><br>
            </div>
        </form>
    </div>
</body>
</html>