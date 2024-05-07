<?php
session_start();
include '../Template/header.html.php';
?>

<h1>Welcome to Pathy</h1>
<?php
  var_dump($_SESSION);
if (isset($_SESSION['log'])) {?>
    <div class="alert alert-sucess">
   <?php  echo $_SESSION['log'];
    unset($_SESSION['log']);
  
} ?>
<?php
include '../Template/footer.html.php';
?>
