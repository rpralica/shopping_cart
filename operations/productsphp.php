<?php include "operations/db.php";

$query = $conn->query("SELECT * FROM products");
$results = $query->fetch_all(MYSQLI_ASSOC);
