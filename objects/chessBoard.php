<?php
namespace chess;
use GuzzleHttp\Client;

class ChessBoard{
    public $Pieces = [];
    public $History = [];
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
                    
                    if($rank > 1){
                        $FEN .= "/";
                    }
                }
                
                
            }
        }
        return "{$FEN} {$this->whoseTurn()} {$this->canRokade()} {$this->canEnpassant()} {$this->getMovesWithoutPawnOrCapture()} {$this->getAmountOfMoves()}";
    }

    public function GetAnalysis($FEN){
        $client = new Client([
            'base_uri' => 'https://lichess.org/api/',
            'timeout' => 2.0
        ]);

        $response = $client->request('GET', "cloud-eval?fen={$FEN}&multiPv=5");
        
        return json_decode($response->getBody());
       
    }
    public function Move($name, $from, $to){
        $this->History[] = [
            'name' => $name,
            'from' => $from,
            'to' => $to,
            'action' => null
        ];

        foreach($this->Pieces as $piece){
            if($piece->Position == $from){
                $piece->Move($to);
            }
        }
    }

    public function SetStart(){
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

        $this->Pieces = [$rook1,$rook2,$rook3,$rook4,$horse1,$horse2,$horse3,$horse4,$bishop1,$bishop2,$bishop3,$bishop4,$king1,$king2,$queen1,$queen2,$pawn1,$pawn2,$pawn3,$pawn4,$pawn5,$pawn6, $pawn7, $pawn8, $pawn9,$pawn10,$pawn11,$pawn12,$pawn13,$pawn14,$pawn15,$pawn16];
    }

    private function whoseTurn(){
        $key = array_key_last($this->Pieces);
        return $this->Pieces[$key]->Color == "white" ? "b" : "w";
    }

    private function canRokade(){
        //TO-DO: implement rokade check
        return "KQkq";
    }

    private function canEnpassant(){
        //TO-DO: Implement enpassant check
        return "-";
    }

    private function getMovesWithoutPawnOrCapture(){
        $history = array_reverse($this->History);

        $amountOfMoves = 1;
        foreach($history as $move){
            if($move['action'] == 'capture'){
                return $amountOfMoves;
            }
            elseif($move['action'] == 'enpassant'){
                return $amountOfMoves;
            }
            elseif($move['name'] == 'pawn'){
                return $amountOfMoves;
            }
            $amountOfMoves++;
        }
        return $amountOfMoves;
    }

    private function getAmountOfMoves(){
        return count($this->History);
    }
}