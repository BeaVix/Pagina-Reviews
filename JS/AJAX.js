/* Iniciar sesión sin ir directamente a loginAuth.php usando Fetch */
async function signIn(){
    const loginbtn = document.querySelector('#nav-login');
    const formErr = document.querySelector('#login-form-error');

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
    console.log(result);
}

function anonSignIn(){

}