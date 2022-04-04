<?php
namespace chess;

class ChessBoard{
    public $Pieces = [];
    private $_ranks = array(1,2,3,4,5,6,7,8);
    private $_files = array('A','B','C','D','E','F','G','H');

    public function Draw(){
        echo "<table>";
        foreach($this->_ranks as $rank){
            echo "<tr style='background-color:green; width: 50px; height: 50px'>";
            echo $rank;
            foreach($this->_files as $file){
                echo "<td>$file</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}