const d = document

const $btn = d.querySelector('.eliminar-cuenta')


$btn.addEventListener('click', e=> {
    let confirmacion = confirm('¿Estas seguro que desea eliminar su cuenta?')

    if(!confirmacion){
        e.preventDefault()
    }
})