
<div class="profile" id="profileBtn">
    <img src="../FRONT-END/assets/<?php echo $_SESSION['fotoPerfil'];?>" class="profile-img" alt="imagem de perfil">
    <div class="profile-container">
        <p><?php echo $_SESSION['nome'];?></p>
    </div>
</div>
<div  class="sub-menu-profile-container">
        <div class="sub-menu-profile" id="submenuperfil">
            <div class="user-info">
            <img src="../FRONT-END/assets/<?php echo $_SESSION['fotoPerfil'];?>" class="profile-img" alt="imagem de perfil">
            <h2 ><?php echo $_SESSION['nome'];?></h2>
            </div>

            <div class="sub-menu-options">
                <ul>
                    <li><a class="itens-submenu" href="../BACK-END/view_perfil.php">Perfil</a></li>
                    <li><a class="itens-submenu" href="#">Respostas</a></li>
                    <li><a class="itens-submenu" href="../BACK-END/Controller/LogoutController.php">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>