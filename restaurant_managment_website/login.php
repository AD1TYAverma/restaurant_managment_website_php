<?php
include "db.php";
if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);
    if(! $result){
        echo "Error : {$connect->error}";
    }
    else{
        if($result->num_rows > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['password']== $password)
                header("location: admin/admin_dashboard.php");
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_type'] = $row['type'];
                    if($_SESSION['user_id']){
                        if($_SESSION['user_type']=="admin"){
                            header("Loaction: admin/admin.dashboard.php");
                        }
                        if($_SESSION['user_type']=="user"){
                            header("Location: user_dashboard.php"); 
                        }
                    }
        }else{
            echo "Password is Worng";
        }
    }
};


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <style type="text/css">
        .form{
            position: fixed;
            top: 35%;
            left: 40%;
            background-color: lightblue;
            padding: 10px;
        }
        .form input{
            display: block;
            padding: 10px;
            margin: 5px;
        }
        .loginbutton{
            background-color: blue;
            color: white;
            width: 95%;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post" class="form" >
        Enter Your Email : <input type="email" name="email" id="" require>
        <br>
        Enter Your Password : <input type="password" name="password" id="" require>
        <br>
        <input type="submit" value="Log in" name="submit" class="loginbutton">
        <p>Go for Resitration: <a href="register.php">Register</a></p>
    </form>
</body>
</html>