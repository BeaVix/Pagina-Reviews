window.addEventListener('DOMContentLoaded', ()=>{
    const del = document.querySelector('#reviews');
    del.addEventListener('click', (event)=>{
        let target = event.target;
        let closest = target.closest('.delete-Reply'); 
        if (!closest) return;
        let id = closest.id.slice(7);
        let revId = target.closest('.replies').id.slice(7);
        deleteReply(id, revId);
        console.log(revId);
        console.log(id);
    });
});