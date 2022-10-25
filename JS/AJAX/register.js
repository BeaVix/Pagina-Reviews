/* Fetch para registrarse */
async function signUp(){
    const form = document.querySelector('#form-registrarse');

    let data = new FormData(form);
    let response = await fetch('../Private/User/registrar.php', {
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