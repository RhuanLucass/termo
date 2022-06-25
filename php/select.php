<?php
    include('connect.php');
    function select(){
        $pdo = Connect();
        $sql = $pdo->prepare("SELECT * FROM daywords");
        $sql->execute();

        $info = $sql->fetchAll();
        unset($pdo);
        return $info;

    }
?>