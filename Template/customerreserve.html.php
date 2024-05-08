<?php
include 'Template/header.html.php';
?>

<form action="/reservation/reserve">
    <label for="name">Nom</label>
    <input type="text" name="name" id="name">
    <label for="firstname">Prénom</label>
    <input type="text" name="firstname" id="firstname">
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
    <input type="submit" value="Réserver">
</form>

<?php
include 'Template/footer.html.php';
?>