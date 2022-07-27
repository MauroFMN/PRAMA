<?php

include '../../conexao.php';
session_start();

if (isset($_POST['salvar'])) {
    $sqlSegunda = "UPDATE horariomedico SET horarioAtendimento = '{$_POST['Segundaentrada']}, {$_POST['Segundasaida']}, ' where numOrdem = '{$_POST['salvar']}' and diaSemana = 'Segunda'";
    $sqlTerca = "UPDATE horariomedico SET horarioAtendimento = '{$_POST['Terçaentrada']}, {$_POST['Terçasaida']}, ' where numOrdem = '{$_POST['salvar']}' and diaSemana = 'Terça'";
    $sqlQuarta = "UPDATE horariomedico SET horarioAtendimento = '{$_POST['Quartaentrada']}, {$_POST['Quartasaida']}, ' where numOrdem = '{$_POST['salvar']}' and diaSemana = 'Quarta'";
    $sqlQuinta = "UPDATE horariomedico SET horarioAtendimento = '{$_POST['Quintaentrada']}, {$_POST['Quintasaida']}, ' where numOrdem = '{$_POST['salvar']}' and diaSemana = 'Quinta'";
    $sqlSexta = "UPDATE horariomedico SET horarioAtendimento = '{$_POST['Sextaentrada']}, {$_POST['Sextasaida']}, ' where numOrdem = '{$_POST['salvar']}' and diaSemana = 'Sexta'";
    $sqlSabado = "UPDATE horariomedico SET horarioAtendimento = '{$_POST['Sabadoentrada']}, {$_POST['Sabadosaida']}, ' where numOrdem = '{$_POST['salvar']}' and diaSemana = 'Sabado'";
    if (mysqli_query($mysqli, $sqlSegunda)) {
        if (mysqli_query($mysqli, $sqlTerca)) {
            if (mysqli_query($mysqli, $sqlQuarta)) {
                if (mysqli_query($mysqli, $sqlQuinta)) {
                    if (mysqli_query($mysqli, $sqlSexta)) {
                        if (mysqli_query($mysqli, $sqlSabado)) {
                            header("location: horario.php");
                        }
                    }
                }
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
                    <h1>Minhas Especilidades</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="formulario">
                    <hr>
                    <h4 class="centro">Horário de Atendimento</h4>
                    <hr>
                    <?php
                    $sql1 = "SELECT * FROM medico WHERE idPessoa = {$_SESSION['idPessoa']}";
                    $dados1 = mysqli_query($mysqli, $sql1);
                    while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                        <form style="display: block;padding: 30px 0;border-bottom: 1px solid silver;" method="post">
                            <div class="dias">
                                <?php
                                $sql6 = "SELECT * from horariomedico WHERE numOrdem = '{$row1['numOrdem']}'";
                                $dados6 = mysqli_query($mysqli, $sql6);
                                if (!empty(mysqli_num_rows($dados6))) { ?>
                                    <table>
                                        <tr>
                                            <th>Dias da Semana</th>
                                            <th>Inico</th>
                                            <th>Fim</th>
                                        </tr>
                                        <?php
                                        while ($row6 = mysqli_fetch_assoc($dados6)) {
                                            $horarioMedico = $row6['horarioAtendimento'];
                                            $horarioDividido = explode(", ", $horarioMedico);
                                        ?>
                                            <tr>
                                                <td><?php echo $row6['diaSemana']; ?></td>
                                                <td>
                                                    <select style="width: auto;" name="<?php echo "{$row6["diaSemana"]}entrada"; ?>" <?php echo isset($_GET["editar"]) ? "" : "disabled" ?>>
                                                        <option value="00:00" <?php echo $horarioDividido[0] == "00:00" ? "selected" : "" ?>>00:00</option>
                                                        <option value="01:00" <?php echo $horarioDividido[0] == "01:00" ? "selected" : "" ?>>01:00</option>
                                                        <option value="02:00" <?php echo $horarioDividido[0] == "02:00" ? "selected" : "" ?>>02:00</option>
                                                        <option value="03:00" <?php echo $horarioDividido[0] == "03:00" ? "selected" : "" ?>>03:00</option>
                                                        <option value="04:00" <?php echo $horarioDividido[0] == "04:00" ? "selected" : "" ?>>04:00</option>
                                                        <option value="05:00" <?php echo $horarioDividido[0] == "05:00" ? "selected" : "" ?>>05:00</option>
                                                        <option value="06:00" <?php echo $horarioDividido[0] == "06:00" ? "selected" : "" ?>>06:00</option>
                                                        <option value="07:00" <?php echo $horarioDividido[0] == "07:00" ? "selected" : "" ?>>07:00</option>
                                                        <option value="08:00" <?php echo $horarioDividido[0] == "08:00" ? "selected" : "" ?>>08:00</option>
                                                        <option value="09:00" <?php echo $horarioDividido[0] == "09:00" ? "selected" : "" ?>>09:00</option>
                                                        <option value="10:00" <?php echo $horarioDividido[0] == "10:00" ? "selected" : "" ?>>10:00</option>
                                                        <option value="11:00" <?php echo $horarioDividido[0] == "11:00" ? "selected" : "" ?>>11:00</option>
                                                        <option value="12:00" <?php echo $horarioDividido[0] == "12:00" ? "selected" : "" ?>>12:00</option>
                                                        <option value="13:00" <?php echo $horarioDividido[0] == "13:00" ? "selected" : "" ?>>13:00</option>
                                                        <option value="14:00" <?php echo $horarioDividido[0] == "14:00" ? "selected" : "" ?>>14:00</option>
                                                        <option value="15:00" <?php echo $horarioDividido[0] == "15:00" ? "selected" : "" ?>>15:00</option>
                                                        <option value="16:00" <?php echo $horarioDividido[0] == "16:00" ? "selected" : "" ?>>16:00</option>
                                                        <option value="17:00" <?php echo $horarioDividido[0] == "17:00" ? "selected" : "" ?>>17:00</option>
                                                        <option value="18:00" <?php echo $horarioDividido[0] == "18:00" ? "selected" : "" ?>>18:00</option>
                                                        <option value="19:00" <?php echo $horarioDividido[0] == "19:00" ? "selected" : "" ?>>19:00</option>
                                                        <option value="20:00" <?php echo $horarioDividido[0] == "20:00" ? "selected" : "" ?>>20:00</option>
                                                        <option value="21:00" <?php echo $horarioDividido[0] == "21:00" ? "selected" : "" ?>>21:00</option>
                                                        <option value="22:00" <?php echo $horarioDividido[0] == "22:00" ? "selected" : "" ?>>22:00</option>
                                                        <option value="23:00" <?php echo $horarioDividido[0] == "23:00" ? "selected" : "" ?>>23:00</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select style="width: auto;" name="<?php echo "{$row6["diaSemana"]}saida"; ?>" <?php echo isset($_GET["editar"]) ? "" : "disabled" ?>>
                                                        <option value="00:00" <?php echo $horarioDividido[1] == "00:00" ? "selected" : "" ?>>00:00</option>
                                                        <option value="01:00" <?php echo $horarioDividido[1] == "01:00" ? "selected" : "" ?>>01:00</option>
                                                        <option value="02:00" <?php echo $horarioDividido[1] == "02:00" ? "selected" : "" ?>>02:00</option>
                                                        <option value="03:00" <?php echo $horarioDividido[1] == "03:00" ? "selected" : "" ?>>03:00</option>
                                                        <option value="04:00" <?php echo $horarioDividido[1] == "04:00" ? "selected" : "" ?>>04:00</option>
                                                        <option value="05:00" <?php echo $horarioDividido[1] == "05:00" ? "selected" : "" ?>>05:00</option>
                                                        <option value="06:00" <?php echo $horarioDividido[1] == "06:00" ? "selected" : "" ?>>06:00</option>
                                                        <option value="07:00" <?php echo $horarioDividido[1] == "07:00" ? "selected" : "" ?>>07:00</option>
                                                        <option value="08:00" <?php echo $horarioDividido[1] == "08:00" ? "selected" : "" ?>>08:00</option>
                                                        <option value="09:00" <?php echo $horarioDividido[1] == "09:00" ? "selected" : "" ?>>09:00</option>
                                                        <option value="10:00" <?php echo $horarioDividido[1] == "10:00" ? "selected" : "" ?>>10:00</option>
                                                        <option value="11:00" <?php echo $horarioDividido[1] == "11:00" ? "selected" : "" ?>>11:00</option>
                                                        <option value="12:00" <?php echo $horarioDividido[1] == "12:00" ? "selected" : "" ?>>12:00</option>
                                                        <option value="13:00" <?php echo $horarioDividido[1] == "13:00" ? "selected" : "" ?>>13:00</option>
                                                        <option value="14:00" <?php echo $horarioDividido[1] == "14:00" ? "selected" : "" ?>>14:00</option>
                                                        <option value="15:00" <?php echo $horarioDividido[1] == "15:00" ? "selected" : "" ?>>15:00</option>
                                                        <option value="16:00" <?php echo $horarioDividido[1] == "16:00" ? "selected" : "" ?>>16:00</option>
                                                        <option value="17:00" <?php echo $horarioDividido[1] == "17:00" ? "selected" : "" ?>>17:00</option>
                                                        <option value="18:00" <?php echo $horarioDividido[1] == "18:00" ? "selected" : "" ?>>18:00</option>
                                                        <option value="19:00" <?php echo $horarioDividido[1] == "19:00" ? "selected" : "" ?>>19:00</option>
                                                        <option value="20:00" <?php echo $horarioDividido[1] == "20:00" ? "selected" : "" ?>>20:00</option>
                                                        <option value="21:00" <?php echo $horarioDividido[1] == "21:00" ? "selected" : "" ?>>21:00</option>
                                                        <option value="22:00" <?php echo $horarioDividido[1] == "22:00" ? "selected" : "" ?>>22:00</option>
                                                        <option value="23:00" <?php echo $horarioDividido[1] == "23:00" ? "selected" : "" ?>>23:00</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                <?php } else {
                                    echo "Sem horário disponível";
                                } ?>
                            </div>
                            <hr>
                            <div class="centro">
                                <?php
                                if (isset($_GET['editar'])) {
                                ?>
                                    <Button type="submit" class="botao verde" name="salvar" value="<?php echo $row1['numOrdem'] ?>" id="botaoGuardar">Guardar</Button>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <script src="../../js/script.js"></script>
    <script src="../../js/foto.js"></script>
</body>

</html>