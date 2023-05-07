
<div class="profile">
    <img src="../FRONT-END/assets/profile.jpg" class="profile-img" alt="imagem de perfil">
    <div class="profile-container">
        <p><?php echo $_SESSION['nomeUsuario'];?></p>
    </div>

    <div class="sub-menu-profile-container">
        <div class="sub-menu-profile">
            <div class="user-info">
            <img src="../FRONT-END/assets/profile.jpg" class="profile-img" alt="imagem de perfil">
            <h2><?php echo $_SESSION['nomeUsuario'];?></h2>
            </div>
            <hr>
            <div class="sub-menu-options">
                <ul>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Respostas</a></li>
                    <li><a href="#">Sair</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>