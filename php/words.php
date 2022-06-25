<?php
    function strFive($value){
        if(strlen($value) === 5)
            return $value;
    }
    
    function getWords(){
        $url = 'https://raw.githubusercontent.com/fserb/pt-br/master/palavras';

        $opts = array('http' =>
            array(
                'method' => 'GET',
                'max_redirects' => '0',
                'ignore_errors' => '1'
            )
        );


        $context = stream_context_create($opts);
        $stream = fopen($url, 'r', false, $context);
        // Variável recebendo array de strings e pegando apenas as strings de tamanho 5
        $string = array_filter(explode("\n",stream_get_contents($stream)), "strFive");

        fclose($stream);

        // echo '<pre>';
        // var_dump($string);
        // echo '</pre>';
        return $string;
    }
    // getWords();
?>