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
$chessBoard->move("Horse","A2", "C3");

//$chessBoard->Draw();
echo "FEN notatie: {$chessBoard->GetFENNotation()}";
echo "<h1>Analysis</h1>";

$fenComplete = "{$chessBoard->GetFENNotation()} w KQkq - 0 2";
$chessBoard->GetAnalysis($chessBoard->GetFENNotation());

require_once './template/bottom.php';