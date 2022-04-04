<?php 

namespace chess;
require_once './template/top.php';
require_once './objects/piece.php';
require_once './objects/chessBoard.php';

$chessBoard = new ChessBoard();

$rook1 = new piece("rook", "A1", "white");
$rook2 = new piece("rook", "H1", "white");
$horse1 = new piece("knight", "B1", "white");
$horse2 = new piece("knight", "G1", "white");
$bishop1 = new piece("bishop", "C1", "white");
$bishop2 = new piece("bishop", "F1", "white");
$queen1 = new piece("queen", "D1", "white");
$king1 = new piece("king", 'E1', "white");
$pawn1 = new piece("pawn", "A2", "white");
$pawn2 = new piece("pawn", "B2", "white");
$pawn3 = new piece("pawn", "C2", "white");
$pawn4 = new piece("pawn", "D2", "white");
$pawn5 = new piece("pawn", "E2", "white");
$pawn6 = new piece("pawn", "F2", "white");
$pawn7 = new piece("pawn", "G2", "white");
$pawn8 = new piece("pawn", "H2", "white");

$rook3 = new piece("rook", "A8", "black");
$rook4 = new piece("rook", "H8", "black");
$horse3 = new piece("knight", "B8", "black");
$horse4 = new piece("knight", "G8", "black");
$bishop3 = new piece("bishop", "C8", "black");
$bishop4 = new piece("bishop", "F8", "black");
$queen2 = new piece("queen", "D8", "black");
$king2 = new piece("king", 'E8', "black");
$pawn9 = new piece("pawn", "A7", "black");
$pawn10 = new piece("pawn", "B7", "black");
$pawn11 = new piece("pawn", "C7", "black");
$pawn12 = new piece("pawn", "D7", "black");
$pawn13 = new piece("pawn", "E7", "black");
$pawn14 = new piece("pawn", "F7", "black");
$pawn15 = new piece("pawn", "G7", "black");
$pawn16 = new piece("pawn", "H7", "black");

$chessBoard->Pieces = [$rook1,$rook2,$rook3,$rook4,$horse1,$horse2,$horse3,$horse4,$bishop1,$bishop2,$bishop3,$bishop4,$king1,$king2,$queen1,$queen2,$pawn1,$pawn2,$pawn3,$pawn4,$pawn5,$pawn6, $pawn7, $pawn8, $pawn9,$pawn10,$pawn11,$pawn12,$pawn13,$pawn14,$pawn15,$pawn16];
$horse1->move("C3");
$horse3->move("A6");

$chessBoard->Draw();
echo "FEN notatie: {$chessBoard->GetFENNotation()}";
echo "<h1>Analysis</h1>";
$chessBoard->GetAnalysis($chessBoard->GetFENNotation());

require_once './template/bottom.php';