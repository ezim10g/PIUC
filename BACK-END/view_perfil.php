<section class="aba-perfil">

        <div class="caixa" id="conteudo-perfil">
                <span class="icon-close" id="btnFechar">
                        <ion-icon name="close" ></ion-icon>
                </span>
                <div class="titulo-div">
                        <h2>Perfil</h2>
                </div>
                <div class="Perfil" id="container-perfil">

                        <div id="fotoPerfil">
                                <img src="../FRONT-END/assets/<?php echo $_SESSION['fotoPerfil']; ?>" class="img-perfil"
                                        id="imgPerfil" alt="imagem de perfil">
                                <img src="../FRONT-END/assets/cam-icon.webp" alt="" id="cam-icon">
                        </div>

                        <div class="infoPerfil" id="container-infoPerfil">

                                <p><span class="text-Perfil">Nome de Usuário:</span >
                                        <?php echo $_SESSION['nome']; ?>
                                </p>
                                <p><span class="text-Perfil">Email:</span >
                                        <?php echo $_SESSION['email']; ?>
                                </p>
                                <p><span class="text-Perfil">Interesses:</span > nenhum</p>
                                <p><span class="text-Perfil">Envio de NewsLetter:</span >
                                        <?php if ($_SESSION['newsLetter']) {
                                                echo "sim";
                                        } else {
                                                echo "não";
                                        }
                                        ; ?>
                                </p>
                                <p><span class="text-Perfil" >Tipo Perfil:</span >
                                        <?php if ($_SESSION['tipoPerfil'] == 1) {
                                                echo "admin";
                                        } else if ($_SESSION['tipoPerfil'] == 1) {
                                                echo "membro";
                                        } else {
                                                echo "comum";
                                        }
                                        ; ?>
                                </p>
                                <div class="buttons">
                                        <button>Editar Dados</button>
                                        <form action="../BACK-END/Controller/DeleteUsuario.php" class="form-Perfil " method="post"><input type="submit" value="Delete Usuario"></form>
                                </div>
                                
                        </div>
                </div>
                <div id="imgSelect" class="choose-imagens">
                        <div class="titulo">
                                <h2>escolha sua nova foto de perfil</h2>
                        </div>
                        <form id="formulario" action="../BACK-END/Controller/MudarFotoPerfil.php" method="post">
                        <div class="fotos-perfil">
                             <div class="foto-escolha">
                                        <input id="radio1" type="radio" name="foto"value="profile.jpg" >
                                        <img onclick="selecionarPerfil1()" src="../FRONT-END/assets/profile.jpg" width="125px" height="125px" alt="">

                                </div>
                                <div class="foto-escolha">
                                        <input id="radio2" type="radio" name="foto"  value="profile2.png" >
                                        <img onclick="selecionarPerfil2()" src="../FRONT-END/assets/profile2.png" width="125px" height="125px" alt="">

                                </div>
                                <div class="foto-escolha">
                                        <input id="radio3" type="radio" name="foto"  value="profile3.png" >
                                        <img onclick="selecionarPerfil3()" src="../FRONT-END/assets/profile3.png" width="125px" height="125px" alt="">
                                </div>   
                        </div>
                                
                        </form>


                </div>


        </div>
</section>

<script>
        let botao=document.getElementById("formulario")


        function selecionarPerfil1(){
               // alert ("clicado")
                let radio1=document.getElementById("radio1")
                radio1.checked=true
                botao.submit()
        }
        function selecionarPerfil2(){
               // alert ("clicado 2")
               let radio2=document.getElementById("radio2")
               radio2.checked=true
               botao.submit()
        }

        function selecionarPerfil3(){
               // alert ("clicado 3")
               let radio3=document.getElementById("radio3")
               radio3.checked=true
               botao.submit()
        }


</script>
