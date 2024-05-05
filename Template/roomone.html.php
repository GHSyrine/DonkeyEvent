Nom de la salle : <?=$data->getName()?>
Type : <?=$data->getType()?>

<?php

$seatWidth = 100;
$seatHeight = 100;

$number_Seat = $data->getNumber_Seat();
$number_Row = $data->getNumber_row();
$seatPerRow = $number_Seat/$number_Row;

$svgWidth = $seatWidth * $number_Seat;
$svgHeight = $seatHeight * $number_Row;

var_dump($data) ;
echo "<svg width='$svgWidth' height='$svgHeight' xmlns='http://www.w3.org/2000/svg'>";
for ($row=0; $row<$number_Row; $row++){

    for ($seat=0; $seat<$seatPerRow; $seat++) {
        $x = $seat * $seatWidth;
        $y = $row * $seatHeight;
        echo "<g transform='translate($x, $y)'>";
        echo "<rect x='10' y='80' width='80' height='10' fill='#A0522D' />"; // Repose-pieds
        echo "<rect x='20' y='40' width='60' height='40' fill='#A0522D' />"; // Siège
        echo "<rect x='10' y='40' width='10' height='40' fill='#A0522D' />"; // Accoudoir gauche
        echo "<rect x='80' y='40' width='10' height='40' fill='#A0522D' />"; // Accoudoir droit
        echo "</g>";
    
    }
}

echo "</svg>";
if(!empty($data->getShows())):
foreach($data->getShoww() as $show) :?>
<a href="/show/one/<?=$show->getId()?>">
<span style="background:#fcb2e8;padding:5px"><b><?=$show->getPrice()?>€</b> - <b><?=$show->getDate()?></b></span>
<?php endforeach;
endif;?>