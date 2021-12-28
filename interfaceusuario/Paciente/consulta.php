<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marcar Consulta</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/all.css">
  <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
</head>

<body>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div id="reg" class="d-none">
    <div class="centross">
      <a class="xl hover-opacity" href="?p=1">Paciente</a>
      <a class="xl hover-opacity" href="?p=2">Médico</a>
      <a class="xl hover-opacity" href="?p=3">Unidade Hospitalar</a>
    </div>
    <span class="fechar" onClick="this.parentElement.style.display = 'none'; location = '?p='">&times;</span><br>
    <?php if (!empty($_GET["p"])) { ?>
      <script>
        document.getElementById('reg').style.display = 'block';
      </script>





      <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self" autocomplete="on">

        <div class="formRegElm">
          <?php if ($_GET["p"] == "1") { ?> <h1>Registo de Paciente</h1> <?php } ?>
          <?php if ($_GET["p"] == "2") { ?> <h1>Registo de Médico</h1> <?php } ?>
          <?php if ($_GET["p"] == "3") { ?> <h1>Registo de Unidade Hospitalar</h1> <?php } ?>

          <?php if ($_GET["p"] != "3") { ?>

            <label for="nome"><strong>Nome Completo</strong></label>
            <input type="text" placeholder="Insira o Nome Completo" name="nome" id="nome" required autofocus>

          <?php } ?>

          <?php if (true) {
            echo '<br>';
            echo '<label for="peso"><strong>Peso</strong></label>';
            echo '<input type="number" placeholder="Insira o peso" name="peso" id="peso">';
            echo '<br>';
            echo '<label for="dataNasc"><strong>Data de Nascimento</strong></label>';
            echo '<br>';
            echo '<input type="date" placeholder="Insira a sua data de Nascimento" name="dataNasc" id="dataNasc">';
            echo '<br>';
            echo '<label for="docId"><strong>Documento de Identificação</strong></label>';
            echo '<br>';
            echo '<select id="docId" name="docId">';
            echo '<option>Selecionar...</option>';
            echo '<option value="Bilhete de Identidade">Bilhete de Identidade</option>';
            echo '<option value="Passaporte">Passaporte</option>';
            echo '</select>';
            echo '<br>';
            echo '<label for="numeroDoc"><strong>Numero do Documento</strong></label>';
            echo '<input type="text" placeholder="Insira o nome de utilizador" name="numeroDoc" id="numeroDoc">';
            echo '<br>';
            echo '<label for="genero"><strong>Genero</strong></label>';
            echo '<br>';
            echo '<select id="genero" name="genero">';
            echo '<option>Selecionar...</option>';
            echo '<option value="Masculino">Masculino</option>';
            echo '<option value="Femenino">Femenino</option>';
            echo '</select>';
            echo '<br>';
            echo '<label for="estadoCivil"><strong>Estado Civil</strong></label>';
            echo '<br>';
            echo '<select id="estadoCivil" name="estadoCivil">';
            echo '<option>Selecionar...</option>';
            echo '<option value="Casado">Casado</option>';
            echo '<option value="Solteiro">Solteiro</option>';
            echo '<option value="Viuvo">Viuvo</option>';
            echo '<option value="Divorciado">Divorciado</option>';
            echo '</select>';

            echo '<br>';
            echo '<label for="tipoSang"><strong>Tipo Sanguíneo</strong></label>';
            echo '<br>';
            echo '<select id="tipoSang" name="tipoSang">';
            echo '<option>Selecionar...</option>';
            echo '<option value="A+">A+</option>';
            echo '<option value="A-">A-</option>';
            echo '<option value="B+">B+</option>';
            echo '<option value="B-">B-</option>';
            echo '<option value="AB+">AB+</option>';
            echo '<option value="AB-">AB-</option>';
            echo '<option value="O+">O+</option>';
            echo '<option value="O-">O-</option>';
            echo '</select>';
          }
          if ($_GET["p"] == "3") { ?>
            <hr>
            <label><strong>Dados da Unidade Hospitalar</strong></label>
            <hr>
            <label for="nomeUH"><strong>Nome da Unidade Hospitalar</strong></label>
            <input type="text" placeholder="Escreva o Nome da Unidade Hospitalar" name="nomeUH" id="nomeUH">
            <label for="nIdFiscal"><strong>Número de Identificação Fiscal</strong></label>
            <input type="number" placeholder="Informe o número de Identificação Fiscal" name="nIdFiscal" id="nIdFiscal">
          <?php } ?>
          <label for="tlf"><strong>Telefone</strong></label>
          <input type="tel" placeholder="Nº de Telefone" name="tlf" id="tlf" required>
          <?php if ($_GET["p"] == "2") {
            echo '<br>';
            echo '<label for="nOrdem"><strong>Nº da Ordem dos Médicos</strong></label>';
            echo '<input type="text" placeholder="Insira o Número da Ordem dos Médicos" name="nOrdem" id="nOrdem">';
            echo '<label for="esp"><strong>Especialidade</strong></label>';
            echo '<select id="esp" name="esp[]" class="form-select" multiple aria-label="multiple select example">';

            $especialidadessql = "SELECT codEspecialidade, nome FROM especialidade";

            $especialidadesresult = mysqli_query($mysqli, $especialidadessql);

            while ($row    = mysqli_fetch_assoc($especialidadesresult)) {

              echo "<option value=" . $row["codEspecialidade"] . ">" . $row['nome'] . "</option>";
            }

            // mysqli_close($mysqli);

            echo '</select>';

            echo '<br>';
            echo '<label for="segundaF"><strong>Horário de Atendimento às Segundas</strong></label>';
            echo '<br>';
            echo '<select id="segundaF" name="segundaF[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';


            echo '<br>';
            echo '<label for="tercaF"><strong>Horário de Atendimento às Terças</strong></label>';
            echo '<br>';
            echo '<select id="tercaF" name="tercaF[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';


            echo '<br>';
            echo '<label for="quartaF"><strong>Horário de Atendimento às Quartas</strong></label>';
            echo '<br>';
            echo '<select id="quartaF" name="quartaF[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';


            echo '<br>';
            echo '<label for="quintaF"><strong>Horário de Atendimento às Quintas</strong></label>';
            echo '<br>';
            echo '<select id="quintaF" name="quintaF[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';


            echo '<br>';
            echo '<label for="sextaF"><strong>Horário de Atendimento às Sextas </strong></label>';
            echo '<br>';
            echo '<select id="sextaF" name="sextaF[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';



            echo '<br>';
            echo '<label for="sabado"><strong>Horário de Atendimento aos Sábados</strong></label>';
            echo '<br>';
            echo '<select id="sabado" name="sabado[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';



            echo '<br>';
            echo '<label for="domingo"><strong>Horário de Atendimento aos Domingos</strong></label>';
            echo '<br>';
            echo '<select id="domingo" name="domingo[]" class="form-select" multiple aria-label="multiple select example">';
            echo '<option value="00:00"> 00:00 </option>';
            echo '<option value="01:00"> 01:00 </option>';
            echo '<option value="02:00"> 02:00 </option>';
            echo '<option value="03:00"> 03:00 </option>';
            echo '<option value="04:00"> 04:00 </option>';
            echo '<option value="05:00"> 05:00 </option>';
            echo '<option value="06:00"> 06:00 </option>';
            echo '<option value="07:00"> 07:00 </option>';
            echo '<option value="08:00"> 08:00 </option>';
            echo '<option value="09:00"> 09:00 </option>';
            echo '<option value="10:00"> 10:00 </option>';
            echo '<option value="11:00"> 11:00 </option>';
            echo '<option value="12:00"> 12:00 </option>';
            echo '<option value="13:00"> 13:00 </option>';
            echo '<option value="14:00"> 14:00 </option>';
            echo '<option value="16:00"> 16:00 </option>';
            echo '<option value="17:00"> 17:00 </option>';
            echo '<option value="18:00"> 18:00 </option>';
            echo '<option value="19:00"> 19:00 </option>';
            echo '<option value="20:00"> 20:00 </option>';
            echo '<option value="21:00"> 21:00 </option>';
            echo '<option value="22:00"> 22:00 </option>';
            echo '<option value="23:00"> 23:00 </option>';
            echo '</select>';


            echo '<br>';
            echo '<label for="descricaoMedico"><strong>Descrição Profissional</strong></label>';
            echo '<br>';

            echo '<textarea id="descricaoMedico" name="descricaoMedico"> </textarea>';
          }


          if ($_GET["p"] == "3") { ?>
            <br>
            <label for="sector"><strong>Sector no SNS</strong></label>
            <select id="sector" name="sector" onchange="alterarSubsector(this.value)">
              <option>Selecionar...</option>
              <option value="publico">Sector Público</option>
              <option value="privado">Sector Privado</option>
              <option value="tradicional">Sector de Medicina Tradicional</option>
              <option value="deficicão" selected>Seleccione o sector da UH</option>
            </select>
            <br>

            <label for="subsector"><strong>Subsector do SNS</strong></label>
            <select name="subsector" id="subsector">

              <!-- Sector Privado -->
            </select>
            <br>
            <label for="npac"><strong>Nº de Pacientes atendidos Diáriamente</strong></label>
            <input type="number" placeholder="Insira o nº" name="npac" id="npac">



          <?php } ?>
          <br>
          <label for="provincia"><strong>Provincia</strong></label>
          <br />
          <select id="provincia" name="provincia" onchange="carregarMunicipios(this.value)">
            <option>Selecionar...</option>
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
          <label for="municipio"><strong>Municipio</strong></label>
          <br />
          <select id="municipio" name="municipio" onchange="" disabled>
            <option>Selecionar...</option>
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
          <input type="text" placeholder="Escreva o seu endereco" name="endereco" id="endereco">
          <br />

          <label for="email"><strong>Email</strong></label>
          <input type="text" placeholder="Insira o Email" name="email" id="email">

          <?php if ($_GET["p"] == "3") { ?>
            <hr>
            <label><strong>Dados de Gestão da Clínica</strong></label><br>
            <hr>
          <?php } ?>
          <br>
          <label for="nameu"><strong>Nome de Utilizador</strong></label>
          <input type="text" placeholder="Insira o nome de utilizador" name="nameu" id="nameu">

          <label for="password"><strong>Password</strong></label>
          <input type="password" placeholder="Insira a Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          <div id="message">A password deve ter <strong id="letter">uma letra minúscula</strong>, <strong id="capital">uma maiúscula</strong>, <strong id="number">um número</strong> e deve ter no <strong id="length">mínimo 8 caracteres!</strong></div>
          <label for="password-repeat"><strong>Confirme a Password</strong></label>
          <input type="password" placeholder="Insira Novamente a Password" name="password-repeat" id="password-repeat" required>
          <hr>
          <input type="submit" class="botao verde l" style="width: 100%;" value="Registar" name="fpaciente">
        </div>
      </form>
    <?php } ?>
  </div>

  <?php include_once "menu.php"; ?>
  <section class="home-section" id="perfil">
    <div class="text">
      <div class="row userNameTitle">
        <div class="col-lg-12">
          <h1>Marcação de Consulta</h1>
        </div>
        <div class="col-lg-12">
          <?php
          $medicos = "SELECT * FROM medico JOIN pessoa on (medico.idPessoa = pessoa.idPessoa) order by nome";
          $listamedicos = mysqli_query($mysqli, $medicos);
          while ($rows = mysqli_fetch_assoc($listamedicos)) { ?>
            <div class="row mt-5">
              <div class="row cartao-medico pb-4 pt-4">
                <div class="col-lg-2" style="margin: 0 auto;">
                    <?php if (!empty($dadosusuario['foto'])) { ?>
                      <img src="../../imagens/<?php echo $dadosusuario['foto']; ?>" alt="" style="width: 100px; height: 100px; margin: 0 auto; display: flex;">
                    <?php } else{ ?>
                      <img src="../../imagens/camera-solid.svg" alt="" style="width: 100px; height: 100px; margin: 0 auto; display: flex;">
                    <?php } ?>
                  <div class="divBotaoMarcacaoConsulta">
                    <a className="" href="#marcacaoConsulta" onclick="console.log(document.querySelector('#reg'));document.querySelector('#reg').classList.toggle('d-none');document.querySelector('#reg').classList.toggle('d-block')">Agendar Consulta</a>
                  </div>
                </div>
                <div class="col-lg-7">
                  <h4 class="mb-3"><?php echo $rows['nome']; ?></h4>
                  <?php
                  $esp = "SELECT * FROM especialidade esp JOIN especialidademedico espm ON(esp.codEspecialidade = espm.codEspecialidade) JOIN medico med ON(espm.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                  $listaesp = mysqli_query($mysqli, $esp);

                  ?>
                  <div class="grupo-especialidades">
                    <?php
                    $rowsEsp = mysqli_num_rows($listaesp);
                    if ($rowsEsp > 0) {
                      while ($lesp = mysqli_fetch_assoc($listaesp)) { ?>
                        <p class="especialidades-medico"><?php echo $lesp['nome']; ?></p>
                      <?php }
                    } else {
                      ?>
                      <p class="especialidades-medico">Clínico Geral</p>
                    <?php
                    } ?>

                  </div>
                  <div class="detalhes-medico">
                    <p><?php if (!empty($rows['descricao'])) {
                          echo $rows['descricao'];
                        } else {
                          echo "Sem descrição disponível.";
                        }
                        ?></p>
                  </div>
                  <?php
                  $unh = "SELECT * FROM unhospitalar JOIN trabalhar on(unhospitalar.codHospital = trabalhar.codHospital) WHERE numOrdem = '{$rows["numOrdem"]}'";
                  $listunh = mysqli_query($mysqli, $unh);
                  while ($lunh = mysqli_fetch_assoc($listunh)) { ?>
                    <span class="info"><?php echo $lunh['nomeUnHosp']; ?></span>
                  <?php } ?>
                </div>
                <div class="col-lg-3">
                  <div class="centro">
                    <h5 class="mb-3">Horário de Atendimento</h5>
                  </div>
                  <div class="containerHorario">
                    <?php
                    $horarioAtendimento = "SELECT * FROM `horariomedico` INNER JOIN medico med ON(horariomedico.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                    $listaHorarioAtendimento = mysqli_query($mysqli, $horarioAtendimento);

                    ?>
                    <?php
                    $rowsHorario = mysqli_num_rows($listaHorarioAtendimento);
                    if ($rowsHorario > 0) {
                      while ($listHorario = mysqli_fetch_assoc($listaHorarioAtendimento)) { ?>
                        <div class="col-lg-3">
                          <p class="" style="margin-right: 15px"><?php echo $listHorario['diaSemana']; ?></p>
                          <?php
                          $horariosExp = explode(",", $listHorario["horarioAtendimento"]);
                          foreach ($horariosExp as $chave => $valor) {
                            echo $valor;
                          }
                          ?>
                        </div>
                      <?php }
                    } else {
                      ?>
                      <div class="col-lg-12">
                        <p style="text-align: center">Sem Horários Disponíveis</p>
                      </div>
                    <?php
                    } ?>
                  </div>
                </div>
                <!-- <div class="centro separador">
                          <img src="../../imagens/" alt="" style="width: 100px; height: 100px;">
                        </div> -->
                <!-- <div class="separador info-medico">

                        </div> -->
                <!-- <div class="separador calendario">

                      </div> -->
              </div>
            </div>
          <?php } ?>
        </div>

      </div>
      <div class="row mt-5">
        <div>
        </div>
  </section>
  <script src="../../js/jquery-3.6.0.min.js"></script>
  <script>
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  </script>
</body>

</html>
