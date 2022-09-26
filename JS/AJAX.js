/* Iniciar sesión sin ir directamente a loginAuth.php usando Fetch */
async function signIn(){
    const form = document.querySelector('#form-iniciar-sesion');

    let data = new FormData(form);

    let response = await fetch('../Private/loginAuth.php', {
        method: 'POST',
	@@ -15,6 +12,40 @@ async function signIn(){
    if(result == '1'){
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

	@@ -23,7 +54,6 @@ async function reloadNav(){
    let response = await fetch('../Templates/navbar.php');
    let result = await response.text();
    nav.innerHTML = result;
}

async function signOut(){
	@@ -32,9 +62,4 @@ async function signOut(){
    if(result){
        reloadNav();
    }
}
/*
async function reviewForm(){
    const comment = document.querySelector('#comment').value;

    let content = new FormData();
    content.append('comment', comment);

    let response = await fetch('../Private/reviewsAuth.php', {
        method: 'POST',
        body: data
    });
    let res = await response.text();
    if(res == 1){
    
    }
}

async function loadComment(){
    const userComment = document.querySelector('.card-commet');
}

*/
