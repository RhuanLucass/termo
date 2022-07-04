<?php
    include('connect.php');
    function update(){
        $value= $_POST['palavra-editada'];
        $day = $_POST['dia-editado'];
        $id = $_POST['id-editado'];
        echo $value.','.$day.','.$id;

        $pdo = Connect();
        $sql = $pdo->prepare("UPDATE daywords SET Value = UPPER('$value'), Day = '$day' WHERE Id = $id;");
        $sql->execute();
        unset($pdo);
        header('Location: ../painel.php');
        // return $info;
    }
    update();
?>