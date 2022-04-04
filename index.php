<?php 
namespace chess;
require_once './template/top.php';
require_once './objects/piece.php';
require_once './objects/chessBoard.php';

$chessBoard = new ChessBoard();

$rook = new piece("rook", "A1", "white");
$rook = new piece("rook", "H1", "white");
$horse = new piece("knight", "B1", "white");
$horse = new piece("knight", "G1", "white");
$bishop = new piece("bishop", "C1", "white");
$bishop = new piece("bishop", "F1", "white");
$queen = new piece("queen", "D1", "white");
$king = new piece("king", 'E1', "white");
$pawn = new piece("pawn", "A2", "white");
$pawn = new piece("pawn", "B2", "white");
$pawn = new piece("pawn", "C2", "white");
$pawn = new piece("pawn", "D2", "white");
$pawn = new piece("pawn", "E2", "white");
$pawn = new piece("pawn", "F2", "white");
$pawn = new piece("pawn", "G2", "white");
$pawn = new piece("pawn", "H2", "white");

$rook = new piece("rook", "A8", "white");
$rook = new piece("rook", "H8", "white");
$horse = new piece("knight", "B8", "white");
$horse = new piece("knight", "G8", "white");
$bishop = new piece("bishop", "C8", "white");
$bishop = new piece("bishop", "F8", "white");
$queen = new piece("queen", "D8", "white");
$king = new piece("king", 'E8', "white");
$pawn = new piece("pawn", "A7", "white");
$pawn = new piece("pawn", "B7", "white");
$pawn = new piece("pawn", "C7", "white");
$pawn = new piece("pawn", "D7", "white");
$pawn = new piece("pawn", "E7", "white");
$pawn = new piece("pawn", "F7", "white");
$pawn = new piece("pawn", "G7", "white");
$pawn = new piece("pawn", "H7", "white");

$chessBoard->Pieces[] = $rook;
$chessBoard->Pieces[] = $horse;
$chessBoard->Pieces[] = $pawn;
$horse->move("D2");

$chessBoard->Draw();

require_once './template/bottom.php';