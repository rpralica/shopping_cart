<?php include "components/head.php";
include "operations/registerphp.php";
?>

<title>Register</title>

<body>
    <?php include "components/navbar.php"; ?>
    <div class="container mt-3">
        <div style="background-color: deepskyblue;" class="mt-4 p-3  text-white rounded text-center h1"> Register </div>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <br>
                    <input type="text" class="form-control" name="name" placeholder="Upišite ime" value="<?php echo $name; ?>"><br>
                    <?php if ($errors['name']) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong class=""><?php echo $errors['name'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <input type="text" class="form-control" name="email" placeholder="Upišite e-mail" value="<?php echo $email; ?>"><br>
                    <?php if ($errors['email']) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong><?php echo $errors['email'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>

                    <?php if ($errors['existed']) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong><?php echo $errors['existed'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <input type="password" class="form-control" name="password" placeholder="Upišite password"><br>
                    <?php if ($errors['password']) : ?>
                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                            <strong><?php echo $errors['password'] ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <button name="register" class="btn btn-info offset-4">Register</button>

                </div>
            </div>
        </div>
    </form>


</body>

</html>