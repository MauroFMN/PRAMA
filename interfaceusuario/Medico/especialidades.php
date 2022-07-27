<?php

include '../../conexao.php';
session_start();

if (isset($_GET['deletar']) && isset($_GET['idEspecialidadeMedico'])) {
    $sql = "DELETE FROM `especialidademedico` WHERE idEspecialidadeMedico = {$_GET['idEspecialidadeMedico']}";
    if (mysqli_query($mysqli, $sql)) {
        header("location: especialidades.php");
    }
}

if (isset($_POST['adicionar'])) {
    $sql = "Insert into `especialidademedico` (codEspecialidade, numOrdem) values ({$_POST['especialidade']}, '{$_POST['numOrdem']}')";
    if (mysqli_query($mysqli, $sql)) {
        header("location: especialidades.php");
    } else {
        // echo 'error pai 2' . mysqli_error($mysqli);
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
                    <h1>Minhas Especilidades</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="formulario">
                    <?php
                    $sql1 = "SELECT * FROM medico WHERE idPessoa = {$_SESSION['idPessoa']}";
                    $dados1 = mysqli_query($mysqli, $sql1);
                    while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                        <form style="display: block;padding: 30px 0;border-bottom: 1px solid silver;" method="post">
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="nome">Nova Especialidade:</label>
                                    <select id="especialidade" name="especialidade" style="height: 50px;margin: 5px 0;">
                                        <?php
                                        $especialidadeSql = "select especialidade.codEspecialidade, especialidadeMedico.numOrdem, especialidade.nome from especialidade left join especialidademedico on especialidademedico.codEspecialidade=especialidade.codEspecialidade and especialidademedico.numOrdem = '{$row1['numOrdem']}'";
                                        $especialidadeResult = mysqli_query($mysqli, $especialidadeSql);
                                        while ($rowEsp = mysqli_fetch_assoc($especialidadeResult)) {
                                            if ($rowEsp['numOrdem'] != $row1['numOrdem']) {
                                        ?>
                                                <option value="<?php echo $rowEsp["codEspecialidade"] ?>"> <?php echo $rowEsp['nome'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nome"></label>
                                    <input type="hidden" name="numOrdem" value="<?php echo $row1['numOrdem']; ?>" />
                                    <input type="hidden" name="adicionar" />
                                    <button type="submit" class="botao verde" style="display: flex; align-items: flex-end; margin: 5px 0; width: 50%">Adicionar</button>
                                </div>
                            </div>

                        </form>
                        <?php
                        $sql2 = "SELECT * from especialidade esp JOIN especialidademedico espm on(esp.codEspecialidade = espm.codEspecialidade) WHERE numOrdem = '{$row1['numOrdem']}'";
                        $dados2 = mysqli_query($mysqli, $sql2);
                        while ($row2 = mysqli_fetch_assoc($dados2)) {
                        ?>
                            <div class="row">
                                <div class="col-lg-10">
                                    <label for="nome">Especialidade:</label>
                                    <input type="text" name="nome" id="nome" value="<?php echo $row2['nome']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                                </div>
                                <div class="col-lg-2">
                                    <label for="nome"></label>
                                    <a href="?deletar&idEspecialidadeMedico=<?php echo $row2['idEspecialidadeMedico'] ?>" class="botao vermelho" style="display: flex; align-items: flex-end; margin: 5px 0; width: 50%">Eliminar</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="../../js/script.js"></script>
    <script src="../../js/foto.js"></script>
</body>

</html>