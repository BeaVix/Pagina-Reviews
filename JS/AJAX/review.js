/* envia el review y lo actualiza intantaneamente */

async function reviewForm(id, modo){
    const form = document.querySelector('#review'+id);
    let content = new FormData(form);
    let response = await fetch('../Private/Authentification/reviewsAuth.php', {
        method: 'POST',
        body: content
    });
    let res = await response.text();
    if(res == '1'){
        reloadComment(id, modo);
        console.log('Review enviado :)');
    }else{
        console.log('Review no enviado :(');
    }
}

async function reloadComment(id, modo){
    const userComment = document.querySelector('#comment'+id);
    let data = new FormData();
    data.append('modo', modo);
    data.append('id', id);
    let response = await fetch('../Templates/User/userComment.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    userComment.innerHTML = result;
}

/* Elimina el review del usuario */

async function deleteReview(id){
    let data = new FormData();
    data.append('id', id);
    let response = await fetch('../Private/Review/deleteReview.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadProfileReviews();
    }
    console.log(result);
}