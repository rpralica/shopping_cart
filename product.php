<?php include "components/head.php";
include "operations/functions.php";
session_start();
include "operations/db.php";
include "components/navbar.php";
?>
<?php
$id = realEscape($_GET['id']);
$query = $conn->query("SELECT * FROM products WHERE id=$id;");
$result = $query->fetch_assoc();
?>

<title><?php echo $result['name'] ?></title>

<body>
    <div class="container">
        <div class="row">
            <div class="col offset-3">
                <br>
                <h1 class="text-center offset-2 fw-bold ">Proizvod: <?php echo $result['name'] ?></h1>
                <br>

                <div class="card  bg"><br>
                    <div class="card-title fw-bold text-center h1"><?php echo $result['name']; ?></div>
                    <div class="card-body">
                        <h3><strong>Opis: </strong> <?php echo $result['description']; ?></h3>
                        <h4><strong>Cijena: </strong><?php echo $result['price']; ?> KM</h4>
                        <h4><strong>Slika : </strong><?php echo $result['image']; ?></h4>
                        <h4><strong>Količina: </strong>
                            <?php
                            echo $result['quantity'] < 1  ?  "Nema na stanju "  :  $result['quantity']
                            ?></h4>

                    </div>

                </div>
                <br>
                <?php if (isset($_SESSION['id'])) : ?>

                    <form action="operations/cartphp.php" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 d-flex ms-1">
                                    <input type="number" class="form-control" name="quantity" > <br>
                                    <input type="hidden" class="form-control" name="product_id" value="<?php echo $result['id']?>"> <br>
                                    
                                    <button class="btn btn-lg btn-dark offset-1 " href="">Dodaj</button>
                                </div>
                            </div>
                        </div>
                    </form>




                <?php else : ?>

                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>Niste ulogovani !</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <a class="btn btn-warning offset-3" href="login.php"><strong>Kliknite da se ulogujete.</strong></a>

                <?php endif ?>
            </div>
        </div>
    </div>
</body>

</html>