<?php
namespace chess;

class piece{
    public $name;
    public $position;

    function __construct($name, $position){
        $this->name = $name;
        $this->position = $position;
    }

    public function move($pos){
        $ranks = array(1,2,3,4,5,6,7,8);
        $files = array('A','B','C','D','E','F','G','H');

        //This is the current position before moving.
        $currentFile = $this->position[0];
        $currentFileIndex = array_search($currentFile, $files);
        $currentRank = $this->position[1];
        $currentRankIndex = array_search($currentRank, $ranks);

        switch($this->name){
            case "rook":
                $this->position = $pos;
                break;
            case "knight":
                //check if one goes 2 up or down and one goes 1 up or down. If thats true then valid.
                $goToFileIndex = array_search($pos[0], $files);
                $goToRankIndex = array_search($pos[1], $ranks);
                
                if(($goToFileIndex == $currentFileIndex - 2 || $goToFileIndex == $currentFileIndex + 2) && ($goToRankIndex == $currentRankIndex - 1 || $goToRankIndex == $currentRankIndex + 1)){
                    print_r("moved knight to ${$pos}");
                }
                else if(($goToFileIndex == $currentFileIndex - 1 || $goToFileIndex == $currentFileIndex + 1) && ($goToRankIndex == $currentRankIndex - 2 || $goToRankIndex == $currentRankIndex + 2)){
                    print_r("moved knight to ${pos}");
                }
                else{
                    print_r('invalid knight move');
                }

                $this->position = $pos;
                break;
            case "queen":
                $this->position = $pos;
                break;
            case "king":
                $this->position = $pos;
                break;
            case "pawn":
                $this->position = $pos;
                break;
            case "bishop":
                $this->position = $pos; 
                break;
        }
    }
}