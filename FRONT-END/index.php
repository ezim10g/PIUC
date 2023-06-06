<?php
session_start();
require_once (dirname(__FILE__) ."../../BACK-END/Controller/AutenticateController.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import JQuery-->
    <script src="../BACK-END/IOT/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleCircular.css">
    <link rel="stylesheet" href="styleCircularDark.css">
    <link rel="stylesheet" href="styleCards.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="./styleCards3D.css">

    <title>PIUC Energia eólica</title>
</head>

<body>
    <!-- TEMA -->
    <input type="hidden" id="tema" value="<?php echo $_SESSION['tema']?>">

    <!--LOGO-->
    <h2 class="logo"> 
        <svg id="catavento" viewBox="0 0 100 100">
           <!-- <circle cx="50" cy="50" r="40" fill="none" stroke="black" /> -->
            <line x1="50" y1="50" x2="50" y2="20" stroke="black" />
            <line x1="50" y1="50" x2="76.6" y2="64.1" stroke="black" />
            <line x1="50" y1="50" x2="23.4" y2="64.1" stroke="black" />
        </svg>
        </svg>
    </h2>
    
    <!--HEADER-->
    <header>


        <nav class="navigation">
            <a class="inicioLink">Home</a>
            <a class="dashLink">DashBoard</a>
            <a class="sobreLink">Sobre</a>
            <a class="contatoLink">Contato</a>
            <a class="newsLink">Newsletter</a>
            <?php
            if (verificar_autenticacao()) {
                include "../BACK-END/view_profileMenu.php";
            } else {
                include "../BACK-END/view_Btnlogin.php";
            }
            ?>

        </nav>
        <!--menu hamburguer-->
        <div class="hamburguer">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </header>

    <main>
        <!--LOGIN-->
        <section class="login">
            <div class="wrapper <?php if (isset($_GET['loginerror'])) {
                echo "ativar";
            }
            if (isset($_GET['registererror'])){
                echo "ativar active";
            }
            ?> " >
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>

                <div class="form-box login">
                    <h2>Login</h2>
                    <?php
                    if (isset($_GET['loginerror'])) {
                        $loginerror = $_GET['loginerror'];
                        echo "<p class='error'> {$loginerror}</p>";
                    }
                    ?>
                    <form action="../BACK-END/Controller/LoginController.php" method="post">
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
                    if (isset($_GET['registererror'])) {
                        $registererror = $_GET['registererror'];
                        echo "<p class='error'> {$registererror}</p>";
                    }
                    ?>
                    <form action="../BACK-END/Controller/RegisterController.php" method="post">
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

                <div class="container-geral">

                    <div class="container0">
                        <div class="container1"></div>
                        <div class="container2">
                            <div class="box">
                                <div class="elements bg"></div>
                                <div class="elements2 bg"></div>
                                <div class="card"></div>

                            </div>

                        </div>
                    </div>

                    <div class="container">

                        <div class="Cards" style="--clr:#000000;">
                            <div class="imgBx">
                                <img src="./imagens/ezio.png">
                            </div>
                            <div class="content">
                                <h2>Ezio Vieira</h2>
                                <p class="p">Técnico em desenvolvimento de sistemas - Senai

                                </p>
                                <div class="link">
                                    <a href="https://github.com/ezim10g"><img src="./imagens/github.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>

                                    <a href="mailto:ezim10g@gmail.com"><img src="./imagens/gmail.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>

                                    <a href=" https://wa.me/5511973800160?text=sua%20mensagem"><img
                                            src="./imagens/whatsapp.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>


                                </div>
                            </div>
                        </div>

                        <div class="Cards" style="--clr:#000000;">
                            <div class="imgBx">
                                <img src="./imagens/davyd.png">
                            </div>
                            <div class="content">
                                <h2>Davyd C</h2>
                                <p class="p">Técnico em desenvolvimento de sistemas - Senai
                                </p>
                                <div class="link">
                                    <a href="https://github.com/davydcristiano"><img src="./imagens/github.png"
                                            width="40%" class="media-object  img-responsive img-thumbnail"></a>

                                    <a href="mailto:davyd.senai@gmail.com"><img src="./imagens/gmail.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>

                                    <a href=" https://wa.me/5511967396200?text=sua%20mensagem"><img
                                            src="./imagens/whatsapp.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>


                                </div>
                            </div>
                        </div>

                        <div class="Cards" style="--clr:#000000;">
                            <div class="imgBx">
                                <img src="./imagens/caua.png">
                            </div>
                            <div class="content">
                                <h2>Cauã Rossi</h2>
                                <p class="p">Técnico em desenvolvimento de sistemas - Senai
                                </p>
                                <div class="link">
                                    <a href="https://github.com/CauaRossi"><img src="./imagens/github.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>

                                    <a href="mailto:cauarossi007@gmail.com"><img src="./imagens/gmail.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>

                                    <a href=" https://wa.me/5511952865053?text=sua%20mensagem"><img
                                            src="./imagens/whatsapp.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>


                                </div>
                            </div>

                        </div>

                        <div class="Cards" style="--clr:#000000;">
                            <div class="imgBx">
                                <img src="./imagens/emerson .png">
                            </div>
                            <div class="content">
                                <h2>Emerson S</h2>
                                <p class="p">Técnico em desenvolvimento de sistemas - Senai
                                </p>
                                <div class="link">
                                    <a href="https://github.com/EmersonSotero"><img src="./imagens/github.png"
                                            width="40%" class="media-object  img-responsive img-thumbnail"></a>

                                    <a href="mailto:emersonsotero121@gmail.com"><img src="./imagens/gmail.png"
                                            width="40%" class="media-object  img-responsive img-thumbnail"></a>

                                    <a href=" https://wa.me/5511959318255?text=sua%20mensagem"><img
                                            src="./imagens/whatsapp.png" width="40%"
                                            class="media-object  img-responsive img-thumbnail"></a>


                                </div>
                            </div>


                        </div>


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

                <!-- PROBLEMA DE POSICIONAMENTO DAS DIVS RESULVIDO-->
                <section class="grupo-circular">
                    <div class="containerCircular">
                        <div class="circular-progress" id="circular-progress-vento">
                            <div class="value-container" id="value-container-vento">-</div>
                        </div>
                    </div>

                    <div class="containerCircular">
                        <div class="circular-progress" id="circular-progress-tensao">
                            <div class="value-container" id="value-container-tensao">-</div>
                        </div>
                    </div>

                    <div class="containerCircular">
                        <div class="circular-progress" id="circular-progress-rpm">
                            <div class="value-container" id="value-container-rpm">-</div>
                        </div>
                    </div>

                    <div class="containerCircular">
                        <div class="circular-progress" id="circular-progress-yaw">
                            <div class="value-container" id="value-container-yaw">-</div>
                        </div>
                    </div>

                    <div class="containerCircular">
                        <div class="circular-progress" id="circular-progress-pitch">
                            <div class="value-container" id="value-container-pitch">-</div>
                        </div>
                    </div>


                </section>
            </div>
        </section>

        <!--DASH BOARD DARK -->
        <section class="dash-dark">
            <div class="caixa">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>

                <div class="titulo-div">
                    <h2>DashBoard - Dark</h2>
                </div>

                <!-- PROBLEMA DE POSICIONAMENTO DAS DIVS RESOLVIDO-->
                <section class="container-dark">

                    <div class="card">
                        <div class="percent" id="line-vento" style="--clr:#04fc43;--num:90">
                            <div class="dot" id="dot-vento"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70"></circle>
                            </svg>
                            <div class="number">
                                <p>Vento</p>
                                <h2 id="valor-vento">-</h2>
                                <span>
                                    <h3>km/h</h3>
                                </span>

                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="percent" id="line-tensao" style="--clr:#fc04fc;--num:80">
                            <div class="dot" id="dot-tensao"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70"></circle>
                            </svg>
                            <div class="number">
                                <p>Tensão</p>
                                <h2 id="valor-tensao">-</h2>
                                <span>
                                    <h3>volts</h3>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="percent" id="line-rpm" style="--clr:#ebfc04;--num:60">
                            <div class="dot" id="dot-rpm"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70"></circle>
                            </svg>
                            <div class="number">
                                <p>Rotações</p>
                                <h2 id="valor-rpm">-</h2>
                                <span>
                                    <h3>Rpm</h3>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="percent" id="line-yaw" style="--clr:#00d9ff;--num:40">
                            <div class="dot" id="dot-yaw"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70"></circle>
                            </svg>
                            <div class="number">
                                <p>YAW</p>
                                <h2 id="valor-yaw">-</h2>
                                <span>
                                    <h3>Graus</h3>
                                </span>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="percent" id="line-pitch" style="--clr:#ff002b;--num:20">
                            <div class="dot" id="dot-pitch"></div>
                            <svg>
                                <circle cx="70" cy="70" r="70"></circle>
                                <circle cx="70" cy="70" r="70"></circle>
                            </svg>
                            <div class="number">
                                <p>Pitch</p>
                                <h2 id="valor-pitch">-</h2>
                                <span>
                                    <h3>Graus</h3>
                                </span>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </section>

        <!--CONTATO -->
        <section class="contato">
            <div class="caixa-form">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <div class="titulo-div">
                    <h2>Contato</h2>
                </div>

                <div class="form-box login">
                    <form action="">

                        <div class="input-box">
                            <span class="icon"> <ion-icon name="person"></ion-icon></span>
                            <input type="text" name="nome" size="50%" required>
                            <label>Nome</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="information-circle"></ion-icon></span>
                            <input type="text" name="Assunto" required>
                            <label>Assunto</label>
                        </div>

                        <textarea class="mensagem" name="mensagem" rows="6" maxlength="300" placeholder="Mensagem"></textarea>

                        <button type="submit" class="btn">Enviar</button>




                    </form>
                </div>

            </div>
        </section>

        <!--NEWSLETTER -->
        <section class="news">
            <div class="caixa-form">
                <span class="icon-close">
                    <ion-icon name="close"></ion-icon>
                </span>
                <div class="titulo-div">
                    <h2>Newsletter</h2>
                </div>

                <div class="form-box login">
                    <form action="">

                        <div class="input-box">
                            <span class="icon"> <ion-icon name="person"></ion-icon></span>
                            <input type="text" name="nome" size="50%" required>
                            <label>Nome</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="mail"></ion-icon></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                        <br><br>
                        <button type="submit" class="btn">Enviar</button>


                    </form>
                </div>



            </div>
        </section>

        <!--Perfil -->
        <?php
        if (verificar_autenticacao()) {
            include "../BACK-END/view_perfil.php";
        }
        ?>

        <!--footer -->
        <footer class="copyright">
            <p>&copy; Copyright: 2023 windpower.eziore.com.br</p>
        </footer>


    </main>


    <section class="imgBGx">

        <!--   <img src="./assets/./windpower.gif" id="bg">-->
        <img src="assets/bgfundo.png" id="bgfundo">
        <img src="assets/bgwind.png" id="bgwind">

    </section>

    <!-- Acrescentar linguagem em libras -->

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>


    <!--  inportando icones de  ionic.io/ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Script -->
    <script src="script.js"></script>
    <script src="./profile.js"></script>
    <script src="scriptCircular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.0/vanilla-tilt.min.js" integrity="sha512-RX/OFugt/bkgwRQg4B22KYE79dQhwaPp2IZaA/YyU3GMo/qY7GrXkiG6Dvvwnds6/DefCfwPTgCXnaC6nAgVYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./vanilla3DReal.js"></script>



</body>


</html>

