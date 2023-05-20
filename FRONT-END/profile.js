


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


$(".btnPerfil").click(function(){
    $(".aba-perfil .caixa").addClass("ativar");
    submenu.classList.remove("submenuactive");
    cont = 0;
  });


const imagensdiv = document.getElementById("imgSelect");
$("#cam-icon").click(function(){
    imagensdiv.classList.add("ativar");
  });

const infoPerfil = document.getElementById("container-infoPerfil");
$("#btnEditar").click(function(){
    console.log("ok");
    if(infoPerfil){
        console.log("okok");
    }
    infoPerfil.innerHTML = "<form action='../BACK-END/Controller/editarPerfil.php' method='post'><label>Novo Email</label><input type='email' name='email'><label>Novo Nome</label><input type='text' name='nome' ><label>Envio de NewsLetter?</label><select name='newsLetter'><option value='sim'>Sim!</option><option value='nao'>Não!</option></select><input type='submit'></input></form>";
});
const menuPerfilInfo = document.getElementById('conteudo-perfil');

const btnFecharPerfil = document.getElementById('btnFechar');

btnFecharPerfil.addEventListener('click', ()=>{
    console.log
    
});

$('#btnFechar').click(function(){
    $(".aba-perfil .caixa").removeClass("ativar")
})
if(menuPerfilInfo){
    console.log('idi')
}