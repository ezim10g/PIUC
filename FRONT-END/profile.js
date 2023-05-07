const perfil = document.getElementById("profileBtn");
const submenu = document.getElementById("submenuperfil");

if(perfil){
    perfil.addEventListener('click', () =>{
        submenu.classList.add("submenuactive")
        

    });
}