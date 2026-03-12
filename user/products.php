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

$search = trim($_GET['search']);

$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
$like = "%{$search}%";
$stmt->bind_param('s', $like);
$stmt->execute();
$result = $stmt->get_result();

}else{

$result = $conn->query("SELECT * FROM products");

}

while($row=$result->fetch_assoc()){

?>

<div class="card">

<img src="../images/<?php echo $row['image']; ?>">

<div class="card-body">

<h3><?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?></h3>

<p class="price">GHS <?php echo htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8'); ?></p>

<button>Buy Now</button>

</div>

</div>

<?php } ?>

</div>

<?php include "../templates/footer.php"; ?>