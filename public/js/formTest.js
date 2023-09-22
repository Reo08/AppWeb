const d = document
const w = window

const $syncRadio = d.querySelectorAll('.sync-value');
const $radio2 = d.querySelectorAll('.radio2');
const $radio3 = d.querySelectorAll('.radio3');
const $radio4 = d.querySelectorAll('.radio4');
const $radio5 = d.querySelectorAll('.radio5');

$syncRadio.forEach(radio =>{
    radio.addEventListener('input', ()=> {

        if(radio.type === 'radio' && radio.checked){
            const textInput = radio.nextElementSibling;
            textInput.value = textInput.value;
        } else if(radio.type ==="text"){
            const radioInput = radio.previousElementSibling;
            radioInput.value = radio.value
        }
    })
})

$radio2.forEach(radio => {
    radio.addEventListener('input', e=> {
        if(radio.type === 'radio' && radio.checked){
            const textInput = radio.nextElementSibling;
            textInput.value = textInput.value;
        } else if(radio.type ==="text"){
            const radioInput = radio.previousElementSibling;
            radioInput.value = radio.value
        }
    })
})

$radio3.forEach(radio => {
    radio.addEventListener('input', e=> {
        if(radio.type === 'radio' && radio.checked){
            const textInput = radio.nextElementSibling;
            textInput.value = textInput.value;
        } else if(radio.type ==="text"){
            const radioInput = radio.previousElementSibling;
            radioInput.value = radio.value
        }
    })
})
$radio4.forEach(radio => {
    radio.addEventListener('input', e=> {
        if(radio.type === 'radio' && radio.checked){
            const textInput = radio.nextElementSibling;
            textInput.value = textInput.value;
        } else if(radio.type ==="text"){
            const radioInput = radio.previousElementSibling;
            radioInput.value = radio.value
        }
    })
})
$radio5.forEach(radio => {
    radio.addEventListener('input', e=> {
        if(radio.type === 'radio' && radio.checked){
            const textInput = radio.nextElementSibling;
            textInput.value = textInput.value;
        } else if(radio.type ==="text"){
            const radioInput = radio.previousElementSibling;
            radioInput.value = radio.value
        }
    })
})

