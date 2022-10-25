/* envia el reply y lo actualiza intantaneamente */
async function repliesForm(id){
    const form = document.querySelector('#reply-to'+id);
    let data = new FormData(form);
    data.append('id', id);
    let response = await fetch('../Private/Authentification/repliesAuth.php', {
        method: 'POST',
        body: data
    });
    let res = await response.text();
    if(res == '1'){
        reloadReplies(id);
        console.log('reply enviado :)');
    }else{
        console.log('reply no enviado :(');
        console.log(res)
    }
}

async function reloadReplies(id){
    const replie = document.querySelector('#replies'+id);
    let data = new FormData();
    data.append('id', id);
    data.append('reloadReps', true);
    let response = await fetch('../Templates/Replies/replies.php', {
        method: 'POST',
        body: data
    });
    let res = await response.text();
    replie.innerHTML = res;
}

/* Elimina el replie */

async function deleteReplies(id, revId){
    let data = new FormData();
    data.append('id', id);
    let response = await fetch('../Private/Replies/deleteReplies.php', {
        method: 'POST',
        body: data
    });
    let res = await response.text();
    if(res == '1'){
        reloadReplies(revId);
        console.log('reply eliminado)');
    }else{
        console.log(res);
    }
}