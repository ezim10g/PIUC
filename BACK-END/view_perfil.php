<section class="aba-perfil">

        <div class="caixa">
                <span class="icon-close">
                        <ion-icon name="close"></ion-icon>
                </span>
                <div class="titulo-div">
                        <h2>Perfil</h2>
                </div>
                <div class="Perfil">

                        <div id="fotoPerfil">
                                <img src="../FRONT-END/assets/<?php echo $_SESSION['fotoPerfil']; ?>" class="img-perfil"
                                        id="imgPerfil" alt="imagem de perfil">
                                <img src="../FRONT-END/assets/cam-icon.webp" alt="" id="cam-icon">
                        </div>

                        <div class="infoPerfil">

                                <p><strong>Nome de Usuário:</strong>
                                        <?php echo $_SESSION['nome']; ?>
                                </p>
                                <p><strong>Email:</strong>
                                        <?php echo $_SESSION['email']; ?>
                                </p>
                                <p><strong>Interesses:</strong> nenhum</p>
                                <p><strong>Envio de NewsLetter:</strong>
                                        <?php if ($_SESSION['newsLetter']) {
                                                echo "sim";
                                        } else {
                                                echo "não";
                                        }
                                        ; ?>
                                </p>
                                <p><strong>Tipo Perfil:</strong>
                                        <?php if ($_SESSION['tipoPerfil'] == 1) {
                                                echo "admin";
                                        } else if ($_SESSION['tipoPerfil'] == 1) {
                                                echo "membro";
                                        } else {
                                                echo "comum";
                                        }
                                        ; ?>
                                </p>
                                <div class="buttons"><button>Editar Perfil</button><button>Excluir Conta</button></div>

                        </div>
                </div>
                <div id="imgSelect" class="choose-imagens">
                        <div class="titulo">
                                <h2>escolha sua nova foto de perfil</h2>
                        </div>
                        <form action="../BACK-END/Controller/MudarFotoPerfil.php" method="post">
                        <div class="fotos-perfil">
                             <div class="foto-escolha">
                                        <input type="radio" name="foto" id="" value="profile.jpg">
                                        <img src="../FRONT-END/assets/profile.jpg" alt="">

                                </div>
                                <div class="foto-escolha">
                                        <input type="radio" name="foto" id="" value="profile2.png">
                                        <img src="../FRONT-END/assets/profile2.png" alt="">

                                </div>
                                <div class="foto-escolha">
                                        <input type="radio" name="foto" id="" value="profile3.png">
                                        <img src="../FRONT-END/assets/profile3.png" alt="">
                                </div>   
                        </div>
                                
                                <input type="submit" value="Enviar" name="enviarIMG">
                        </form>


                </div>


        </div>
</section>