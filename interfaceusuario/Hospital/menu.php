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
        <li class="profile">
        <?php
          $sql = "SELECT * FROM pessoa WHERE idPessoa = {$_SESSION["idPessoa"]}";
          $dados = mysqli_query($mysqli,$sql);
          while ($dadosusuario = mysqli_fetch_assoc($dados)) { ?>

            <div class="profile-details" style="height: 100%;">
                <div class="row">
                    <div class="col-lg-12"><p class="name"><?php echo $dadosusuario["nome"]; ?></b></p></div>
                    <div class="col-lg-3">
                        <a href="../../index.php">
                            <i class="fas fa-sign-out-alt" id="log_out" ></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </li>
    </ul>
</div>
