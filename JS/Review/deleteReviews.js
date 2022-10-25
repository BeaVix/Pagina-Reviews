window.addEventListener('DOMContentLoaded', ()=>{
    const del = document.querySelector('#perfil-reviews');
    del.addEventListener('click', (event)=>{
        let target = event.target;
        let closest = target.closest('.delete'); 
        if (!closest) return;
        let id = closest.id.slice(6);
        deleteReview(id);
        console.log(id);
    });
});