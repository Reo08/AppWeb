const d = document


const $formEliminar = d.querySelector('.form-eliminar')
const $btnAgregarTest =  d.querySelector('.deshabilitado')


$formEliminar.addEventListener('submit', e => {
    let confirmacion = confirm('¿Esta seguro que desea eliminar este curso?')

    if(!confirmacion){
        e.preventDefault()
    }
})


$btnAgregarTest.addEventListener("click", e=> {
    e.preventDefault()
})
