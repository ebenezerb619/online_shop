<?php

include "../config/db.php";

if(!isset($_SESSION['user_id'])){
header("Location: ../auth/login.php");
}

include "../templates/header.php";

?>

<h2>Our Products</h2>

<form method="GET">

<input type="text" name="search" placeholder="Search product">

<button>Search</button>

</form>

<div class="products">

<?php

// $result=$conn->query("SELECT * FROM products");

if(isset($_GET['search'])){

$search=$_GET['search'];

$result=$conn->query("SELECT * FROM products WHERE name LIKE '%$search%'");

}else{

$result=$conn->query("SELECT * FROM products");

}

while($row=$result->fetch_assoc()){

?>

<div class="card">

<img src="../images/<?php echo $row['image']; ?>">

<div class="card-body">

<h3><?php echo $row['name']; ?></h3>

<p class="price">GHS <?php echo $row['price']; ?></p>

<button>Buy Now</button>

</div>

</div>

<?php } ?>

</div>

<?php include "../templates/footer.php"; ?>