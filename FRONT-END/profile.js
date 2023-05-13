const perfil = document.getElementById("profileBtn");
const submenu = document.getElementById("submenuperfil");
let cont = 0;
if(perfil){
    perfil.addEventListener("click", () =>{
        if(cont == 0){
            submenu.classList.add("submenuactive");
            cont = 1;
        }else{
            submenu.classList.remove("submenuactive");
            cont = 0;
        }
        
        

    });
}

const imagemPerfil = document.getElementById("cam-icon");
if(imagemPerfil){
    imagemPerfil.addEventListener('click',() =>{
        console.log("foi")
    })
}else{
    console.log("erro")
}