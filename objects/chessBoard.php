<?php
namespace chess;

class ChessBoard{
    public $Pieces = [];
    private $_ranks = array(1,2,3,4,5,6,7,8);
    private $_files = array('A','B','C','D','E','F','G','H');

    public function Draw(){
        //for drawing turn around ranks
        $ranks = array_reverse($this->_ranks);
        echo "<table>";
        foreach($ranks as $rank){
            echo "<tr style='background-color:green; width: 50px; height: 50px'>";
            foreach($this->_files as $file){
                $pieceFound = false;
                echo "<td>";
                foreach($this->Pieces as $piece){
                    if($piece->Position == $file . $rank){
                        $pieceFound = true;
                        switch($piece->Name){
                            case "rook":
                                echo $piece->Color == "white" ? "&#9814;" : "&#9820;";
                                break;
                            case "bishop":
                                echo $piece->Color == "white" ? "&#9815;" : "&#9821;";
                                break;
                            case "knight":
                                echo $piece->Color == "white" ? "&#9816;" : "&#9822;";
                                break;
                            case "queen":
                                echo $piece->Color == "white" ? "&#9813;" : "&#9819;";
                                break;
                            case "king":
                                echo $piece->Color == "white" ? "&#9812;" : "&#9818;";
                                break;
                            case "pawn": 
                                echo $piece->Color == "white" ? "&#9817;" : "&#9823;";
                                break;

                        }
                    echo "{$file}{$rank}: {$piece->Name}";
                        break;
                    }
                }
                if(!$pieceFound){
                    echo "{$file}{$rank}";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}