
<div class="profile" id="profileBtn">
    <img src="../FRONT-END/assets/profile.jpg" class="profile-img" alt="imagem de perfil">
    <div class="profile-container">
        <p><?php echo $_SESSION['nomeUsuario'];?></p>
    </div>
</div>
<div  class="sub-menu-profile-container">
        <div class="sub-menu-profile" id="submenuperfil">
            <div class="user-info">
            <img src="../FRONT-END/assets/profile.jpg" class="profile-img" alt="imagem de perfil">
            <h2 ><?php echo $_SESSION['nomeUsuario'];?></h2>
            </div>

            <div class="sub-menu-options">
                <ul>
                    <li><a class="itens-submenu" href="#">Perfil</a></li>
                    <li><a class="itens-submenu" href="#">Respostas</a></li>
                    <li><a class="itens-submenu" href="#">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>