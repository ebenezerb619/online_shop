<?php

include "../config/db.php";

if(!isset($_SESSION['user_id'])){

header("Location: ../auth/login.php");

}

include "../templates/header.php";

$result=$conn->query("SELECT * FROM products");

echo "<h2>Products</h2>";

while($row=$result->fetch_assoc()){

echo "<div class='card'>";

echo $row['name']." - GHS ".$row['price'];

echo "</div>";

}

include "../templates/footer.php";

?>