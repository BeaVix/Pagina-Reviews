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


function anonSignIn(){

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