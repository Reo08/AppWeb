const d = document

const $buscador = d.querySelector('.buscarNota')
const $filtrarNombre = d.getElementById('filtrar_nombre')
const $filtrarId =  d.getElementById('filtrar_identificacion')
const $identficacion = d.querySelectorAll('.fila-id')
const $nombre = d.querySelectorAll('.fila-nombre')
const $fila = d.querySelectorAll('.fila')

d.addEventListener('keyup', e=> {
    if(e.target.matches('.buscarNota')){
        if($filtrarNombre.checked){

            let i = 0;

            $nombre.forEach(el => {
                el.textContent.toLowerCase().includes(e.target.value)
                ? $fila[i].classList.remove('filtrar')
                : $fila[i].classList.add('filtrar')
                
                i++
            })

        }else if($filtrarId.checked) {

            let i = 0

            $identficacion.forEach(el => {
                el.textContent.toLowerCase().includes(e.target.value)
                ? $fila[i].classList.remove('filtrar')
                : $fila[i].classList.add('filtrar')

                i++
            })
        }
    }
})