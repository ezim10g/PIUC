<?php
require_once('autenticate.php');

if(!verificar_autenticacao()){
        header("location: ../FRONT-END/index.php");
        exit();
}
?>
<img src="../FRONT-END/assets/<?php echo $_SESSION['fotoPerfil'];?>" class="img-perfil" alt="imagem de perfil">
        
        <p>Nome de Usuário: <?php echo $_SESSION['nome'];?></p>
        <p>Email: <?php echo $_SESSION['email'];?></p>
        <p>Interesses: nenhum</p>
        <p>Envio de NewsLetter: <?php if($_SESSION['newsLetter']){
                echo "sim";
        }else{
                echo "não";
        } ;?></p>
        <p>Tipo Perfil: <?php if($_SESSION['tipoPerfil'] == 1){
                echo "admin";
        }else if($_SESSION['tipoPerfil'] == 1){
                echo "membro";
        }else{
                echo "comum";
        };?></p>
        
        

        <button>Editar Perfil</button><button>Excluir Conta</button>
