<?php
namespace chess;
use GuzzleHttp\Client;

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
                foreach($this->Pieces as $piece){
                    if($piece->Position == $file . $rank){
                        $pieceFound = true;

                        echo "<td style='color: {$piece->Color}' color='{$piece->Color}'>";
                        switch($piece->Name){
                            case "rook":
                                echo "&#9820;";
                                break;
                            case "bishop":
                                echo "&#9821;";
                                break;
                            case "knight":
                                echo  "&#9822;";
                                break;
                            case "queen":
                                echo "&#9819;";
                                break;
                            case "king":
                                echo "&#9818;";
                                break;
                            case "pawn": 
                                echo "&#9823;";
                                break;

                        }
                        break;
                    }
                }
                if(!$pieceFound){
                    echo "<td>";
                    echo "{$file}{$rank}";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function GetFENNotation(){
        $ranks = array_reverse($this->_ranks);
        $FEN = "";
        foreach($ranks as $rank){
            $amountOfNothingFound = 0;
            foreach($this->_files as $file){
                $nothingFoundReset = false;
                $position = $file . $rank;
                foreach($this->Pieces as $piece){
                    if($piece->Name == "knight"){
                        $letter = "N";
                    }
                    else{
                        $letter = $piece->Name[0];
                    }
                    if($piece->Color == "white"){
                        $letter = strtoupper($letter);
                    }
                    else{
                        $letter = strtolower($letter);
                    }
                    

                    if($piece->Position == $position){
                        if($amountOfNothingFound > 0){
                            $FEN .= "{$amountOfNothingFound}";
                        }
                        $FEN .= $letter;
                        $amountOfNothingFound = 0;
                        $nothingFoundReset = true;
                    }
                }

                if(!$nothingFoundReset){
                    $amountOfNothingFound++;        
                }

                if($file == "H")
                {
                    if($amountOfNothingFound > 0){
                       $FEN .= $amountOfNothingFound;
                       $amountOfNothingFound = 0;
                    }
                    
                    if($rank < 8){
                        $FEN .= "/";
                    }
                }
                
                
            }
        }
        return $FEN;
    }

    public function GetAnalysis($FEN){
        $client = new Client([
            'base_uri' => 'https://lichess.org/api/',
            'timeout' => 2.0
        ]);

        $response = $client->request('GET', 'cloud-eval',[
            'body' => json_encode('{"fen": '.$FEN.'}')
        ]);

        var_dump($response->getBody()); die;
    }
}