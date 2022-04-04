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

//$chessBoard->Draw();
echo "FEN notatie: {$chessBoard->GetFENNotation()}";
echo "<h1>Analysis</h1>";

$analysis = $chessBoard->GetAnalysis($chessBoard->GetFENNotation());
var_dump($analysis);die;

require_once './template/bottom.php';