<?php
session_start();
if (!isset($_POST['product_id']) || empty($_POST['product_id'])) {
    die('Morate selektovati proizvod');
}
if (!isset($_POST['quantity']) || empty($_POST['quantity'])) {
    die('Morate unijeti količinu');
}
require_once "db.php";
require_once "functions.php";
$productId = realEscape($_POST['product_id']);

$quantity = realEscape($_POST['quantity']);
$userId = realEscape($_SESSION['id']);
$query = $conn->query("SELECT * FROM products WHERE id = $productId");
$result = $query->fetch_all(MYSQLI_ASSOC);
$price=$result[0]['price'];
$productName = $result[0]['name'];
$total=realEscape($price*$quantity);

var_dump($productName);


$queryOrder=$conn->query(
    "INSERT INTO orders (id,product_id,user_id,product_name,price,quantity) 
    VALUES(NULL,$productId,$userId,'$productName',$total,$quantity)");

header("Location:../cart.php");

