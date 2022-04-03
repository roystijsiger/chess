<?php
namespace chess;

class piece{
    public $name;
    public $position;
    public $color;

    private $_ranks = array(1,2,3,4,5,6,7,8);
    private $_files = array('A','B','C','D','E','F','G','H');

    function __construct($name, $position, $color){
        $this->name = $name;
        $this->position = $position;
        $this->color = $color;
    }

    public function move($pos){
        //This is the current position before moving.
        $currentFile = $this->position[0];
        $currentFileIndex = array_search($currentFile, $this->_files);
        $currentRank = $this->position[1];
        $currentRankIndex = array_search($currentRank,  $this->_ranks);
        $goToFileIndex = array_search($pos[0], $this->_files);
        $goToRankIndex = array_search($pos[1],  $this->_ranks);

        if($goToFileIndex <= 0 || $goToFileIndex >= 7){
            die("This is not a space on the chessboard lmao :) ");
        }

        if($goToFileIndex == $currentFileIndex && $goToRankIndex == $currentRankIndex){
            die("The piece didnt move trollolololol");
        }

        switch($this->name){
            case "rook":
                $validation = $this->rookValidation($goToFileIndex,$currentFileIndex,$goToRankIndex,$currentRankIndex);
                if($goToFileIndex == $currentFileIndex || $goToRankIndex == $currentRankIndex){
                    $this->position = $pos;    
                }
                else{
                    die("Invalid rook move :(");
                }
                
                break;
            case "knight":
                $validation = $this->knightValidation($goToFileIndex,$currentFileIndex,$goToRankIndex,$currentRankIndex);
                if($validation){
                    $this->position = $pos;
                }
                else{
                    die("Invalid knight move :( ");
                }
                break;
            case "queen":
                $validation = $this->queenValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex);
                if($validation){
                   $this->position = $pos;
                }                
                break;
            case "king":
                $validation = $this->kingValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex);
                if($validation){
                   $this->position = $pos;
                }                
                break;
            case "pawn":
                $validation = $this->pawnValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex);
                if($validation){
                   $this->position = $pos;
                }                
                break;
            case "bishop":
                $validation = $this->bishopValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex);
                if($validation){
                   $this->position = $pos;
                }                
                break;
        }
    }

    private function queenValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex){
        //TO-DO: Check for pieces in the way
        //TO-DO: Check for captures
        $bishopValidation = $this->bishopValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex);
        $rookValidation = $this->rookValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex);

        if($rookValidation || $bishopValidation){
            return true;
        }
        else{
            return false;
        }
    }

    private function knightValidation($goToFileIndex,$currentFileIndex,$goToRankIndex,$currentRankIndex){
        //TO-DO: Check for pieces in the way
        //TO-DO: Check for captures
        if(($goToFileIndex == $currentFileIndex - 2 || $goToFileIndex == $currentFileIndex + 2) && ($goToRankIndex == $currentRankIndex - 1 || $goToRankIndex == $currentRankIndex + 1)){
            return true;
        }
        else if(($goToFileIndex == $currentFileIndex - 1 || $goToFileIndex == $currentFileIndex + 1) && ($goToRankIndex == $currentRankIndex - 2 || $goToRankIndex == $currentRankIndex + 2)){
            return true;
        }
        else{
            return false;
        }

    }

    private function rookValidation($goToFileIndex,$currentFileIndex,$goToRankIndex,$currentRankIndex){
        //TO-DO: Check for pieces in the way
        //TO-DO: Check for captures
        //TO-DO: Check for castle
        if($goToFileIndex == $currentFileIndex || $goToRankIndex == $currentRankIndex){
            return true;
        }
        return false;
    }

    private function bishopValidation($goToFileIndex,$currentFileIndex,$goToRankIndex,$currentRankIndex){
        //TO-DO: Implement bishop validation
        //TO-DO: Check for captures
        return true;
    }

    private function pawnValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex){

        //white moves forward, black moves backwards (: 
        if(($this->color == "white" && $goToRankIndex + 1) || ($this->color == "black" && $goToRankIndex - 1)){
            //normal pawn move]
            return true;
        }
        elseif(($goToRankIndex + 2 && $currentRankIndex == 1 && $this->color == "white") || ($goToRankIndex -2 && $currentRankIndex == 6 && $this->color == "black")){
            return true;
        }
        else{
            return false;
        }

        //TO-DO: Check for captures
        if(($this->color == "white" && $goToRankIndex == 7) || ($this->color == "black" && $goToRankIndex == 0)){
            //TO-DO: Choose piece
        }

        return true;
    }

    private function kingValidation($goToFileIndex,$currentFileIndex,$goToRankIndex, $currentRankIndex){
        //TO-DO: Implement king validation
        //TO-DO: Check for captures
        //TO-DO: Check for castle
        return true;
    }
}