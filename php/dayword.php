<?php
    include('connect.php');

    function dayWord(){
        $hoje = date('Y/m/d');

        $pdo = Connect();
        $sql = $pdo->prepare("SELECT Value FROM daywords WHERE Day = '$hoje'");
        $sql->execute();

        $info = $sql->fetch();

        // echo $info['Value'];
        return $info;
    }
    // dayWord();
?>