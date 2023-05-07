﻿<?php 
        include "../BACK-END/view_dashboard.php";
        
        require_once('../BACK-END/autenticate.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleCircular.css">
    <link rel="stylesheet" href="profile.css">
    <title>PIUC Energia eólica</title>
</head>
<body>
    <!--HEADER-->
    <header>        
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a class="inicioLink">Home</a>
            <a class="dashLink">DashBoard</a>
            <a class="sobreLink">Sobre</a>
            <a class="contatoLink">Contato</a>
            <a class="newsLink">Newsletter</a>
            <?php
                if (!verificar_autenticacao()) {
                    include "../BACK-END/view_Btnlogin.php";
                }else{
                    include "../BACK-END/view_profileMenu.php";
                }
            ?>
            
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
                <form action="../BACK-END/login.php" method="post">
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" name="senha" required>
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
                    <form action="../BACK-END/register.php" method="post">
                        <div class="input-box">
                                <span class="icon">
                                    <ion-icon name="person"></ion-icon>
                                </span>
                                <input type="text" name="usuario" required>
                                <label>Usuário</label>
                        </div>   
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="mail"></ion-icon>
                            </span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon">
                                <ion-icon name="lock-closed"></ion-icon>
                            </span>
                            <input type="password" name="senha" required>
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

                        <h2>Home</h2>
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
            <div class="grupo-circular">
                <section class="main">
                        <div class="containerCircular">
                            <div class="circular-progress" id="circular-progress-tensao">
                                <div class="value-container" id="value-container-tensao">-</div>
                            </div>
                        </div>
                    </section>

                    <section class="main">
                        <div class="containerCircular">
                            <div class="circular-progress" id="circular-progress-vento">
                                <div class="value-container" id="value-container-vento">-</div>
                            </div>
                        </div>
                    </section>

                    <section class="main">
                        <div class="containerCircular">
                            <div class="circular-progress" id="circular-progress-yaw">
                                <div class="value-container" id="value-container-yaw">-</div>
                            </div>
                        </div>
                    </section>

                    <section class="main">
                        <div class="containerCircular">
                            <div class="circular-progress" id="circular-progress-rpm">
                                <div class="value-container" id="value-container-rpm">-</div>
                            </div>
                        </div>
                    </section>

                    <section class="main">
                        <div class="containerCircular">
                            <div class="circular-progress" id="circular-progress-pitch">
                                <div class="value-container" id="value-container-pitch">-</div>
                            </div>
                        </div>
                    </section>
                </div>        
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
      <!-- Script -->
      <script src="scriptCircular.js"></script>
      <script src="./profile.js"></script>
</body>
</html>