<?php
include "db.php";
session_start();

$sql = "SELECT * FROM menu_items";
$result = mysqli_query($connect, $sql);

if(!$result){
    echo "Error : ".mysqli_error($connect);
}

$message = "";

if(isset($_GET['added_message'])){
    $message = $_GET['added_message'];
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Food Order</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.card{
transition:0.3s;
}
.card:hover{
transform:translateY(-10px);
box-shadow:0px 8px 20px rgba(0,0,0,0.2);
}
</style>

</head>

<body>

<div class="container-fluid">

<!-- Header -->
<div class="row">
<div class="col-sm-12 p-0 text-center shadow-lg">

<h1 style="background-color:lightcoral;" class="py-3">
Order Your Favourite Items
</h1>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
<div class="container-fluid">

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link active" href="index.php">Home</a>
</li>
</ul>

<ul class="navbar-nav ms-auto">

<?php if(!isset($_SESSION['user_id'])){ ?>

<li class="nav-item">
<a class="nav-link active" href="login.php">Login</a>
</li>

<li class="nav-item">
<a class="nav-link active" href="register.php">Register</a>
</li>

<?php } ?>

<?php if(isset($_SESSION['user_id'])){ ?>

<li class="nav-item">
<a class="nav-link active" href="user_dashboard.php">Dashboard</a>
</li>

<?php } ?>

</ul>

</div>
</div>
</nav>

</div>
</div>


<!-- Success Message -->

<?php if($message!=""){ ?>

<div class="row mt-3">
<div class="col-md-6 mx-auto">

<div class="alert alert-success text-center">
<?php echo $message; ?>
</div>

</div>
</div>

<?php } ?>


<!-- Menu Items -->

<div class="row my-4 justify-content-center">

<?php while ($row = mysqli_fetch_assoc($result)){ ?>

<div class="col-md-4 d-flex justify-content-center mb-4">

<div class="card" style="width:18rem;">

<img src="./images/<?php echo $row['image']?>" class="card-img-top" style="height:200px;object-fit:cover;">

<div class="card-body text-center">

<h5 class="card-title">
<?php echo $row['name']?>
</h5>

<p class="card-text">
Price : ₹<?php echo $row['price']?>
</p>

<p class="card-text">
<?php echo $row['category']?>
</p>

<?php if(isset($_SESSION['user_id'])){ ?>

<a href="order_item.php?item_id=<?php echo $row['id'];?>&user_id=<?php echo $_SESSION['user_id'];?>" class="btn btn-primary">
Order Now
</a>

<?php } else { ?>

<a href="login.php" class="btn btn-primary">
Order Now
</a>

<?php } ?>

</div>
</div>

</div>

<?php } ?>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>