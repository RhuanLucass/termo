// [X] Mapear clique nos botões
// [X] Inserir letra na tela
// [X] Exibir cores
// [X] Cores no teclado
// [X] Próxima linha
// [] Verificar resposta
// [] Linha 6 - Resposta final


function insertColumn(){
    var countColumn = 0 //Início colunas
    var countRow = 1 // Início linhas
    
    // Mapeando cliques nos botões
    document.querySelectorAll('button').forEach(function(button) {
        // Adicionando evento de click
        button.addEventListener("click", function(event) {
            if(countRow <= 6){
                // Pegando id do botão clicado
                var id = event.target.id
                var stringRow = new String('tr-' + countRow)
                const column = document.getElementById(stringRow).children[countColumn] // Seleciona a a coluna da tabela
                
                if(countColumn > 0 && id == "delete"){
                    // Esvaziando a coluna atual e retornando para a anterior
                    countColumn-- 
                    const columnAux = document.getElementById(stringRow).children[countColumn]
                    columnAux.innerHTML = ""    
                    
                    console.log(countColumn)
                    console.log(id)        
                }
                else if(id == 'enter'){
                    // Funções ao apertar enter
                    console.log(countColumn)
                    console.log(id)
                    
                    if(countColumn == 5){
                        // As 5 colunas da linha devem estar ocupadas
                        countRow++
                        countColumn = 0
                        
                        // Palavras
                        var word = 'patas'
                        const splitWord = word.split('')
                        
                        // Comparando as letras e dando o resultado com cores
                        for(var i = 0; i < splitWord.length; i++){
                            
                            const getWord = document.getElementById(stringRow).children[i] // Pegando elementos da linha atual
                            
                            // Iniciando todas as letras como erradas
                            getWord.classList.add('false')

                            // Verificando
                            for(var j = 0; j < splitWord.length; j++){
                                // Letra na posição correta
                                // Se a letra estiver na posição correta
                                if(splitWord[i].toUpperCase() === getWord.innerText){
                                    // Cor - verde
                                    getWord.classList.add('true')
                                    getWord.classList.remove('false')

                                    // Cor no teclado
                                    document.getElementById(getWord.innerText).classList.add('true')
                                    document.getElementById(getWord.innerText).classList.remove('transparent')
                                    document.getElementById(getWord.innerText).classList.remove('incorrect')

                                    console.log('true')
                                    continue
                                }
                                // Letra na posição errada
                                // Se a letra pertence a palavra, mas está em outra possição
                                else if(splitWord[j].toUpperCase() === getWord.innerText
                                && !document.getElementById(stringRow).children[j].classList.contains('true')){
                                    // Cor - amarelo
                                    getWord.classList.add('incorrect')
                                    getWord.classList.remove('false')

                                    // Cor no teclado
                                    // Comparação para que a letra já descoberta continue true mesmo colocada em outra posição
                                    if(!document.getElementById(getWord.innerText).classList.contains('true')){
                                        document.getElementById(getWord.innerText).classList.add('incorrect')
                                        document.getElementById(getWord.innerText).classList.remove('transparent')
                                    }


                                    console.log('incorrect')
                                    continue
                                }
                                // Teclas transparentes no teclado quando não pertencerem a palavra
                                else if(!document.getElementById(getWord.innerText).classList.contains('true') &&
                                !document.getElementById(getWord.innerText).classList.contains('incorrect')){
                                    // Transparência nas teclas erradas
                                    document.getElementById(getWord.innerText).classList.add('transparent')
                                }
                                // ************* CORRIGIR MULTIPLOS INCORRECTS *****************
                            }
                            
                            
                        }
                        
                    }
                    // As comparações só podem ser realizadas quando todas as posições estiverem ocupadas
                    else{
                        alert('A palavra possui 5 letras!')
                    }
                    
                }
                // O programa não insere mais nada depois das 5 posições ocupadas
                else if(countColumn < 5 && id != "delete" && id != "enter"){
                    column.innerHTML = id.toUpperCase()
                    countColumn++
                    console.log(countColumn)
                    console.log(id)
                }
            }
        })
    })
}

insertColumn()

