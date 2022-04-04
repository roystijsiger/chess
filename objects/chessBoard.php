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
            echo $rank;
            foreach($this->_files as $file){
                $pieceFound = false;
                echo "<td>";
                foreach($this->Pieces as $piece){
                    echo $file . $rank;
                    if($piece->position == $file . $rank){
                        $pieceFound = true;
                        echo $piece->name;
                        break;
                    }
                }
                if(!$pieceFound){
                    echo "No piece";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}