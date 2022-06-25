<?php
    include('connect.php');
    function registration(){
        $word = $_POST['palavra'];
        $day = $_POST['dia'];

        $pdo = Connect();
        $sql = $pdo->prepare("INSERT INTO daywords(Value, Day) VALUES (UPPER('$word'), '$day')");
        $sql->execute();
        unset($pdo);
        header('Location: painel.php');
    }
    registration();
?>