<?php
    include('connect.php');
    function delete(){
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        $pdo = Connect();
        $sql = $pdo->prepare("DELETE FROM daywords WHERE Id = $id");
        $sql->execute();
        unset($pdo);
        header('Location: painel.php');
    }
    delete();
?>