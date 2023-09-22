const d = document


const $form = d.querySelector('.form-agregarModulo')
const $input = d.querySelector('input[name="url_youtube"]')

$form.addEventListener('submit', e=> {
    const iframe = $input.value;

    const expRegular = /^<iframe\b[^>]*><\/iframe>$/i;

    if(!expRegular.test(iframe)){
        const smal = `<small>*El campo debe contener una etiqueta iframe de YouTube válida.</small>`
        $input.insertAdjacentHTML("afterend",smal)
        e.preventDefault()
    }
})
