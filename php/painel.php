<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termo</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/painel.css">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Painel de Controle</h1>
        </header>
        <?php  
            include('crud/select.php');
            $info = select();
        ?> 
        <main>
            <h2>Palavras Adicionadas</h2>
            <div id="painel-main">
                <table>
                    <thead>
                        <th>Palavra</th>
                        <th>Dia</th>
                        <th>Id</th>
                        <th>Editar</th>
                        <th>Apagar</th>
                    </thead>
                    <tbody>
                        <?php foreach($info as $key => $value){ ?>
                        <tr>
                            <td><?php echo $value['Value']?></td>
                            <td><?php echo date('d/m/Y', strtotime($value['Day'])); ?></td>
                            <td class="id"><?php echo $value['Id']?></td>
                            <td class="editar" data-value="<?php echo $value['Value']?>" data-date="<?php echo $value['Day']; ?>" data-id="<?php echo $value['Id']?>"><a>✓</a></td>
                            <td class="apagar"><a href="crud/delete.php?id=<?php echo $value['Id'] ?>">X</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
        
        <section id="new">
            <button id="nova-palavra" title="Adicionar nova palavra">+</button>
        </section>

        <section id="modal">
            <div id="layout"></div>
            <!-- ADICIONAR PALAVRA -->
            <div id="modal-container" class="modal-inserir">
                <span class="close-modal">x</span>
                <h1>Adicionar Palavra</h1>

                <form action="crud/insert.php" method="POST">
                    <label for="word">Palavra:</label>
                    <input type="text" name="palavra" id="word" maxlength="5">

                    <label for="day">Dia:</label>
                    <input type="date" name="dia" id="day" value="<?php echo $value['Day']; ?>">                    

                    <input type="submit" name="add" id="enviar" value="Adicionar">
                </form>
            </div>

            <!-- EDITAR PALAVRA -->
            

            <div id="modal-container" class="modal-editar">
                <span class="close-modal">x</span>
                <h1>Editar Palavra</h1>

                <form action="crud/update.php" method="POST">
                    <label for="word-edit">Palavra:</label>
                    <input type="text" name="palavra-editada" id="word-edit" maxlength="5">

                    <label for="day-edit">Dia:</label>
                    <input type="date" name="dia-editado" id="day-edit">                    
                    <input type="hidden" name="id-editado" id="id-edit">                    

                    <input type="submit" name="add" id="enviar" value="Atualizar">
                </form>
            </div>
        </section>
    </div>

    <script src="../js/painel.js"></script>
</body>
</html>