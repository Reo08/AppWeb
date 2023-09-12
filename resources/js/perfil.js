const d = document;

const $btn_lapiz = d.querySelector(".btn-edit-img");
const $ventana_flotante = d.querySelector(".ventana-flotante");
const $btn_cancelar = d.querySelector(".ventana-flotante form a");

$btn_lapiz.addEventListener("click", e=> {
    $ventana_flotante.classList.toggle("bajar");
})

$btn_cancelar.addEventListener("click", e=> {
    e.preventDefault();
    $ventana_flotante.classList.toggle("bajar");
})
