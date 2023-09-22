const d = document 

const $input = d.querySelector('.buscar-curso input');


export function filtroDeCursos (input, cursos, titulo){
    const $cursos = d.querySelectorAll(cursos)
    const $tituloCursos =  d.querySelectorAll(titulo)
    d.addEventListener('keyup', e =>{
        if(e.target.matches(input)) {
    
            let i = 0;
    
            $tituloCursos.forEach( titulo =>{
                titulo.textContent.toLowerCase().includes(e.target.value)
                ? $cursos[i].classList.remove('filtro')
                : $cursos[i].classList.add('filtro')
    
                i++;
            })
        }
    })
}


filtroDeCursos('.buscar-curso input', '.cursoCard','.cursoCard h3')

