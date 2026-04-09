<?php
session_start();

include "../db.php";

if(isset($_SESSION['user_id'])){

    if($_SESSION['user_type']=="admin"){

        if(isset($_POST['submit'])){

            $image = $_FILES['image']['name'];
            $temp_location = $_FILES['image']['tmp_name'];
            $tar_location = "../images/";

            $name = $_POST['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];

            $sql = "INSERT INTO menu_items(image, name, price, category)
            VALUES('$image', '$name', '$price', '$category')";

            $result = mysqli_query($connect, $sql);

            if(!$result){
                echo "Error: ".mysqli_error($connect);
            }
            else{
                move_uploaded_file($temp_location, $tar_location.$image);
                $message = "Items Added Successfully";
            }
        }
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
        form input{
            display: block;
            margin: 10px;
        }
        .main form{
            background-color: lightcyan;
            padding: 20px;
        }
        .message{
            color: green;
            padding: 10px;
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
        <form action="add_items.php" method="post" enctype="multipart/form-data">
            <?php if(isset($message)){ ?>
            <p class="message"><?php echo $message ?></p>
            <?php }?>
            Upload Item Image<input type="file" name="image" id="">
            Enter Item Name<input type="text" name="name" id="">
            Enter Item Price <input type="number" name="price">
            Enter Item Category <input type="text" name="category">
            <input type="submit" class="submitbtn" value="Add Items" name="submit">
        </form>
    </div>
</body>
</html>