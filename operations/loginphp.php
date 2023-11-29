<?php session_start();

include "db.php";
include "functions.php";

$errors = ["email" => "", "password" => "", "notexist" => ""];
$email = $password = '';
if (isset($_POST['login'])) {
    $email = realEscape($_POST['email']);
    $password = $_POST['password'];

    if (empty($_POST['email'])) {
        $errors['email'] = 'Upišite email';
    } else {
        $query = $conn->query("SELECT * FROM users WHERE email='$email'");
        $result = $query->fetch_assoc();
        if (mysqli_num_rows($query) < 1) {

            $errors['notexist'] = "Korisnik ne postoji u bazi";
            return;
        }
        $email = $_POST['email'];
        
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Upišite password';
    } else {
        $verifiedPass = password_verify($password, $result['password']);
        if ($verifiedPass) {
            logUser($result);
            header("Location:products.php");
        } else {
            $errors["password"] = "Neispravan password";
        }
    }

    
  
}
