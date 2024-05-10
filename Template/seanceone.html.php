<?php
include 'Template/header.html.php';
?>
<?php
$placeTotal = $data->getRoom()->getNumber_seat();
$placeRestante = $placeTotal - count($data->getSeats());
?>
<div class="bg-dark text-white">
<h1 class="text-center">Sélectionnez vos places</h1>
<p class="text-center text-warning"><?= $placeRestante . " / " . $placeTotal ?></p>
<hr />

    <form action="/seance/reserve/<?= $data->getId() ?>" method="POST">
        <?php
        for ($i = 1; $i <= $data->getRoom()->getNumber_row(); $i++) { ?>
            <div class="d-flex flex-wrap justify-content-center">
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
        <div class="d-grid gap-2 mt-4 mb-4 col-1 mx-auto border-warning">
            <input type="hidden" name="seance_id" value="<?= $data->getId()?>" />
            <input class="bg-warning border-warning " type="submit" value="Réserver" />
        </div>
    </form>
    <h2 class="text-center text-white m-0 border-bottom"><?= $data->getPrice() ?>€ / place</h2>
    </div> 
    <?php
                  include 'Template/footer.html.php';
    ?>
