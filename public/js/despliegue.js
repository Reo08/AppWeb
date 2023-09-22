const d = document
export function despliegueHeaderNav(circulo,desplieguePrincipal,despliegueSecond,despliegueItems,clase){
    const $circulo = d.querySelector(circulo);
    const $items = d.querySelectorAll(despliegueItems);
    

    d.addEventListener('click', e=> {
        if(e.target.matches(circulo) || e.target.matches(`${circulo} *`)){
            console.log("hla")
            d.querySelector(desplieguePrincipal).classList.toggle(clase);
            d.querySelector(despliegueSecond).classList.remove(clase);
        }
        if(e.target == $items){
            d.querySelector(despliegueSecond).classList.toggle(clase);
        }


    })
}