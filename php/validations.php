<?php
    include('words.php');
    // include('connect.php');
    // include('select.php');
    include('dayword.php');

    $word = 'barco';

    function validationWord($word){
        if(strlen($word) !== 5)
            echo "<script>alert('Apenas palavras com 5 letras!');</script>";
        else{
            $words = getWords();

            if(!in_array(strtolower($word), $words)){
                echo "<script>alert('Palavra não aceita!');</script>";
            }
        }
        
        $dayWord = validationDayWord();
        if(http_response_code())
            validationWordBdTermo(strtolower($dayWord['Value']), strtolower($word));
    }

    function validationDayWord(){

        $dayWord = dayWord();

        if($dayWord === NULL)
            echo "<script>alert('Palavra não encontrada!');</script>";
        else
            return $dayWord;
        
    }

    function validationWordBdTermo($dayWord, $wordAttempt){
        // echo $dayWord .' '.$wordAttempt;
        for($i = 0; $i < strlen($wordAttempt); $i++){
            $letterAttempt = $wordAttempt[$i];
            for($j=0; $j < strlen($wordAttempt); $j++){
                $arrayDayWord[$j] = $dayWord[$j];
            }
            
            $exist= false;
            $rightPlace = false;
            
            $exist = in_array($letterAttempt, $arrayDayWord);
            $rightPlace = $arrayDayWord[$i] === $letterAttempt;
            
            $letter = new Letter();
            $letter->setLetter($letterAttempt, $exist, $rightPlace);
            $letterResult[$i] = $letter;           
        }

        $wordResult = new WordResult;
        $wordResult->setWordResults($letterResult, $dayWord === $wordAttempt);
        
        if(http_response_code()){
            return $wordResult;
        
        
        // echo '<pre>';
        // print_r($wordResult);
        // echo '</pre>';
        }
    }

    class Letter{
        public $Value;
        public $Exists;
        public $RightPlace;

        function setLetter($value, $exist, $rightPlace){
            $this->Value = $value;
            $this->Exists = $exist;
            $this->RightPlace = $rightPlace;
        }
    }

    class WordResult{
        // public Letter $Letters;
        public $Success;
        public $arrayLetter;

        function setWordResults($letters, $success){
            $this->arrayLetter = $letters;
            $this->Success = $success;
        }

        function getWord(){
            return $this->arrayLetter;
        }

        function getSuccess(){
            return $this->Success;
        }
    }

    validationWord($word);
    // validationWordBdTermo('barco', 'pardo');
    // validationWordBdTermo('barco', 'barco');

?>