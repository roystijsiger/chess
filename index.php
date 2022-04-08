<?php 
namespace chess;

require __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './template/top.php';
require_once './objects/piece.php';
require_once './objects/chessBoard.php';


$chessBoard = new ChessBoard();


$chessBoard->SetStart();
$chessBoard->move("Horse","B1", "C3");
$chessBoard->move("Horse","B8", "A6");
$chessBoard->move("Pawn", "A2", "A4");

//$chessBoard->Draw();
$chessBoard->Draw();
echo "<h1>FEN notation</h1>";
echo "FEN notatie: {$chessBoard->GetFENNotation()}";
echo "<h1>Analysis</h1>";
$analysis = $chessBoard->GetAnalysis($chessBoard->GetFENNotation());

Lines: 
echo "<ul>";
foreach($analysis->pvs as $moveVariation){
    echo "<li>" . $moveVariation->moves . " eval: ". $moveVariation->cp / 100 . "</li>";
}
echo "</ul>";
require_once './template/bottom.php';