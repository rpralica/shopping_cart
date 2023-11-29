<?php session_start();
require_once "operations/functions.php";
include "components/head.php";
include "components/navbar.php";
require_once "operations/db.php"; ?>

<?php
$userId = $_SESSION["id"];
$count = 1;
$sql = "SELECT 
            product_name,
            SUM(price * quantity) AS totalAll,
            SUM(quantity) AS total_quantity,
            SUM(price * quantity) AS total_price
        FROM 
            orders 
            WHERE 
            user_id = $userId 
        GROUP BY 
            product_name";
$query = $conn->query($sql);
$results = $query->fetch_all(MYSQLI_ASSOC);
?>
<title>Korpa</title>
<body>
    <br><br>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col offset-3">
                    <?php if ($query->num_rows == 0) : ?>
                        <h1>Vaša korpa je prazna</h1>
                    <?php else : ?>
                        <h1 class="text-center ">Vaši proizvodi u korpi </h1><br>
                        <table class="table table-bordered table-striped" style="font-size: larger;text-align: center;">
                            <thead>

                                <tr>
                                    <th>Br.</th>
                                    <th>Naziv</th>
                                    <th>Količina</th>
                                    <th>Cijena (KM)</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php foreach ($results as $result) : ?>
                                    <tr>
                                        <td><?php echo $count++; ?></td>
                                        <td><?php echo $result['product_name']; ?></td>
                                        <td><?php echo $result['total_quantity']; ?></td>
                                        <td><?php echo round($result['total_price'], 2); ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <h3>Ukupno za uplatu: <?php
                                                $query = $conn->query("SELECT SUM(price * quantity) AS total_price FROM orders WHERE user_id = $userId");
                                                $result = $query->fetch_assoc();
                                                $totalSum = $result['total_price'];
                                                echo round($totalSum, 2) . ' KM';
                                                ?></h3>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </form>
</body>
</html>