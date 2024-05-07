<?php

$seatWidth = 100;
$seatHeight = 100;

$number_Seat =100;
$number_Row = 10;
$seatPerRow = $number_Seat / $number_Row;

$svgWidth = $seatWidth * $number_Seat;
$svgHeight = $seatHeight * $number_Row;


for ($row = 0; $row < $number_Row; $row++) {

    for ($seat = 0; $seat < $seatPerRow; $seat++) {
        $x = $seat * $seatWidth;
        $y = $row * $seatHeight;
        // a faire

    }
}


