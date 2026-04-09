<?php
include "db.php";
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = "user";
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users(name, email, password, type, address, phone)VALUES('$name', '$email', '$password', '$type', '$address', '$phone')";

    $result = mysqli_query($connect ,$sql);
    if(! $result){
        echo "Error : {$conncet->error}";
    }
    else{
        echo "Register Successfully";
    }
    // $sql = "SELECT * FROM users WHERE email = '$email'";
    // $result = mysqli_query($connect, $sql);
    // if(! $result){
    //     echo "Error : {$connect->error}";
    // }
    // else{
    //     if($result->num_rows > 0){
    //         $row = mysqli_fetch_assoc($result);
    //         if($row['password']== $password)
    //             header("location: admin/admin_dashboard.php");
    //     }else{
    //         echo "Password is Worng";
    //     }
    // }
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .form{
            /* position: fixed;
            top: 10%;
            left: 40%; */
            margin: 50px 300px ;
            background-color: lightblue;
            padding: 10px;
        }
        .form input{
            display: block;
            width: 95%;
            padding: 10px;
            margin: 5px;
        }
        .loginbutton{
            background-color: blue;
            color: white;
            width: 20% !important;   
        }
        .textarea{
            display: block;
            width: 99%;
            height: 40%;
        }
    </style>
</head>
<body>
    <form action="register.php" method="post" class="form" >
        Enter Your Name : <input type="name" name="name" id="" require>
        <br>
        Enter Your Email : <input type="email" name="email" id="" require>
        <br>
        Enter Your Password : <input type="password" name="password" id="" require>
        <br>
         Enter Your Address : <textarea name="address" class="textarea" id=""></textarea>
        <br>
         Enter Your Phone Number : <input type="text" name="phone" id="" require>
        <br>
        <input type="submit" value="Sign up" name="submit" class="loginbutton">
        <p>Go for Login: <a href="login.php">Login</a></p>
    </form>
</body>
</html>