<?php
    include('words.php');
    include('dayword.php');    
    
    wordAttempt();
    function wordAttempt(){
        if(isset($_POST['word'])){
            $wordAtt = $_POST['word'];
            validationWord($wordAtt);
        }

    }

    // Validando se a palavra de tentativa existe
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

    // Validando se o banco de dados retornou a palavra do dia
    function validationDayWord(){

        $dayWord = dayWord();

        if($dayWord === NULL)
            echo "<script>alert('Palavra não encontrada!');</script>";
        else
            return $dayWord;
        
    }

    // Validando se a tentativa é igual a palavra do dia
    function validationWordBdTermo($dayWord, $wordAttempt){
        // echo $dayWord .' '.$wordAttempt;
        for($i = 0; $i < strlen($wordAttempt); $i++){
            $exist= false;
            $rightPlace = false;
            $countDayWord = 0;
            $countAttempt = 0;
            
            $letterAttempt = $wordAttempt[$i];
            
            for($j=0; $j < strlen($wordAttempt); $j++){
                $arrayDayWord[$j] = $dayWord[$j];
                if($arrayDayWord[$i] == $arrayDayWord[$j])
                    $countDayWord++;

                if($letterAttempt == $wordAttempt[$j])
                    $countAttempt++;
            }
            
            
            $exist = in_array($letterAttempt, $arrayDayWord);
            $rightPlace = $arrayDayWord[$i] === $letterAttempt;
            
            $letter = new Letter();
            $letter->setLetter($letterAttempt, $exist, $rightPlace, $countDayWord, $countAttempt);
            $letterResult[$i] = $letter; 

        }

        $wordResult = new WordResult;
        $wordResult->setWordResults($letterResult, $dayWord === $wordAttempt);
        
        if(http_response_code()){
            $result = json_encode($wordResult);
            print_r($result);
        }
    }

    class Letter{
        public $Value;
        public $Exists;
        public $RightPlace;
        public $CountDayWord;
        public $CountAttempt;

        function setLetter($value, $exist, $rightPlace, $countDayWord, $countAttempt){
            $this->Value = $value;
            $this->Exists = $exist;
            $this->RightPlace = $rightPlace;
            $this->CountDayWord = $countDayWord;
            $this->CountAttempt = $countAttempt;
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

?>