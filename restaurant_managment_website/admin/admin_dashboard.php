<?php
session_start();
if($_SESSION['user_id']){
     if($_SESSION['user_type']=="admin"){
        header("Loaction: admin/admin.dashboard.php");
    }
    if($_SESSION['user_type']=="user"){
        header("Location: ../user_dashboard.php");
    }
}
else{
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        *{
            padding: 0px;
            margin: 0px;
        }
        .header{
            padding: 30px;
            background-color: black;
            color: white;
        }
        .sidebar{
            position: fixed;
            top: 13%;
            padding-top: 20px;
            padding-bottom: 20px;
            height: 100%;
            width: 16%;
            background-color: black;
            color: white;
        }
        .sidebar a{
            text-decoration: none;
            display: block;
            color: white;
            padding-top: 20px;
            padding-bottom: 20px;
            /* padding: 10px; */
            padding-bottom: 10px;
            padding-top: 10px;
            /* margin-left: 10px; */
            width: 100%;
            text-align: center;
        }
        .sidebar a:hover{
            background-color: lightgoldenrodyellow;
            color: black;
            border-radius: 10px;
        }
        .header{
            padding: 30px;
            background-color: black;
            color: white;
            text-align: right;
        }
        .header a{
            text-decoration: none;
            color: white;
            padding: 17px;
            background-color: red;
            border-radius: 10px;
        }
        .main{
            margin-left:250px;
            margin-top: 10px;
            margin-right:10px ;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="../logout.php">Log out</a>
    </div>
    <div class="sidebar">
        <a href="admin_dashboard.php">Admin Daskboard</a>
        <a href="add_items.php">Add Menu Items</a>
        <a href="view_items.php">View Menu Items</a>
        <a href="view_order_items.php">View Order</a>
    </div>
    <div class="main">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi non fuga odio commodi? Magni, praesentium. Cumque officiis ipsam illo accusantium accusamus corrupti laborum vitae similique. Ex aut sint eius consequuntur!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi non fuga odio commodi? Magni, praesentium. Cumque officiis ipsam illo accusantium accusamus corrupti laborum vitae similique. Ex aut sint eius consequuntur!</p>
    </div>
</body>
</html>