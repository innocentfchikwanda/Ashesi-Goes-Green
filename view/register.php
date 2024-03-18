<?php
    session_start();
    include("../settings/connection.php");
    include("../functions/function.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Collecting data from POST request.
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $dob = $_POST['dob'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        if(!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($role) && !empty($dob) && !empty($email) && !empty($phone) && !empty($password)){

            // Password validation
            if ($password!== $_POST['confirmPassword']) {
                echo "Passwords do not match!";
                exit;
            }

            // Hashing the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Assigning the role based on the family role.
            $roleId = ($role == 1)? 1:2; // superadmin for Father, admin for Mother, standard for others.

            // Save the information to the database.
            $query = "INSERT INTO users (roleId, fname, lname, gender, memberId, dob, email, tel, passwd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, 'issiissss', $roleId, $firstName, $lastName, $gender, $role, $dob, $email, $phone, $hashedPassword);   

            
            // Create and redirect to the login page.
            if (mysqli_stmt_execute($statement)){
                header("Location:../view/login.php");
                die;
            }
            else {
                echo "Error: ".mysqli_error($connection);
            }
            mysqli_stmt_close($statement);
        }
        else{
            echo "Please enter valid information!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="../css/register.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>
<body>
    <div class="register-container">
        <form action="" method="POST" name="registerForm">
            <h1>Register</h1>
            <div class="register">
                <div class="form-field">
                    <input type="text" pattern="[A-Za-z]+" placeholder="First Name" name="firstName" id="firstName" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="form-field">
                    <input type="text" pattern="[A-Za-z]+" placeholder="Last Name" name="lastName" id="lastName" required>
                    <i class='bx bxs-user'></i>
                </div>
                
                <div class="form-field">
                    <input type="date" placeholder="Date of Birth" name="dob" id="dob">
                    <i class='bx bx-calendar'></i>
                </div>
                <div class="form-field">
                    <div class="selection">
                        <select name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="0">Female</option>
                            <option value="1">Male</option>
                        </select>
    
                        <select name="role" required>
                            <option value="">Select</option>
                            <option value="1">Staff</option>
                            <option value="2">Faculty</option>
                            <option value="3">Student</option>
                            <option value="4">Visitor</option>
                            
                        </select> 
                    </div>    
                </div>
                <div class="form-field">
                    <input type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" placeholder="Email" name="email" id="email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="form-field">
                    <input type="tel" placeholder="Phone Number" name="phone" id="phone" pattern="\+[0-9]{1,3}[0-9]{4,14}(?:x.+)?$" title="Use the country code and then the phone number. e.g., +1234567890" required>
                    <i class="bx bxs-phone"></i>
                </div>
                <div class="form-field">
                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" placeholder="Password" name="password" id="password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="form-field">
                    <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="login-link">
                    <p>Already have an account? <a href="../view/login.php">Log in</a></p>
                </div>
                <button type="submit" class="register-button">Register</button>
            </div>
        </form>
    </div>
    <script>
    </script>    
</body>
</html>


