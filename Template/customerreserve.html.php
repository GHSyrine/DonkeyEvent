<?php
include 'Template/header.html.php';
?>
<div class="bg-dark text-white">
    <form class="d-flex justify-content-center p-2" action="/reservation/reserve/0" method="Post">
        <input type="hidden" name="movieName" value="<?= $data["movieName"] ?>">
        <input type="hidden" name="date" value="<?= $data["date"] ?>">
        <input type="hidden" name="time" value="<?= $data["time"] ?>">
        <input type="hidden" name="roomTitle" value="<?= $data["roomTitle"] ?>">
        <input type="hidden" name="seats" value="<?= $data["seats"] ?>">
        <input type="hidden" name="seanceId" value="<?= $data["seanceId"] ?>">

        <label for="lastname">Nom</label>
        <input type="text" name="lastname" id="lastname">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <input class="bg-warning" type="submit" value="Réserver">
    </form>
</div>
<?php
include 'Template/footer.html.php';
?>