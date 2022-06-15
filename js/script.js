const div = document.querySelectorAll('.board .letter');
const keyboardLetter = document.querySelectorAll('.keyboard .letter');

var currentRow = 0;
var success = false;

//Seleciona o tecla clicada
div.forEach(letter => letter.addEventListener('click', clickLetter))

function clickLetter(){
    if(!success){
        const pos = this.attributes.pos.value;
        const edit = document.querySelector('.edit');
        const row = this.parentNode.attributes.row.value;
        
        // console.log(row, pos);
    
        if(parseInt(row) === currentRow){
            edit.classList.remove('edit');
            div[pos].classList.add('edit');
        }
    }
}

// Mapeia as teclas clicadas
document.addEventListener('keyup', mapKeyboard);

function mapKeyboard(e){
    if(!success){
        const key = e.key;
        // console.log(e)

        
        // RegExp para verificar se o que foi clicado é uma letra
        if(/[a-zA-z]/.test(key) && key.length === 1){
            setCurrentPositionValue(key);
            moveRight();
        }
        else if(key === 'ArrowLeft')
            moveLeft();
        else if(key === 'ArrowRight')
            moveRight();
        else if(key === 'Backspace'){
            document.querySelector('.edit').innerHTML = '';
            moveLeft();
            // setCurrentPositionValue();
        }
        else if(key === 'Enter'){

        }
    }
}

// Move a tecla clicada para a div selecionada
function setCurrentPositionValue(string){
    const editPos = document.querySelector('.edit');
    editPos?.replaceChildren(string);
}

function moveRight(){
    const editRight = document.querySelector('.edit');
    var index = Number(editRight?.getAttribute('pos'));
    if(index < 4){
        // Adicionando o edit na próxima div
        while(editRight?.parentElement?.children.item(index+1).innerHTML !== ''){
            index++;
        }      

        editRight?.parentElement?.children.item(index+1)?.classList.add('edit');
        // Removendo edit da div anterior
        editRight?.classList.remove('edit');
        
    }else{
        // editRight?.classList.remove('edit');
    }

}

function moveLeft(){
    const editLeft = document.querySelector('.edit');
    var index = Number(editLeft?.getAttribute('pos'))
    
    if(index > 0){
        // Adicionando o edit na div anterior
        editLeft?.parentElement?.children.item(index-1)?.classList.add('edit');
        // Removendo conteúdo da div posterior
        document.querySelectorAll('.edit')[1].classList.remove('edit')
    }
}


// Keyboard
keyboardLetter.forEach(keyb => keyb.addEventListener('click', clickKeyboard));

function clickKeyboard(e){
    if(!success){
        var keyLetter = e.target;
        var letter = keyLetter.getAttribute('keyboard-key');
        console.log(letter)

        
        // RegExp para verificar se o que foi clicado é uma letra
        if(/[a-zA-z]/.test(letter) && letter.length === 1){
            setCurrentPositionValue(letter);
            moveRight();
        }
        else if(letter === 'ArrowLeft')
            moveLeft();
        else if(letter === 'ArrowRight')
            moveRight();
        else if(letter === 'Backspace'){
            document.querySelector('.edit').innerHTML = '';
            moveLeft();
            // setCurrentPositionValue();
        }
        else if(letter === 'Enter'){

        }
    }
}