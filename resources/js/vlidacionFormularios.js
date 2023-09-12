const d = document


export function validarFormularioEditar(form, inputs, alerta) {
    const $form = d.querySelector(form)
    const $inputs = d.querySelectorAll(inputs)
    const $alertas = d.querySelectorAll(alerta)
    // const $video = d.querySelector('.video')


    $form.addEventListener('submit', e=> {
        let i= 0;
        
        $inputs.forEach( input => {
            if(input.value !== ""){

                let exprecion =  input.dataset.pattern? /^[a-zA-Z0-9\s]{1,255}$/ : /^[a-zA-Z0-9\s]{1,100}$/

                if(!exprecion.test(input.value)){
                    $alertas[i].classList.remove('none')
                    e.preventDefault()
                }else {
                    $alertas[i].classList.add('none')
                }
                i++
            } 

        })


    })
    

}


export function validarTextArea(textarea, formulario, alerta) {
    const $textarea = d.querySelector(textarea)
    const $formulario = d.querySelector(formulario)
    const $alerta = d.querySelector(alerta)

    $formulario.addEventListener('submit' , e=> {
        let exprecion = /^.{0,255}$/
    
        if(!exprecion.test($textarea.value)){
            $alerta.classList.remove('none')
            e.preventDefault()
        }else {
            $alerta.classList.add('none')
        }
    })
}


validarTextArea('textarea','.cont-form-agregarModulo', '.smallArea')
