<?php 
        require_once('../back-end/autenticate.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PIUC Energia eólica</title>
</head>
<body>
    <!--HEADER-->
    <header>        
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a class="inicioLink">Home</a>
            <a class="sobreLink">Projeto</a>
            <a class="dashLink">DashBoard</a>
            <a class="sobreLink">Sobre</a>
            <a class="contatoLink">Contato</a>
            <a class="newsLink">Newsletter</a>
            <button class="btnLogin-popup">Login</button>
        </nav>    
    </header>

    <main>
        <!--LOGIN-->
        <section class="login">
            <div class="wrapper">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>

                <div class="form-box login">
                <h2>Login</h2>
                <?php
                    if(isset($_GET['loginerror'])){
                        $loginerror = $_GET['loginerror'];
                        echo "<p class='error'> {$loginerror}</p>";
                    }
                ?>
                <form action="#">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" required>
                        <label>Senha</label>
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox"> Lembrar Senha </label>
                        <a href="#">Esqueceu a Senha?</a>
                    </div>
                    <button type="submit" class="btn">Login</button>
                    <div class="login-register">
                        
                        <p>Não tem uma conta?<a href="#" class="register-link"> Registrar</a></p>
                    </div>
                </form>
                </div>

                <div class="form-box register">
                    <h2>Registrar</h2>
                    <?php
                    if(isset($_GET['registererror'])){
                        $registererror = $_GET['registererror'];
                        echo "<p class='error'> {$registererror}</p>";
                    }
                     ?>
                    <form action="#">
                        <div class="input-box">
                                <span class="icon">
                                    <ion-icon name="person"></ion-icon>
                                </span>
                                <input type="text" required>
                                <label>Usuário</label>
                        </div>   
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="mail"></ion-icon>
                            </span>
                            <input type="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="lock-closed"></ion-icon>
                            </span>
                            <input type="password" required>
                            <label>Senha</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox"> Aceito os termos e condições </label>
                        
                        </div>
                        <button type="submit" class="btn">Registrar</button>
                        <div class="login-register">
                        
                        <p>Já tem uma conta?<a href="#" class="login-link"> Logar</a></p>
                    </div>
                    </form>
                </div>

            </div>
        </section>


        <!--INICIO-->
        <section class="inicio">
            <div class="caixa">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>

                <div class="titulo-div">

                    <h2>Introdução a energia eólica!</h2>

                    <p class="infoEolica">Energia eólica é a eletricidade gerada pela força do vento. Ela responde por 8,6% da energia produzida no Brasil, ganhando cada vez mais espaço na matriz elétrica do país.
                    <br>
                    <br>
                    
                    A estrutura em que ocorre a conversão da energia cinética em eletricidade é chamada de aerogerador ou turbina eólica. Trata-se de uma energia consideravelmente mais barata do que as demais, e que não gera emissão de poluentes na atmosfera. Por outro lado, as estruturas instaladas causam ruídos e impactam diretamente a fauna local, podendo levar à morte de pássaros e morcegos.

                    <br>
                    </p>             
                </div>

                <div class="img1">
                <img src="./assets/turbina_eolica_flutuante3.jpg" alt="">
                </div>

                <div class="img2">
                <img src="./assets/EnergiaEolica_PictureAlliance_GettyImages.jpg" alt="">
                </div>
                
            </div>
        </section>

        
        <!--SOBRE-->
        <section class="sobre">
            <div class="caixa">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <div class="titulo-div">
                    <h2>Sobre nós</h2>

                
                </div>
            </div>
        </section>

        <!--DASH BOARD -->
        <section class="dash">
            <div class="caixa">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>

                <div class="titulo-div">
                    <h2>DashBoard</h2>                           
                </div>

                <?php

                if (verificar_autenticacao()) {
                 echo "
                 <div class='cards-container'>
                    <div class='cards'>12V<br>Tensão</div>         
                    <div class='cards'>30 Km/h<br>Vento</div>         
                    <div class='cards'>250º<br> YAW</div>         
                    <div class='cards'>60<br>RPM</div>         
                    <div class='cards'>85º<br>Ataque</div>   
                </div>
                 ";
                } else {
                    echo"
                        <div class='cards-container'>
                            <p>Faça login para ter acesso!</p>
                        </div>
                    ";
                }
                 ?>
               
            </div>
        </section>

        <!--CONTATO -->
        <section class="contato">
            <div class="caixa">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <div class="titulo-div">
                    <h2>Contato</h2>

                
                </div>
            </div>
        </section>

        <!--NEWSLETTER -->
        <section class="news">
            <div class="caixa">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <div class="titulo-div">
                    <h2>Newsletter</h2>                                
                </div>                
            </div>
        </section>

        <!--footer -->
        <footer class="copyright">
        <p>&copy; Copyright: 2023 windpower.eziore.com.br</p>
        </footer>
  
    </main>        

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>