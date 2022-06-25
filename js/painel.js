const add = document.getElementById('nova-palavra');
const edit = document.querySelectorAll('.editar');
const layout = document.getElementById('layout');
const modal = document.querySelector('section#modal');
const closeButton = document.querySelectorAll('.close-modal');
const modalInserir = document.querySelector('.modal-inserir');
const modalEditar = document.querySelector('.modal-editar');

const wordEdit = document.getElementById('word-edit');
const dayEdit = document.getElementById('day-edit');
const idEdit = document.getElementById('id-edit');

add.addEventListener('click', showModal);

function showModal(){
    // console.log(modal)
    modal.style.display = 'flex';
    modalInserir.style.display = 'block';
    modalEditar.style.display = 'none';
}

edit.forEach(update => update.addEventListener('click', showModalEdit));

function showModalEdit(){
    modal.style.display = 'flex';
    modalInserir.style.display = 'none';
    modalEditar.style.display = 'block';

    const value = this.getAttribute('data-value');
    const date = this.getAttribute('data-date');
    const id = this.getAttribute('data-id');
    
    wordEdit.value = value;
    dayEdit.value = date;
    idEdit.value = id;

}

layout.addEventListener('click', closeLayout);
closeButton.forEach(close => close.addEventListener('click', closeLayout));

function closeLayout(){
    modal.style.display = 'none';
}


