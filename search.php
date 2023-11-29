<?php require_once "operations/db.php";
require_once "operations/functions.php";
include "components/head.php"; ?>

<?php
if (isset($_GET['searchProducts'])) {

    $search = realEscape($_GET['searchProducts']);
    $query = $conn->query("SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%' ");
    $results = $query->fetch_all(MYSQLI_ASSOC);
}
?>
<title>Search Result</title>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <div class="container">
            <br>
            <h1 class="text-center">Rezultat pretrage</h1>
            <br>
            <div class="row">
                <?php foreach ($results as $result) : ?>
                    <div class="col-md-4 d-inline-block offset-1">

                        <ul class="list-group">
                            <li class="list-group-item bg-info text-center text-dark fw-bold">
                                Naziv: <?php echo  $result['name']; ?><br>
                            </li>
                            <li class="list-group-item bg-info text-center text-dark fw-bold">
                                Opis: <?php echo  $result['description']; ?><br>
                            </li>

                            <li class="list-group-item bg-info text-center text-dark fw-bold">Cijena:
                                <?php echo $result['price']; ?> KM
                                <br>

                            </li>
                            <li class="list-group-item bg-info text-center text-<?php echo $result['quantity'] < 1 ? 'danger' : 'dark'; ?> fw-bold">Količina:
                                <?php echo $result['quantity'] < 1 ? "Nema na stanju" : $result['quantity']; ?>
                                <br>

                            </li>

                        </ul>

                        <br>
                        <br>


                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </form>
</body>

</html>