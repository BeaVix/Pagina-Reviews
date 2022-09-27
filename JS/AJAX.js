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

async function reviewForm(id){
    const form = document.querySelector('#review-'+id);

    let content = new FormData(form);
    let response = await fetch('../Private/reviewsAuth.php', {
        method: 'POST',
        body: content
    });
    let res = await response.text();
    if(res == '1'){
        console.log('Review enviado :)');
    }else{
        console.log('Review no enviado :(');
    }
}
/*
async function loadComment(){
    const userComment = document.querySelector('.card-commet');
}*/