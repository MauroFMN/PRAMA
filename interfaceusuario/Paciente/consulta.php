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
  <link rel="stylesheet" type="text/css" href="../../css/chat.css">
</head>

<body>

  <?php include_once "menu.php"; ?>


  <?php if (!empty($_GET["marcacaoConsulta"])) { ?>
    <div class="formularioMarcacaoConsulta">
      <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self" autocomplete="on">

        <div class="formRegElm">
          <h1>Marcação de Consulta</h1>
          <label><strong>Especialidades</strong></label>
          <br />
          <?php
          $esp = "SELECT * FROM especialidade esp JOIN especialidademedico espm ON(esp.codEspecialidade = espm.codEspecialidade) JOIN medico med ON(espm.numOrdem = med.numOrdem) where med.numOrdem = '{$_GET["marcacaoConsulta"]}'";
          $listaesp = mysqli_query($mysqli, $esp);

          $rowsEsp = mysqli_num_rows($listaesp);
          if ($rowsEsp > 0) {
            while ($lesp = mysqli_fetch_assoc($listaesp)) { ?>

              <input for="<?php echo $lesp['nome']; ?>" type="radio" name="especialidadeSelecionada" value="<?php echo $lesp['nome']; ?>" id="<?php echo $lesp['nome']; ?>" />
              <label style="margin-left: 5px; margin-bottom: 5px" for=""><?php echo $lesp['nome']; ?></label>


              <br />
            <?php }
          } else {
            ?>
            <input type="checkbox" name="especialidadesSelecionadas[]" value="Clínico Geral" id="Clínico Geral" />;
            <label for="Clínico Geral">Clínico Geral</label>

          <?php
          }


          $horarioAtendimento = "SELECT * FROM `horariomedico` INNER JOIN medico med ON(horariomedico.numOrdem = med.numOrdem) WHERE med.numOrdem = '{$_GET["marcacaoConsulta"]}'";
          $listaHorarioAtendimento = mysqli_query($mysqli, $horarioAtendimento);

          ?>


          <?php

          while ($listHorario = mysqli_fetch_assoc($listaHorarioAtendimento)) {
            $horariosExp = explode(",", $listHorario["horarioAtendimento"]);
            if (isset($horariosExp) && sizeof($horariosExp) > 1) {
          ?>

              <div class="row mt-3">
                <div class="md-6 sm-12"><?php
                                        echo '<input type="radio" id="' . $listHorario['diaSemana'] . '" name="diaSemana" value="' . $listHorario['diaSemana'] . '">';
                                        echo '<label style="margin-left: 10px" for="' . $listHorario['diaSemana'] . '">' . $listHorario['diaSemana'] . '</label><br>';
                                        ?></div>
                <div class="md-6 sm-12">
                  <?php

                  echo '<input type="time" id="appt" name="appt"
         min="' . $horariosExp[0] . '" max="' . substr($horariosExp[1], 1) . '" required>';

                  ?>

                </div>
              </div>
          <?php }
          } ?>






          <input type="submit" class="botao verde l" style="width: 100%;" value="Marcar Consulta" name="fpaciente">
        </div>
      </form>
    </div>

  <?php } ?>

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
                  <?php } else { ?>
                    <img src="../../imagens/camera-solid.svg" alt="" style="width: 100px; height: 100px; margin: 0 auto; display: flex;">
                  <?php } ?>
                  <div class="divBotaoMarcacaoConsulta">
                    <?php


                    $horarioAtendimento = "SELECT * FROM `horariomedico` INNER JOIN medico med ON(horariomedico.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                    $listaHorarioAtendimento = mysqli_query($mysqli, $horarioAtendimento);

                    $rowsHorario = mysqli_num_rows($listaHorarioAtendimento);
                    if ($rowsHorario > 0) {
                      echo ' <a class="" href="?marcacaoConsulta=' . $rows["numOrdem"] . '" >Agendar Consulta</a>';
                    } else {
                      echo ' <a class="inativo">Agendar Consulta</a>';
                    }


                    ?>

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
                  $unh = "SELECT pessoa.nome FROM unhospitalar JOIN trabalhar on(unhospitalar.codHospital = trabalhar.codHospital) inner join pessoa on unhospitalar.idPessoa = pessoa.idPessoa WHERE numOrdem = '{$rows["numOrdem"]}'";
                  $listunh = mysqli_query($mysqli, $unh);
                  while ($lunh = mysqli_fetch_assoc($listunh)) { ?>
                    <span class="info"><?php echo $lunh['nome']; ?></span>
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
                          <p class="" style="margin-right: 15px"><?php echo '<p style="text-align: center; margin: 5px">' . $listHorario['diaSemana'] . '</p>'; ?></p>
                          <?php
                          $horariosExp = explode(",", $listHorario["horarioAtendimento"]);
                          foreach ($horariosExp as $chave => $valor) {
                            echo '<p style="text-align: center; margin: 5px">' . $valor . '</p>';
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
      <?php include_once "../chat.php" ?>
    </div>
  </section>


  <script src="../../js/script.js"></script>

</body>

</html>
