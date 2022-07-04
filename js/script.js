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
    
        if(parseInt(row) === this.currentRow){
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
            if(document.querySelector('.edit').innerHTML === '')
                moveLeft();
            // Colocando valor vazio no campo
            setCurrentPositionValue('');
        }
        else if(key === 'Enter'){
            // Enviar requisição para o backend
            sendWord();
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

function sendWord(){
    var word = '';
    word = this.getWord();
    
    if(word.length < 5){
        alert('A palavra deve possuir 5 letras!');
    }
    else{
        requestWord(word.toLocaleLowerCase());
    }
}

function getWord(){
    var word = '';

    const row = document.querySelector(`[row="${this.currentRow}"]`);
    // console.log(row);

    if(row !== undefined){
        for(let i = 0; i < row?.children.length; i++){
            const letter = row?.children.item(i)?.innerHTML;
            if(letter !== undefined){
                word += letter;
            }
        }
    }

    return word;
}

// Keyboard
keyboardLetter.forEach(keyb => keyb.addEventListener('click', clickKeyboard));

function clickKeyboard(e){
    if(!success){
        var keyLetter = e.target;
        var letter = keyLetter.getAttribute('keyboard-key');
        // console.log(letter);

        
        // RegExp para verificar se o que foi clicado é uma letra
        if(/[a-zA-Z]/.test(letter) && letter.length === 1){
            setCurrentPositionValue(letter);
            moveRight();
        }
        else if(letter === 'ArrowLeft')
            moveLeft();
        else if(letter === 'ArrowRight')
            moveRight();
        else if(letter === 'Backspace'){
            if(document.querySelector('.edit').innerHTML === '')
            moveLeft();
            
            setCurrentPositionValue('');
        }
        else if(letter === 'Enter'){
            // Enviar requisição para o backend
            sendWord();
        }
    }
}

// Adicionando efeito nos elementos
function results(response){
    // console.log(response);
    var result = response;
    const row = document.querySelector(`[row="${this.currentRow}"]`);

    for(let i = 0; i < result.arrayLetter.length; i++){
        let validationLetter = result.arrayLetter[i];
        pos = row.querySelector(`[pos="${i}"]`);
        // console.log(pos)
        var countAttempt = validationLetter.CountAttempt
        if(validationLetter.Exists){
            if(validationLetter.CountDayWord === 1){
                
            }
            if(validationLetter.RightPlace)
                pos?.classList.add('right');
            else
                pos?.classList.add('place');
        }else
            pos?.classList.add('wrong');
        // Removendo edição e linha ativa
        setTimeout(() => {
            pos?.classList.remove('edit');
            pos?.classList.remove('active');
        },2000);
    }

    // Próxima linha e notificação
    setTimeout(() => {
        if(result.Success){
            this.success = true;
            console.log('Sucesso!');
        }else
            this.enableNextRow();
        
        this.setKeyboardColor(result);
    },1400);
}


function enableNextRow(){
    this.currentRow++;

    const row = document.querySelector(`[row="${this.currentRow}"]`);
    if(row !== undefined){
        for(let i = 0; i < row?.children.length; i++){
            const letter = row?.children.item(i);
            letter?.classList.add('active');
            if(i == 0)
                letter?.classList.add('edit');

            // console.log(letter.parentNode)
        }
    }
}

function setKeyboardColor(validations){
    for(let i = 0; i < validations.arrayLetter.length; i++){
        const validationLetter = validations.arrayLetter[i];
        // console.log(validationLetter);
        var element = document.querySelector(`[keyboard-key="${validationLetter.Value.toUpperCase()}"]`);

        if(validationLetter.Exists){
            if(validationLetter.RightPlace){
                element?.classList.remove('place');
                element?.classList.add('right');
            }else{
                if(!element.classList.contains('right'))
                    element?.classList.add('place');
            }
        }else
            element?.classList.add('wrong');
    }
}


// REQUISIÇÃO POST SEM REFRESH
function requestWord(word){
    sendAjax(word);
}