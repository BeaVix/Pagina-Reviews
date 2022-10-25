document.addEventListener('DOMContentLoaded', ()=>{
    const stars = document.querySelectorAll('.star-picker-container');

    Array.from(stars).forEach((element)=>{
        element.addEventListener('click', loadStars)
    });
})

function loadStars(event){
    const children = event.currentTarget.children;
    let counter;
    let input;
    let stars;
    let posStar = false;
    let value;

    Array.from(children).forEach((element)=>{
        if(element.tagName == 'SPAN'){
            counter = element;
        }else if(element.getAttribute('name') == 'rating'){
            input = element;
        }else if (element.tagName == 'DIV'){
            stars = element.children;
        }
    });

    Array.from(stars).forEach((star)=>{
        let name = Number(star.getAttribute('name').slice(4, 5));
        
        if(event.target == star){
            posStar = Number(star.getAttribute('name').slice(4, 5));
            value = posStar;
            let tarPos = star.getBoundingClientRect(); //Posicion del elemento
            let posX = event.clientX - tarPos.left; //Saca posicion del click relativo al elemento
            
            if(posX > 15){
                changeStars(star, 'full');
            }else if(posX <= 15 && posX > 7){
                changeStars(star, 'half');
                value -= 0.5;
            }else{
                changeStars(star, 'empty');
                value -= 1;
            }
        }
        if(posStar &&  name > posStar){
            changeStars(star, 'empty');
        }else if (name < posStar || !posStar){
            changeStars(star,'full');
        }
    })

    if(posStar){
        counter.innerHTML = value + '/5';
        input.value = value;
    }   
}

/* Cambia la clase del elemento para que muestre
   el icono de estrella correspondiente */
function changeStars(star, type){
    switch(type){
        case 'full':
            star.classList.replace('bx-star', 'bxs-star');
            star.classList.replace('bxs-star-half', 'bxs-star');
        break;

        case 'half':
            star.classList.replace('bx-star', 'bxs-star-half');
            star.classList.replace('bxs-star', 'bxs-star-half');
        break;

        case 'empty':
            star.classList.replace('bxs-star', 'bx-star');
            star.classList.replace('bxs-star-half', 'bx-star');
        break;
    }
}