<?php
session_start();
include "db.php";

if(isset($_SESSION['user_id'])){

    if($_SESSION['user_type'] == "user"){

        if(isset($_GET['user_id']) && isset($_GET['item_id'])){

            $user_id = $_GET['user_id'];
            $item_id = $_GET['item_id'];
            $status = "Pending";

            $sql = "INSERT INTO orders (customer_id, item_id, status) 
                    VALUES ('$user_id', '$item_id', '$status')";

            $result = mysqli_query($connect, $sql);

            if(!$result){
                echo "Error: ".mysqli_error($connect);
            }else{
                header("Location: index.php?added_message=Order Successfully");
                exit();
            }

        }

    }

    if($_SESSION['user_type']=="admin"){
        header("Location: admin/admin_dashboard.php");
        exit();
    }

}else{
    header("Location: login.php");
    exit();
}
?>