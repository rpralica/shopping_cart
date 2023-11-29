<?php require_once "db.php";
session_start();



function logUser ($user) {
    $_SESSION['id']=$user['id'];
    $_SESSION['name']=$user['name'];
};

function realEscape ($val) {
    global $conn;
    return $conn->real_escape_string($val);
};

?>