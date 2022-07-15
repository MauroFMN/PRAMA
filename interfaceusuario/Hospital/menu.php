<?php
include '../../conexao.php';
if (session_id() == '') {
    session_start();
    /* Os Dir.Gerais vão poder pesquisar por mádicos e serviços de especialidades
    No resultado da pesquisa deverá aparecer o(s) médico(s), a(s) unidade(s) hospitalar(s) e
    o(s) serviço(s) de especialidade cujo o nome tem os caracteres inseridos.
    Nos médicos deverá constar o seu horário de atendimento, o(s) serviço(s) de especialidade que pratica, bem como a opção de marcação da consulta.*/
}
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
                <a href="../logout.php?logout_id=<?php echo $dadosusuario["idPessoa"]; ?>">
                    <i class="fas fa-sign-out-alt" id="log_out"></i>
                </a>

            <?php
            }
            ?>
        </li>
    </ul>
</div>
