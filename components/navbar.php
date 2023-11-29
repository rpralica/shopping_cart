<nav class="navbar navbar-expand navbar-light bg-light ms-3">
    <a href="index.php" class="navbar-brand ">Home</a>
   <?php if(isset($_SESSION['id'])){
   require_once "components/navbarLoged.php";
   } 
   else{
    require_once "components/navbarLogin.php";
   }
   
   ?>
</nav>