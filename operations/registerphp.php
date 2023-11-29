
<?php
include "db.php";
include "functions.php";
$name = $email = $password = '';
$errors = ["name" => "", "email" => "", "password" => "", "existed" => ""];
if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($_POST['name'])) {
        $errors['name'] = 'Upišite ime';
    } else {
        $name = realEscape($_POST['name']);
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Upišite email';
    } else {
        $mailQuery = $conn->query("SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($mailQuery) > 0) {
            $errors['existed'] = "Korisnik već postoji u bazi";
            return;
        }
        $email = realEscape($_POST['email']);
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Upišite password';
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $password=realEscape($password);
    }

    if (!array_filter($errors)) {
        $query = $conn->query("INSERT INTO  users (name,email,password) VALUES('$name','$email','$password')");
        if ($query) {
            header("Location:login.php");
        }
    }
}
