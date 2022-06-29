<?php

include '../../conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $uHospitalar = "";
    $sql = "SELECT codHospital FROM unhospitalar WHERE idPessoa = " . $_SESSION['idPessoa'] . "";

    $result = mysqli_query($mysqli, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $uHospitalar = $row["codHospital"];
    }

    if (!empty($_FILES['foto'])){
        $pasta = "../../imagens/";
        $ficheiro = $pasta.basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $ficheiro);
    }

    $sql = "INSERT INTO `pessoa`(`idPessoa`, `nomeUtilizador`, `password`, `nome`, `peso`, `dataNasc`, `genero`, `estCivil`, `tipoSang`, `tipoUser`, `endereco`, `codMunicipio`, `documentoIdentificacao`, `numeroDocumento`, `foto`) VALUES (null,'" . trim($_POST["nameu"]) . "','" . md5($_POST["password"]) . "','" . trim($_POST["nome"]) . "','" . trim($_POST["peso"]) . "','" . trim($_POST["dataNasc"]) . "','" . trim($_POST["genero"]) . "','" . trim($_POST["estadoCivil"]) . "','" . trim($_POST["tipoSang"]) . "','Medico','" . trim($_POST["endereco"]) . "','" . trim($_POST["municipio"]) . "', '" . trim($_POST["docId"]) . "', '" . trim($_POST["numeroDoc"]) . "', '" . trim($_FILES["foto"]["name"]) . "')";

    if (mysqli_query($mysqli, $sql)) {
        $last_id = mysqli_insert_id($mysqli);
        $sql = "INSERT INTO `telefone`(`coTelefone`, `idPessoa`, `numero`) VALUES (null,'" . $last_id . "','" . trim($_POST["tlf"]) . "')";
        if (mysqli_query($mysqli, $sql)) {
            $sql = "INSERT INTO `email`(`codEmail`, `idPessoa`, `endereco`) VALUES (null,'" . $last_id . "','" . trim($_POST["email"]) . "')";
            if (mysqli_query($mysqli, $sql)) {

                $sql = "INSERT INTO `medico`(`numOrdem`, `idPessoa`, `descricao`) VALUES ('" . trim($_POST["nOrdem"]) . "','" . $last_id . "','" . trim($_POST["descricaoMedico"]) . "')";

                if (mysqli_query($mysqli, $sql)) {
                    $sql = '';

                    foreach ($_POST['esp'] as $esp) {
                        $id = "" . trim($_POST['nOrdem']) . "";
                        $sql .= "('" . $id . "','$esp'),";
                    }

                    $sql = "INSERT INTO `especialidademedico`(`numOrdem`, `codEspecialidade`) VALUES" . trim($sql, ",");

                    if (mysqli_query($mysqli, $sql)) {


                        $horarioSegunda = "" . $_POST['segundaFEntrada'] . ", " . $_POST['segundaFSaida'] . ",";
                        $horarioTerca = "" . $_POST['tercaFEntrada'] . ", " . $_POST['tercaFSaida'] . ",";
                        $horarioQuarta = "" . $_POST['quartaFEntrada'] . ", " . $_POST['quartaFSaida'] . ",";
                        $horarioQuinta = "" . $_POST['quintaFEntrada'] . ", " . $_POST['quintaFSaida'] . ",";
                        $horarioSexta = "" . $_POST['sextaFEntrada'] . ", " . $_POST['sextaFSaida'] . ",";
                        $horarioSabado = "" . $_POST['sabadoEntrada'] . ", " . $_POST['sabadoSaida'] . ",";

                        $sql = "INSERT INTO `horariomedico`(`codHorarioMedico`, `diaSemana`, `horarioAtendimento`, `numOrdem`) values (null, 'Segunda', '" . $horarioSegunda . "', '" . $id . "'), (null, 'Terça', '" . $horarioTerca . "', '" . $id . "'), (null, 'Quarta', '" . $horarioQuarta . "', '" . $id . "'),(null, 'Quinta', '" . $horarioQuinta . "', '" . $id . "'), (null, 'Sexta', '" . $horarioSexta . "', '" . $id . "'), (null, 'Sabado', '" . $horarioSabado . "', '" . $id . "')";

                        if (mysqli_query($mysqli, $sql)) {

                            //$sql = "INSERT INTO `email`(`codEmail`, `idPessoa`, `endereco`) VALUES (null,'" . $last_id . "','" . trim($_POST["email"]) . "')";
                            if (mysqli_query($mysqli, $sql)) {
                                $sql = "INSERT INTO trabalhar (numOrdem, codHospital) values ('" . trim($_POST["nOrdem"]) . "'," . $uHospitalar . ")";
                                if (mysqli_query($mysqli, $sql)) {
                                    header("location: medicos.php?id_medico=" . $_POST["nOrdem"] . "");
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                                }
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                            }
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dir.Geral</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
    <link rel="stylesheet" type="text/css" href="../../css/foto.css">
    <script src="../../js/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php include_once 'menu.php'; ?>
    <section class="home-section" id="inscever">
        <div class="text">
            <div class="row userNameTitle">
                <div class="col-lg-22">
                    <h1>Inscrever Médico</h1>
                </div>
                <div class="row mt-5">
                    <div class="formulario">
                        <form class="formRegElm" method="POST" enctype="multipart/form-data">
                            <div class="espacoImagem">
                                <div class="conteudoImagem">
                                    <img src="../../imagens/camera-solid.svg" alt="" id="fotografia">
                                </div>
                                <input type="file" name="foto" id="foto" accept="image/*">
                            </div>


                            <label for=" nome"><strong>Nome Completo</strong></label>
                            <input type="text" placeholder="Insira o Nome Completo" name="nome" id="nome" required autofocus>
                            <br>
                            <label for="peso"><strong>Peso</strong></label>
                            <input type="number" placeholder="Insira o peso" name="peso" id="peso">
                            <br>
                            <label for="dataNasc"><strong>Data de Nascimento</strong></label>
                            <br>
                            <input type="date" placeholder="Insira a data de Nascimento" name="dataNasc" id="dataNasc">
                            <br>
                            <label for="docId"><strong>Documento de Identificação</strong></label>
                            <br>
                            <select id="docId" name="docId">
                                <option>Seleccione o tipo de documento de identificação</option>
                                <option value="Bilhete de Identidade">Bilhete de Identidade</option>
                                <option value="Passaporte">Passaporte</option>
                            </select>
                            <br>
                            <label for="numeroDoc"><strong>Número do Documento</strong></label>
                            <input type="text" placeholder="Insira o número do documento de identificação" name="numeroDoc" id="numeroDoc">
                            <br>

                            <label for="tlf"><strong>Telefone</strong></label>
                            <input type="tel" placeholder="Insira o nº de Telefone" name="tlf" id="tlf" required>
                            <br>

                            <label for="genero"><strong>Genero</strong></label>
                            <br>
                            <select id="genero" name="genero">
                                <option>Prefiro não informar</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                            <br>
                            <label for="estadoCivil"><strong>Estado Civil</strong></label>
                            <br>
                            <select id="estadoCivil" name="estadoCivil">
                                <option>Prefiro não informar</option>
                                <option value="Casado">Casado(a)</option>
                                <option value="Solteiro">Solteiro(a)</option>
                                <option value="Viuvo">Viuvo(a)</option>
                                <option value="Divorciado">Divorciado(a)</option>
                            </select>
                            <br>
                            <label for="provincia"><strong>Provincia</strong></label>
                            <br />
                            <select id="provincia" name="provincia" onchange="carregarMunicipios(this.value)">
                                <option>Seleccione a província</option>
                                <?php
                                // reabrirConexao();
                                $provinciaSql = "SELECT codProvincia, nome FROM provincia";

                                $provinciaResult = mysqli_query($mysqli, $provinciaSql);

                                while ($row    = mysqli_fetch_assoc($provinciaResult)) {

                                    echo "<option value=" . $row["codProvincia"] . ">" . $row['nome'] . "</option>";
                                }
                                // mysqli_close($mysqli);
                                ?>
                            </select>
                            <br>
                            <label for="municipio"><strong>Município</strong></label>
                            <br />
                            <select id="municipio" name="municipio" onchange="" disabled>
                                <option>Seleccione o município</option>
                                <?php

                                // reabrirConexao();

                                $municipioSql = "SELECT codMunicipio, codProvincia, nome FROM municipio";

                                $municipioResult = mysqli_query($mysqli, $municipioSql);

                                while ($row    = mysqli_fetch_assoc($municipioResult)) {
                                    echo "<option value=" . $row["codMunicipio"] . " id=" . $row["codProvincia"] . ">" . $row['nome'] . "</option>";
                                }
                                // mysqli_close($mysqli);
                                ?>
                            </select>
                            <br>
                            <label for="endereco"><strong>Endereco</strong></label>
                            <input type="text" placeholder="Insira o endereco" name="endereco" id="endereco">
                            <br />

                            <label for="email"><strong>Email</strong></label>
                            <input type="text" placeholder="Insira o Email" name="email" id="email">

                            <br>
                            <label for="tipoSang"><strong>Tipo Sanguíneo</strong></label>
                            <br>
                            <select id="tipoSang" name="tipoSang">
                                <option>Seleccione o tipo sanguíneo</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>

                            <br>
                            <label for="nOrdem"><strong>Nº da Ordem dos Médicos</strong></label>
                            <input type="text" placeholder="Insira o Número da Ordem dos Médicos" name="nOrdem" id="nOrdem">
                            <label for="esp"><strong>Especialidade</strong></label>
                            <select id="esp" name="esp[]" class="form-select" multiple aria-label="multiple select example">
                                <?php
                                $especialidadessql = "SELECT codEspecialidade, nome FROM especialidade";

                                $especialidadesresult = mysqli_query($mysqli, $especialidadessql);

                                while ($row = mysqli_fetch_assoc($especialidadesresult)) {

                                    echo "<option value=" . $row["codEspecialidade"] . ">" . $row['nome'] . "</option>";
                                }
                                ?>
                            </select>

                            <label for="nameu"><strong>Nome de Utilizador</strong></label>
                            <input type="text" placeholder="Insira o nome de utilizador" name="nameu" id="nameu">
                            <label for="password"><strong>Password</strong></label>
                            <input type="password" placeholder="Insira a Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                            <div id="message">A password deve ter <strong id="letter">uma letra minúscula</strong>, <strong id="capital">uma maiúscula</strong>, <strong id="number">um número</strong> e deve ter no <strong id="length">mínimo 8 caracteres!</strong></div>
                            <label for="password-repeat"><strong>Confirme a Password</strong></label>
                            <input type="password" placeholder="Insira Novamente a Password" name="password-repeat" id="password-repeat" required>
                            <label for=""><strong>Descrição Médico</strong></label>
                            <textarea name="descricaoMedico"></textarea>
                            <br>
                            <div class="row">
                                <label for="nameu"><strong>Horário de Trabalho</strong></label>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    Dias da Semana
                                </div>
                                <div class="col-lg-2">
                                    Início
                                </div>
                                <div class="col-lg-2">
                                    Fim
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-lg-2">
                                    Segunda
                                </div>
                                <div class="col-lg-2">
                                    <select id="segundaF" name="segundaFEntrada" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="segundaF" name="segundaFSaida" class="form-select" value="01:00" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                            </div>



                            <br>
                            <div class="row">

                                <div class="col-lg-2">
                                    Terça
                                </div>
                                <div class="col-lg-2">
                                    <select id="tercaF" name="tercaFEntrada" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="tercaF" name="tercaFSaida" class="form-select" value="01:00" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                            </div>


                            <br>
                            <div class="row">
                                <div class="col-lg-2">
                                    Quarta
                                </div>
                                <div class="col-lg-2">
                                    <select id="quartaF" name="quartaFEntrada" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="quartaF" name="quartaFSaida" class="form-select" value="01:00" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                            </div>



                            <br>
                            <div class="row">
                                <div class="col-lg-2">
                                    Quinta
                                </div>
                                <div class="col-lg-2">
                                    <select id="quintaF" name="quintaFEntrada" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="quintaF" name="quintaFSaida" class="form-select" value="01:00" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                            </div>


                            <br>
                            <div class="row">
                                <div class="col-lg-2">
                                    Sexta
                                </div>
                                <div class="col-lg-2">
                                    <select id="sextaF" name="sextaFEntrada" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="sextaF" name="sextaFSaida" class="form-select" value="01:00" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-lg-2">
                                    Sabado
                                </div>
                                <div class="col-lg-2">
                                    <select id="sabado" name="sabadoEntrada" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="sabado" name="sabadoSaida" value="01:00" class="form-select" aria-label="multiple select example">
                                        <option value="00:00"> 00:00 </option>
                                        <option value="01:00"> 01:00 </option>
                                        <option value="02:00"> 02:00 </option>
                                        <option value="03:00"> 03:00 </option>
                                        <option value="04:00"> 04:00 </option>
                                        <option value="05:00"> 05:00 </option>
                                        <option value="06:00"> 06:00 </option>
                                        <option value="07:00"> 07:00 </option>
                                        <option value="08:00"> 08:00 </option>
                                        <option value="09:00"> 09:00 </option>
                                        <option value="10:00"> 10:00 </option>
                                        <option value="11:00"> 11:00 </option>
                                        <option value="12:00"> 12:00 </option>
                                        <option value="13:00"> 13:00 </option>
                                        <option value="14:00"> 14:00 </option>
                                        <option value="16:00"> 16:00 </option>
                                        <option value="17:00"> 17:00 </option>
                                        <option value="18:00"> 18:00 </option>
                                        <option value="19:00"> 19:00 </option>
                                        <option value="20:00"> 20:00 </option>
                                        <option value="21:00"> 21:00 </option>
                                        <option value="22:00"> 22:00 </option>
                                        <option value="23:00"> 23:00 </option>
                                    </select>
                                </div>
                            </div>






                            <hr>
                            <div class="centro">
                                <input type="submit" class="botao verde" value="Adicionar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function carregarMunicipios(codProvincia) {
            $("#municipio").removeAttr("disabled");
            console.log($("#municipio")[0].options)
            for (let i = 0; i < $("#municipio")[0].options.length; i++) {
                $("#municipio")[0].options[i].classList = "";

            }
            for (let i = 0; i < $("#municipio")[0].options.length; i++) {
                if ($("#municipio")[0].options[i].id !== codProvincia) {
                    $("#municipio")[0].options[i].classList = "d-none";
                }
            }
        }
    </script>
    <script src="../../js/script.js"></script>
    <script src="../../js/foto.js"></script>
</body>

</html>