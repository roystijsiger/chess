<?php 
namespace chess;

require_once './objects/piece.php';

use chess;

$pieces = [];


$rook = new piece("rook", "A1", "white");
$horse = new piece("knight", "B1", "white");
$pawn = new piece("pawn", "A2", "white");

$horse->move("D2");
$pieces = [$rook,$horse,$pawn];

print_r($pieces);

