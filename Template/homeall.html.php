<?php
session_start();
include '../Template/header.html.php';
?>

<h1>Welcome to Pathy</h1>
<?php
if (isset($_SESSION['login'])) { ?>
  <div class="alert alert-sucess">
    <?php
    echo $_SESSION['login'];
    unset($_SESSION['login']); ?>
  </div>
<?php
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