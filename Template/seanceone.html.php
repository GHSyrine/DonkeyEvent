<?php
include 'Template/header.html.php';
?>
<?php
$placeTotal = $data->getRoom()->getNumber_seat();
$placeRestante = $placeTotal - count($data->getSeats());
?>

<h1>Sélectionnez vos places</h1>
<p><?= $placeRestante . " / " . $placeTotal ?></p>
<hr />


<form action="/seance/reserve/<?= $data->getId() ?>" method="POST">
    <?php
    for ($i = 1; $i <= $data->getRoom()->getNumber_row(); $i++) { ?>
        <div class="d-flex">
            <?php for ($j = 1; $j <= ($data->getRoom()->getNumber_seat() / $data->getRoom()->getNumber_row()); $j++) { ?>
                <div class="mx-2 my-2 px-2 py-2">
                    <?php $seatNumber = chr(64 + $i) . $j;
                    $isReserved = false;
                    foreach ($data->getSeats() as $seat) {
                        if ($seat->getNumber() == $seatNumber) {
                            $isReserved = true;
                            break;
                        }
                    }
                    if ($isReserved) { ?>
                        <div>
                            <input type="checkbox" id="<?= $seatNumber ?>" name="<?= $seatNumber ?>" disabled />
                            <label for="<?= $seatNumber ?>"><?= $seatNumber ?></label>
                        </div>

                    <?php } else { ?>
                        <div>
                            <input type="checkbox" id="<?= $seatNumber ?>" name="<?= $seatNumber ?>" />
                            <label for="<?= $seatNumber ?>"><?= $seatNumber ?></label>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <input type="hidden" name="seance_id" value="<?= $data->getId() ?>" />
    <input type="submit" value="Réserver" />
</form>

<h2><?= $data->getPrice() ?>€ / place</h2>


<?php
include 'Template/footer.html.php';
?>