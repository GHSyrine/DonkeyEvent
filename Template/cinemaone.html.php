<?php
include 'Template/header.html.php';
?>
<body class="container-body bg-dark">
    <div class="container mt-5">
      <h1 class="text-center text-white">Salles de cinéma pour <?= $data->getName(); ?></h1>
      <p class="adress text-center text-white"><?= $data->getAddress(); ?> </p>
        <div class="row mt-4">
            <?php if (!empty($data->getRooms())) :
              foreach ($data->getRooms() as $room) : ?>
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body bg-dark text-capitalize">
                      <a class="card-title text-warning" href="/room/one/<?= $room->getId() ?>"><?= $room->getTitle() ?></a>
                      <p class="card-text text-white"> <?= $room->getType() ?>
                    </div>
                  </div>
                </div>
            <?php
              endforeach;
            endif;
            ?>
          </div>
        </div>
    </div>
</body>
<?php
            include 'Template/footer.html.php';

?>