<?php   
    // Conectar ao banco
    function Connect(){
        
        $pdo = new PDO('mysql:host=localhost;dbname=dbtermo','root','');
        
        return $pdo;
        
        // echo '<pre>';
        // print_r($info[0]);
        // echo '</pre>';
    }
?>