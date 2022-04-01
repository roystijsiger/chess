<?php 
namespace chess;

require_once './objects/piece.php';

use chess;

$pieces = [];


$rook = new piece("rook", "A1");
$horse = new piece("knight", "B1");
$pawn = new piece("pawn", "A2");

$horse->move("C3");
$pieces = [$rook,$horse,$pawn];

print_r($pieces);

