
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

<h2>
  <a href="/movie/one/1">Film 1</a>
</h2>

<h2>
  <a href="/category/one/1">Category 1</a>
</h2>

<h2>
  <a href="/cinema/one/1">Cinema 1</a>
</h2>

<h2>
  <a href="/room/one/1">Room 1</a>
</h2>

<?php
include '../Template/footer.html.php';
?>
