<?php 
session_start();
include "components/head.php";
include "operations/productsphp.php";
include "components/navbar.php";
?>

 <div style="background-color:lightgrey;" class="mt-4 p-3  text-white rounded container">
            <h1 style="text-align: center;">Proizvodi</h1>

        </div>
<br><br>
<form action="search.php" method="GET">

<div class="container ">
    <div class="row">
        <div class="col-md-12 d-flex ms-auto">
<input type="text" class="form-control" name="searchProducts">
<button  class="btn btn-success offset-1">Pretraži</button>
        </div>
    </div>
</div>

</form>

<title>Proizvodi</title>

<body>
    <br><br>
    <div class="container mt-3">

       
    </div>
    <br>
    <form action="products.php" method="get">
        <div class="container">
            <div class="row ">
                <?php foreach ($results as $result) : ?>
                    <div class="col-md-4 d-inline-block">
                    
                        <ul class="list-group">
                            <li class="list-group-item bg-info text-center text-dark fw-bold">
                                Naziv: <?php echo  $result['name']; ?><br>


                            </li>
                            <li class="list-group-item bg-info text-center text-dark fw-bold">Cijena:
                                <?php echo $result['price']; ?> KM
                                <br>
                                <a href="product.php?id=<?php echo $result["id"] ?>">Pogledaj detaljno</a>
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