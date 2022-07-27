<?php

include '../../conexao.php';
session_start();

if (isset($_POST['salvar'])) {
    $sqlPessoa = "UPDATE `pessoa` SET `nomeUtilizador`= '" . $_POST['nomeUtilizador'] . "', `password`= '" . $novaSenha . "', foto='{$_POST['foto']}', `nome`= '" . $_POST['nome'] . "', `dataNasc`= '" . $_POST['dataNasc'] . "', `genero`= '" . $_POST['genero'] . "' where idPessoa={$_SESSION["idPessoa"]}";
    $sqlTelefone = "UPDATE `telefone` SET `numero`= '" . $_POST['telefone'] . "' WHERE coTelefone=" . $_POST['telefoneId'] . "";
    $sqlEmail = "UPDATE `email` set `endereco`='{$_POST['email']}' where codEmail = {$_POST['emailId']}";

    if (mysqli_query($mysqli, $sqlPessoa)) {
        if (mysqli_query($mysqli, $sqlTelefone)) {
            if (mysqli_query($mysqli, $sqlEmail)) {
                header("location: perfil.php");
            }
        }
    }
}

?>




<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Médico</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
    <link rel="stylesheet" type="text/css" href="../../css/foto.css">
</head>

<body>
    <?php include_once "menu.php"; ?>
    <section class="home-section" style="background-color: white;" id="perfil">
        <div class="text">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Perfil</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="formulario">
                    <?php $sql = "SELECT * FROM pessoa WHERE idPessoa = {$_SESSION["idPessoa"]}";
                    $dados = mysqli_query($mysqli, $sql);
                    while ($row = mysqli_fetch_assoc($dados)) { ?>
                        <form style="display: block;" class="formRegElm" method="post">
                            <div class="espacoImagem">
                                <div class="conteudoImagem">
                                    <?php if (!empty($row['foto'])) {
                                        $foto = $row['foto'];
                                    } else {
                                        $foto = 'camera-solid.svg';
                                    } ?>
                                    <img src="../../imagens/<?php echo $foto; ?>" alt="" id="fotografia">
                                </div>
                                <input type="file" name="foto" id="foto" accept="image/*" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                            </div>
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                            <label for="dataNasc">Data de Nascimento:</label>
                            <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $row['dataNasc']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto">
                            <label>Género:</label>
                            <select <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto; height: 50px;" name="genero">
                                <option value="<?php echo $row['genero']; ?>"><?php echo $row['genero']; ?></option>
                            </select>
                            <?php $sql1 = "SELECT * FROM medico WHERE idPessoa = {$row['idPessoa']}";
                            $dados1 = mysqli_query($mysqli, $sql1);
                            while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                                <br>
                                <label for="numOrdem">Númeno da Ordem:</label>
                                <input type="text" name="numOrdem" id="numOrdem" value="<?php echo $row1['numOrdem']; ?>" disabled>
                                <?php $sql4 = "SELECT * FROM email WHERE idPessoa = {$row['idPessoa']}";
                                $dados4 = mysqli_query($mysqli, $sql4);
                                while ($row4 = mysqli_fetch_assoc($dados4)) { ?>
                                    <label for="endereco">Email:</label>
                                    <input type="hidden" name="emailId" value="<?php echo $row4['codEmail'] ?>" />
                                    <input type="email" name="email" id="endereco" value="<?php echo $row4['endereco']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto;height: 50px;"><br>
                                <?php };
                                $sql5 = "SELECT * FROM telefone WHERE idPessoa = {$row['idPessoa']}";
                                $dados5 = mysqli_query($mysqli, $sql5);
                                while ($row5 = mysqli_fetch_assoc($dados5)) { ?>
                                    <label for="numero">Telefone:</label>
                                    <input type="hidden" name="telefoneId" value="<?php echo $row5['coTelefone'] ?>" />
                                    <input type="tel" name="telefone" id="numero" value="<?php echo $row5['numero']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto">
                                <?php } ?>
                                <br>
                                <label for="nomeUtilizador">Nome de Utilizador:</label>
                                <input type="text" name="nomeUtilizador" id="nomeUtilizador" value="<?php echo $row['nomeUtilizador']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                                <hr>
                                <div class="centro">
                                    <?php
                                    if (isset($_GET['editar'])) {
                                    ?>
                                        <Button type="submit" href="?salvar" class="botao verde" name="salvar" id="botaoEditar">Guardar</Button>
                                        <a href="?" class="botao vermelho">Cancelar</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="?editar" class="botao verde" value="Editar" id="botaoEditar">Editar</a>
                                    <?php
                                    }
                                    ?>
                                </div>
                        </form>
                <?php }
                        } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="../../js/script.js"></script>
    <script src="../../js/foto.js"></script>
</body>

</html>