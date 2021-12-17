<?php
include '../../conexao.php';
session_start();
?>
<div class="sidebar french-blue">
    <div class="logo-details">
        <img src="../../imagens/Logomarca-Pramaactualizada.png" alt="Logotipo" class="icon1">
        <i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <i class="fas fa-search bx-search"></i>
            <input type="text" placeholder="Pesquisar...">
            <span class="tooltip">Pesquisar</span>
        </li>
        <li>
            <a href="index.php">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Área de Trabalho</span>
            </a>
            <span class="tooltip">Área de Trabalho</span>
        </li>
        <li>
            <a href="pacientes.php">
                <i class="fas fa-hospital-user"></i>
                <span class="links_name">Os Meus Pacientes</span>
            </a>
            <span class="tooltip">Os Meus Pacientes</span>
        </li>
        <li>
            <a href="consulta.php">
                <i class="fas fa-laptop-medical"></i>
                <span class="links_name">Consulta</span>
            </a>
            <span class="tooltip">Consulta</span>
        </li>
        <li>
            <a href="#chat" onclick="document.getElementById('chat').style.display = 'block';">
                <i class="fab fa-whatsapp"></i>
                <span class="links_name">Chat</span>
            </a>
            <span class="tooltip">Chat</span>
        </li>
        <li>
            <a href="perfil.php">
                <i class="far fa-user"></i>
                <span class="links_name">Perfil</span>
            </a>
            <span class="tooltip">Perfil</span>
        </li>
        <li class="profile">
            <?php
            $sql = "SELECT * FROM pessoa WHERE idPessoa = {$_SESSION["idPessoa"]}";
            $dados = mysqli_query($mysqli, $sql);
            while ($dadosusuario = mysqli_fetch_assoc($dados)) {
            ?>
                <div class="profile-details">
                    <div class="name_job">
                        <div class="name"><b><?php echo $dadosusuario["nome"]; ?></b></div>
                    </div>
                </div>
                <a href="../../index.php">
                    <i class="fas fa-sign-out-alt" id="log_out"></i>
                </a>

            <?php
            }
            ?>
        </li>
    </ul>
</div>
<section class="wrapper" id="chat">
    <div class="chat-area">
        <header>
            <?php //foto e dados do paciente que está a ser atendido ?>
            <img src="" alt="">
            <div class="details">
                <span><?php ?></span>
                <p><?php ?></p>
            </div>
        </header>
        <div class="chat-box">

        </div>
        <form action="#" class="typing-area">
            <input type="text" class="incoming_id" name="incoming_id" value="<?php ?>" hidden>
            <input type="text" name="menssagem" placeholder="Escreva aqui a sua mensagem..." autocomplete="off">
            <button type="button" name="button"><i class="fab fa-telegram-plane"></i></button>
        </form>
    </div>
</section>
