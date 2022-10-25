/* actualiza el perfil del usuario */
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

async function reloadProfileReviews(){
    const profBody = document.querySelector('#perfil-reviews');
    let response = await fetch('../Templates/User/userReviews.php', {
        method: 'POST'
    });
    let result = await response.text();
    profBody.innerHTML = result;
}

async function sendProfileData(nombre, avatar, desc){
    let data = new FormData();
    data.append('nombre', nombre);
    data.append('avatar', avatar);
    data.append('desc', desc);
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