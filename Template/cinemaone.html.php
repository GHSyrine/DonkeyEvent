<?php
include 'Template/header.html.php';
?>
<div class="container mt-5">
  <h1class="text-center">Salles de cinéma pour <?= $data->getName(); ?>-<?= $data->getAddress(); ?> </h1>
    <div class="row mt-4">
      <div class="row mt-4">
        <?php if (!empty($data->getRooms())) :
          foreach ($data->getRooms() as $room) : ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <a class="card-title" href="/room/one/<?= $room->getId() ?>"><?= $room->getName() ?></a>
                  <p class="card-text"> <?= $room->getNumber_Seat() ?>
                    <a href="/room/one/<?= $room->getId() ?>">
                </div>
              </div>
            </div>
        <?php
          endforeach;
        endif;
        include 'Template/footer.html.php'; ?>