const d = document

const $btn_aggPdf = d.querySelector(".btn-aggPdf");
const $btn_cancelar = d.querySelector(".btn-cancelarAggPdf");

const $pdf = d.querySelector('input[type="file"]')
const $formulario = d.querySelector('.ventana-flotante form')
const $alerta = d.querySelector('.small')

const $formBorrar = d.querySelectorAll('.form-btn-borrar')

const $formBorrarModulo = d.querySelector('.formBtnEliminarModulo')

const $ventana_flotante = d.querySelector(".ventana-flotante");

d.addEventListener('click', e=>{
    if(e.target === $btn_aggPdf){
        e.preventDefault();
        $ventana_flotante.classList.toggle("bajar");
    }
    if(e.target === $btn_cancelar) {
        e.preventDefault();
        $ventana_flotante.classList.toggle('bajar');
    }
})


$formulario.addEventListener('submit', e=> {
    let archivo = $pdf.files[0]

    if($pdf.files.length == 0){
        $alerta.textContent = "Agrega un archivo pdf"
        $alerta.classList.remove('none')
        e.preventDefault()
        return
    }

    if(archivo && archivo.size > 15728640){
        e.preventDefault()
        $alerta.textContent = "El archivo es demasiado grande"
        $alerta.classList.remove('none')
    }else {
        $alerta.classList.add('none')
    }
})


d.addEventListener('submit', e=> {
    if(e.target.matches(".form-btn-borrar")){
        let confirmacion = confirm('¿Seguro que desea eliminar este archivo?')

        if(!confirmacion){
            e.preventDefault()
        }
    }
    if(e.target.matches('.formBtnEliminarModulo')){
        let confirmacion = confirm('¿Seguro que desea eliminar este modulo')

        if(!confirmacion){
            e.preventDefault()
        }
    }
})
