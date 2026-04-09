<?php
session_start();

include "../db.php";

if($_SESSION['user_id']){
     if($_SESSION['user_type']=="admin"){
        if(isset($_POST['submit'])){
            $order_id =$_POST['order_id'];
            $status = $_POST['status'];
        }
        $sql = "UPDATE orders SET status ='$status' WHERE id ='$order_id' ";
    
        $result = mysqli_query($connect, $sql);
        if(! $result){
            echo "Error : {$connect-> error}";
        }
        else{
            header("Location: view_order_items.php");
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
            top: 0;
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
            overflow-x: auto;
        }
        .main table{
            width: 100%;
            border-collapse:collapse;
        }
        .main th, td{
            border: 1px solid black;
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
        <table>
            <thead>
                <tr>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>Customer Phone</th>
                    <th>Item Id</th>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Item Category</th>
                    <th>Item Price</th>
                    <th>Order Id</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['user_id'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone'] ?></td>
                    <td><?php echo $row['item_id'] ?></td>
                    <td><img src="../images/<?php echo $row['image'] ?>" style="width:80px" alt=""></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><?php echo $row['category'] ?></td>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                        <form action="update_items_status.php" method="post">
                            <input type="text" name="order_id" value="<?php echo $row['id'] ?>" hidden>
                            <br>
                            <select name="status" id="">
                                <option value="pending">Pending</option>
                                <option value="delivered">Deliverd</option>
                            </select>
                            <input type="submit" name="submit" value="submit">
                        </form>
                    </td>
                </tr>
            </tbody>
            <?php }?>
        </table>
    </div>
</body>
</html>