<?php include "components/head.php";
include "./operations/loginphp.php";
?>

<title>Login</title>

<body>
    <?php include "components/navbar.php"; ?>
    <div class="container mt-3">
        <div style="background-color: lightgrey;" class="mt-4 p-3  text-white rounded text-center h1">Login</div>
    </div>
    <br>
    <?php if ($errors['notexist']) : ?>
        <div class="alert alert-danger alert-dismissible fade show text-center container" role="alert">
            <strong class=""><?php echo $errors['notexist'] ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <br>
                    <input type="text" class="form-control" name="email" placeholder="Upišite e-mail" value="<?php echo $email; ?>"><br>
                    <?php if ($errors['email']) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong class=""><?php echo $errors['email'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <input type="password" class="form-control" name="password" placeholder="Upišite password"><br>
                    <?php if ($errors['password']) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong class=""><?php echo $errors['password'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <button name="login" class="btn btn-info offset-4">Login</button>

                </div>
            </div>
        </div>
    </form>


</body>

</html>