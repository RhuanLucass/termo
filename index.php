<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
        define('HOME', 'http://localhost/Projetos%20Novos/termo/');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termo</title>
    <base id="urlHome" href="<?=HOME?>">
    <!-- CSS -->
    <link rel="stylesheet" href="<?=HOME?>css/style.css">

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <header>
            <h1>Termo</h1>
        </header>
        <main class="board">
            <div class="board-row" row="0">
                <div class="letter active edit" pos="0" ></div>
                <div class="letter active" pos="1" ></div>
                <div class="letter active" pos="2" ></div>
                <div class="letter active" pos="3" ></div>
                <div class="letter active" pos="4" ></div>
            </div>
            <div class="board-row" row="1">
                <div class="letter" pos="0" ></div>
                <div class="letter" pos="1" ></div>
                <div class="letter" pos="2" ></div>
                <div class="letter" pos="3" ></div>
                <div class="letter" pos="4" ></div>
            </div>
            <div class="board-row" row="2">
                <div class="letter" pos="0" ></div>
                <div class="letter" pos="1" ></div>
                <div class="letter" pos="2" ></div>
                <div class="letter" pos="3" ></div>
                <div class="letter" pos="4" ></div>
            </div>
            <div class="board-row" row="3">
                <div class="letter" pos="0" ></div>
                <div class="letter" pos="1" ></div>
                <div class="letter" pos="2" ></div>
                <div class="letter" pos="3" ></div>
                <div class="letter" pos="4" ></div>
            </div>
            <div class="board-row" row="4">
                <div class="letter" pos="0" ></div>
                <div class="letter" pos="1" ></div>
                <div class="letter" pos="2" ></div>
                <div class="letter" pos="3" ></div>
                <div class="letter" pos="4" ></div>
            </div>
            <div class="board-row" row="5">
                <div class="letter" pos="0" ></div>
                <div class="letter" pos="1" ></div>
                <div class="letter" pos="2" ></div>
                <div class="letter" pos="3" ></div>
                <div class="letter" pos="4" ></div>
            </div>
        </main>
        <section class="keyboard">
            <div class="keyboard-row keyboard-row-first">
                <div class="letter" keyboard-key="Q">Q</div>
                <div class="letter" keyboard-key="W">W</div>
                <div class="letter" keyboard-key="E">E</div>
                <div class="letter" keyboard-key="R">R</div>
                <div class="letter" keyboard-key="T">T</div>
                <div class="letter" keyboard-key="Y">Y</div>
                <div class="letter" keyboard-key="U">U</div>
                <div class="letter" keyboard-key="I">I</div>
                <div class="letter" keyboard-key="O">O</div>
                <div class="letter" keyboard-key="P">P</div>
            </div>
            <div class="keyboard-row keyboard-row-second">
                <div class="letter" keyboard-key="A">A</div>
                <div class="letter" keyboard-key="S">S</div>
                <div class="letter" keyboard-key="D">D</div>
                <div class="letter" keyboard-key="F">F</div>
                <div class="letter" keyboard-key="G">G</div>
                <div class="letter" keyboard-key="H">H</div>
                <div class="letter" keyboard-key="J">J</div>
                <div class="letter" keyboard-key="K">K</div>
                <div class="letter" keyboard-key="L">L</div>
                <div class="letter" keyboard-key="Backspace">&larr;</div>
            </div>
            <div class="keyboard-row keyboard-row-third">
                <div class="letter" keyboard-key="Z">Z</div>
                <div class="letter" keyboard-key="X">X</div>
                <div class="letter" keyboard-key="C">C</div>
                <div class="letter" keyboard-key="V">V</div>
                <div class="letter" keyboard-key="B">B</div>
                <div class="letter" keyboard-key="N">N</div>
                <div class="letter" keyboard-key="M">M</div>
                <div class="letter enter" keyboard-key="Enter">Enter</div>
            </div>
            <?php include('php/validations.php'); ?>
        </section>
    </div>
    <script src="<?=HOME?>js/script.js"></script>
    <script src="<?=HOME?>js/ajax.js"></script>
    <!-- <script src="js/words.js"></script> -->
</body>

</html>