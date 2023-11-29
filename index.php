<?php include "components/head.php"; 
session_start();

$name=strtoupper($_SESSION['name']);
$loggedMessage=""

?>
<title>Home</title>
<body>
  <?php include "components/navbar.php"; ?>
  <div class="container mt-3">
    <div class="mt-4 p-3 bg-primary text-white rounded">
      <h1 style="text-align: center;">
    <?php if(isset($_SESSION['id'])): ?>
     <p> Dobro došli <strong style="color:deeppink; text-shadow: 2px 2px 5px black;"><?php echo $name?></strong> na naš sajt</p>
   <?php else:?>
     <p>Logujte se ili se registrujte da pristupite sajtu !;</p>
   
   <?php endif?>
    </h1>
    </div>
  </div>
</body>
</html>