<?php
include '../../conexao.php';
if (session_id() == '') {
    session_start();
    /* Os pacientes vão poder pesquisar por mádicos, unidades hospitalares e serviços de especialidades
    No resultado da pesquisa deverá aparecer o(s) médico(s), a(s) unidade(s) hospitalar(s) e
    o(s) serviço(s) de especialidade cujo o nome tem os caracteres inseridos.
    Nos médicos deverá constar o seu horário de atendimento, o(s) serviço(s) de especialidade que pratica, bem como a opção de marcação da consulta.
    Nas unidades hospitalares deverá constar os serviços de especialidade, o(s) contacto(s) e o endereço.*/
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
            <form action="pesquisar.php" method="GET">
                <input type="text" name="pesquisa" placeholder="Pesquisar...">
            </form>
            <span class="tooltip">Pesquisar</span>
        </li>
        <li>
            <a href="index.php">
                <i class="fas fa-th-large"></i>
                <span class="links_name">Área Pessoal</span>
            </a>
            <span class="tooltip">Área Pessoal</span>
        </li>
        <li>
            <a href="medicos.php">
                <i class="fas fa-user-md"></i>
                <span class="links_name">Os Meus Médicos</span>
            </a>
            <span class="tooltip">Os Meus Médicos</span>
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