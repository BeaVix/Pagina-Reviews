/* Iniciar sesión sin ir directamente a loginAuth.php usando Fetch */

async function signIn(){
    const name = document.querySelector('#email').value;
    const pass = document.querySelector('#psw').value;

    let data = new FormData();
    data.append('user', name);
    data.append('psw', pass);

    let response = await fetch('../Private/Authentification/loginAuth.php', {
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
    let response = await fetch('../Templates/User/userProfile.php', {
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
    let response = await fetch('../Private/User/updateProfile.php', {
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
    let response = await fetch('../Private/Authentification/loginAuth.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    if(result == '1'){
        reloadNav();
    }
}