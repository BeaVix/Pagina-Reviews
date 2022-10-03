/* Iniciar sesión sin ir directamente a loginAuth.php usando Fetch */
async function signIn(){
    const name = document.querySelector('#email').value;
    const pass = document.querySelector('#psw').value;

    let data = new FormData();
    data.append('user', name);
    data.append('psw', pass);

    let response = await fetch('../Private/loginAuth.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadNav();
    }else{
    }
}

async function reloadNav(){
    const nav = document.querySelector('#nav');
    let response = await fetch('../Templates/navbar.php');
    let result = await response.text();
    nav.innerHTML = result;
    console.log(result);
}

async function signOut(){
    let response = await fetch('../Private/logOut.php');
    let result = await response.text();
    if(result){
        reloadNav();
    }
}

async function reloadProfile(edit){
    const profile = document.querySelector('#perfil');
    let data = new FormData();
    data.append('edit', edit);
    let response = await fetch('../Templates/userProfile.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    profile.innerHTML = result;
}

async function sendProfileData(nombre, avatar){
    let data = new FormData();
    data.append('nombre', nombre);
    data.append('avatar', avatar);
    let response = await fetch('../Private/updateProfile.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadProfile(false);
        reloadNav();
    }else{
        console.log(result);
    }
}

/* Iniciar sesión anonimamente */
async function anonSignIn(){
    let data = new FormData();
    data.append('anon', true);
    let response = await fetch('../Private/loginAuth.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadNav();
    }
}

/* Registrarse */
async function signUp(){
    const form = document.querySelector('#form-registrarse');

    let data = new FormData(form);
    let response = await fetch('../Private/registrar.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if (result == '1') {
        document.querySelector('#email').value = data.get('email');
        document.querySelector('#psw').value = data.get('psw');
        signIn();
    }else{
        console.log(result);
    }
}

/* envia el review y lo actualiza intantaneamente */
async function reviewForm(id, modo){
    const form = document.querySelector('#review'+id);

    let content = new FormData(form);
    let response = await fetch('../Private/reviewsAuth.php', {
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
    let response = await fetch('../Templates/userComment.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    userComment.innerHTML = result;
}

/* envia el reply y lo actualiza intantaneamente */
async function repliesForm(id){
    const form = document.querySelector('#reply-to'+id);
    let data = new FormData(form);
    data.append('id', id);
    let response = await fetch('../Private/repliesAuth.php', {
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
    const replay = document.querySelector('#replies'+id);
    let data = new FormData();
    data.append('id', id);
    let response = await fetch('../Templates/replies.php', {
        method: 'POST',
        body: data
    });
    let res = await response.text();
    replay.innerHTML = res;
}

async function deleteReply(id, revId){
    let data = new FormData();
    data.append('id', id);
    let response = await fetch('../Private/deleteReply.php', {
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

async function reloadProfile(edit){
    const profile = document.querySelector('#perfil');
    let data = new FormData();
    data.append('edit', edit);
    let response = await fetch('../Templates/userProfile.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    profile.innerHTML = result;
}

async function reloadProfileReviews(){
    const profBody = document.querySelector('#perfil-reviews');
    let response = await fetch('../Templates/userReviews.php', {
        method: 'POST'
    });
    let result = await response.text();
    profBody.innerHTML = result;
}

async function sendProfileData(nombre, avatar){
    let data = new FormData();
    data.append('nombre', nombre);
    data.append('avatar', avatar);
    let response = await fetch('../Private/updateProfile.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadProfile(false);
        reloadNav();
    }else{
        console.log(result);
    }
}

async function deleteReview(id){
    let data = new FormData();
    data.append('id', id);
    let response = await fetch('../Private/deleteReview.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadProfileReviews();
    }
    console.log(result);
}