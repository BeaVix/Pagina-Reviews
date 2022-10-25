window.addEventListener('DOMContentLoaded', ()=>{
    const edit = document.querySelector('#profile-edit');
    let editing = false;
    edit.addEventListener('click',()=>{
        if (editing) {
            let nom = document.querySelector('#nombre').value;
            let avatar = document.querySelector('#avatar').files[0];
            let desc = document.querySelector('#desc').value;
            sendProfileData(nom, avatar, desc);
            edit.classList.replace('bx-save', 'bx-edit');
            editing = false;
        }else{
            reloadProfile(true);
            edit.classList.replace('bx-edit', 'bx-save');
            editing = true;
        }
    });
});