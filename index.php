<?php 
namespace chess;
require_once './template/top.php';
require_once './objects/piece.php';
require_once './objects/chessBoard.php';

$chessBoard = new ChessBoard();

$rook = new piece("rook", "A1", "white");
$horse = new piece("knight", "B1", "white");
$pawn = new piece("pawn", "A2", "white");

$chessBoard->Pieces[] = $rook;
$chessBoard->Pieces[] = $horse;
$chessBoard->Pieces[] = $pawn;
$horse->move("D2");

$chessBoard->Draw();

require_once './template/bottom.php';