<?php
include '../../conexao.php';
if (session_id() == '') {
  session_start();
}

if (isset($_GET["horaConsulta"])) {

  $dataConsulta =  "" . (string)explode(".", $_GET["dataConsulta"])[3] . "-" . (string)explode(".", $_GET["dataConsulta"])[2] . "-" . (string)explode(".", $_GET["dataConsulta"])[1] . " " . $_GET["horaConsulta"];

  $sql = "INSERT INTO `consulta`(`codConsulta`, `idPessoa`, `numOrdem`, `codEspecialidade`, `dataConsulta`,`estadoConsulta`,`motivoConsulta`) VALUES (null,'" . $_SESSION["idPessoa"] . "','" . $_GET["marcacaoConsulta"] . "','" . $_GET["especialidade"] . "','" . $dataConsulta . "', 'Activo', '" . $_GET["motivoConsulta"] . "')";
  echo $sql;
  if (mysqli_query($mysqli, $sql)) {
    header("location: consulta.php");
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
  <title>Marcar Consulta</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/all.css">
  <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
  <link rel="stylesheet" type="text/css" href="../../css/chat.css">
</head>

<body>

  <?php include_once "menu.php";

  function getDates($year)
  {
    $dates = array();

    date("L", mktime(0, 0, 0, 7, 7, $year)) ? $days = 366 : $days = 365;
    for ($i = 1; $i <= $days; $i++) {
      $month = date('m', mktime(0, 0, 0, 1, $i, $year));
      $wk = date('W', mktime(0, 0, 0, 1, $i, $year));
      $wkDay = date('D', mktime(0, 0, 0, 1, $i, $year));
      $day = date('d', mktime(0, 0, 0, 1, $i, $year));

      $dates[$month][$wk][$wkDay] = $day;
    }

    return $dates;
  }
  ?>


  <?php if (!empty($_GET["marcacaoConsulta"]) && empty($_GET["horaConsulta"])) { ?>
    <div class="formularioMarcacaoConsulta">
      <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self" autocomplete="on">


        <div class="formRegElm">
          <h1>Marcação de Consulta</h1>

          <?php
          if (isset($_GET["passo"]) && $_GET["passo"] == 2) {

          ?>
            <label><strong>Horário da Consulta</strong></label>
            <?php
            $diaSemana = explode(".", $_GET["dataConsulta"]);
            $dia = "";
            switch ($diaSemana[0]) {
              case "Mon":
                $dia = "Segunda";
                break;
              case "Tue":
                $dia = "Terça";
                break;
              case "Wed":
                $dia = "Quarta";
                break;
              case "Thu":
                $dia = "Quinta";
                break;
              case "Fri":
                $dia = "Sexta";
                break;
              case "Sat":
                $dia = "Sabado";
                break;
                //case "Sun":
                //$dia = "Domingo";
                //break;
            }
            $horarioMedico = "";
            $horarioAtendimento = "SELECT * FROM `horariomedico` INNER JOIN medico med ON(horariomedico.numOrdem = med.numOrdem) WHERE med.numOrdem = '{$_GET["marcacaoConsulta"]}' and horariomedico.diaSemana = '{$dia}'";

            $horariosOcupados = [];


            $dataConsulta =  "" . (string)explode(".", $_GET["dataConsulta"])[3] . "-" . (string)explode(".", $_GET["dataConsulta"])[2] . "-" . (string)explode(".", $_GET["dataConsulta"])[1];

            $sqlHorariosOcupados = "SELECT dataConsulta from consulta WHERE dataConsulta>='" . $dataConsulta . "' && dataConsulta<='" . $dataConsulta . " 23:59:59" . "'";
            $listaHorariosOcupados = mysqli_query($mysqli, $sqlHorariosOcupados);
            while ($row = mysqli_fetch_assoc($listaHorariosOcupados)) {
              $horasHMS = explode(" ", $row['dataConsulta'])[1];
              $horasMS = explode(":", $horasHMS)[0] . ":" . explode(":", $horasHMS)[1];
              array_push($horariosOcupados, $horasMS);
            }


            $listaHorarioAtendimento = mysqli_query($mysqli, $horarioAtendimento);
            while ($listHorario = mysqli_fetch_assoc($listaHorarioAtendimento)) {
              $horarioMedico = $listHorario['horarioAtendimento'];
            }
            $horarioDividido = explode(", ", $horarioMedico);

            $horaInicial = (int)explode(":", $horarioDividido[0])[0];
            $horaFinal = (int)explode(":", $horarioDividido[1])[0];


            $horarioEscrever = [];

            if ($horaInicial < $horaFinal) {
              for ($i = $horaInicial; $i < $horaFinal; $i++) {
                $hora = (int)strlen($i) == 1 ? '0' . $i . ':00' : ($i == 24 ? "00:00" : $i . ':00');
                if (in_array($hora, $horariosOcupados)) {
                  continue;
                } else {
                  array_push($horarioEscrever, $hora);
                }
            ?>
              <?php
              }
            } else {
              $npassou24 = true;
              for ($i = $horaInicial; $npassou24 || $i < $horaFinal; $i++) {
                $hora = (int)strlen($i) == 1 ? '0' . $i . ':00' : ($i == 24 ? "00:00" : $i . ':00');
                if (in_array($hora, $horariosOcupados)) {
                  continue;
                } else {
                  array_push($horarioEscrever, $hora);
                }
                if ($i == 24) {
                  $npassou24 = false;
                  $i = 0;
                }
              }
            }

            if (count($horarioEscrever)) {
              for ($i = 0; $i < count($horarioEscrever); $i++) {
              ?>
                <br />
                <input type="radio" name="horaConsulta" value=<?php echo $horarioEscrever[$i]; ?> id="horaConsulta" />
                <label for="horaConsulta">
                  <?php echo $horarioEscrever[$i];
                  ?>
                </label>
              <?php
              }
            } else {
              ?>
              <p>Não há vagas disponíveis para este dia.</p>
            <?php
            }
            ?>
            <br />
            <label><strong>Motivo da Consulta</strong></label>
            <textarea rows="4" cols="50" name="motivoConsulta" id="motivoConsulta"></textarea>
            <div class="divBotaoMarcarConsulta">
              <p class="">Marcar Consulta</p>
            </div>
          <?php
          } else {
          ?>
            <label><strong>Especialidade da Consulta</strong></label>
            <br />
            <?php
            $esp = "SELECT * FROM especialidade esp JOIN especialidademedico espm ON(esp.codEspecialidade = espm.codEspecialidade) JOIN medico med ON(espm.numOrdem = med.numOrdem) where med.numOrdem = '{$_GET["marcacaoConsulta"]}'";
            $listaesp = mysqli_query($mysqli, $esp);

            $rowsEsp = mysqli_num_rows($listaesp);
            if ($rowsEsp > 0) {
              while ($lesp = mysqli_fetch_assoc($listaesp)) { ?>
                <!-- <div style="display: flex; flex-direction: row;"> -->
                <input for="<?php echo $lesp['nome']; ?>" type="radio" name="especialidadeSelecionada" value="<?php echo $lesp['codEspecialidade']; ?>" id="<?php echo $lesp['nome']; ?>" />
                <label style="margin-left: 5px; margin-bottom: 5px" for=""><?php echo $lesp['nome']; ?></label>
                <!-- </div> -->


                <br />
              <?php }
            } else {
              ?>
              <input type="radio" name="especialidadeSelecionada" value="Clínico Geral" id="Clínico Geral" />;
              <label for="Clínico Geral">Clínico Geral</label>

            <?php
            }


            $horarioAtendimento = "SELECT * FROM `horariomedico` INNER JOIN medico med ON(horariomedico.numOrdem = med.numOrdem) WHERE med.numOrdem = '{$_GET["marcacaoConsulta"]}'";
            $listaHorarioAtendimento = mysqli_query($mysqli, $horarioAtendimento);
            $diasDaSemana = array();
            while ($listHorario = mysqli_fetch_assoc($listaHorarioAtendimento)) {
              $horariosExp = explode(",", $listHorario["horarioAtendimento"]);
              if (isset($horariosExp) && sizeof($horariosExp) > 1) {
                switch ($listHorario['diaSemana']) {
                  case "Segunda":
                    array_push($diasDaSemana, "Mon");
                    break;
                  case "Terça":
                    array_push($diasDaSemana, "Tue");
                    break;
                  case "Quarta":
                    array_push($diasDaSemana, "Wed");
                    break;
                  case "Quinta":
                    array_push($diasDaSemana, "Thu");
                    break;
                  case "Sexta":
                    array_push($diasDaSemana, "Fri");
                    break;
                  case "Sabado":
                    array_push($diasDaSemana, "Sat");
                    break;
                    //case "Domingo":
                    //array_push($diasDaSemana, "Sun");
                    //break;
                }
              }
            }
            ?>
            <label><strong>Data da Consulta</strong></label>
            <?php $dates = getDates(date("y"));

            $mes = date("m");
            foreach ($dates as $month => $weeks) {
              if ($month == $mes) { ?>
                <p class="w-100 " style="text-align: center; font-weight: bold;">
                  <?php

                  switch ($mes) {
                    case 1:
                      echo "Janeiro";
                      break;
                    case 2:
                      echo "Fevereiro";
                      break;
                    case 3:
                      echo "Março";
                      break;
                    case 4:
                      echo "Abril";
                      break;
                    case 5:
                      echo "Maio";
                      break;
                    case 6:
                      echo "Junho";
                      break;
                    case 7:
                      echo "Julho";
                      break;
                    case 8:
                      echo "Agosto";
                      break;
                    case 9:
                      echo "Setembro";
                      break;
                    case 10:
                      echo "Outubro";
                      break;
                    case 11:
                      echo "Novembro";
                      break;
                    case 12:
                      echo "Dezembro";
                      break;
                  }
                  ?>
                </p>
                <table>
                  <tr>
                    <th>Seg</th>
                    <th>Ter</th>
                    <th>Qua</th>
                    <th>Qui</th>
                    <th>Sex</th>
                    <th>Sab</th>
                    <!--th>Dom</th-->
                  </tr>
                  <?php foreach ($weeks as $week => $days) { ?>
                    <tr>
                      <?php foreach ($diasDaSemana as $day) { ?>
                        <td>

                          <?php
                          if (date("m") == $mes) {
                            if (isset($days[$day]) && $days[$day] > date("d")) {
                          ?>
                              <input type="radio" name="dataConsulta" value=<?php echo $day . '.' . $days[$day] . '.' . $mes . '.' . date("y") ?> id="Clínico Geral" />
                            <?php
                              echo $days[$day];
                            } else {
                              echo '-';
                            }
                          } else {
                            if (isset($days[$day])) {
                            ?>
                              <input type="radio" name="dataConsulta" value=<?php echo $day . '.' . $days[$day] . '.' . $mes . '.' . date("y") ?> id="Clínico Geral" />
                          <?php
                              echo ($days[$day]);
                            } else {
                              echo '-';
                            }
                          }
                          ?>
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </table>
              <?php $mes = $mes + 1;
                if (date("m") + 1 < $mes) {
                  break;
                }
              } ?>
            <?php
            }
            ?>


            <?php

            while ($listHorario = mysqli_fetch_assoc($listaHorarioAtendimento)) {
              $horariosExp = explode(",", $listHorario["horarioAtendimento"]);
              if (isset($horariosExp) && sizeof($horariosExp) > 1) {
            ?>

                <div class="row mt-3">


                  <div class="md-6 sm-12">
                    <?php
                    echo '<input type="radio" id="' . $listHorario['diaSemana'] . '" name="diaSemana" value="' . $listHorario['diaSemana'] . '">';
                    echo '<label style="margin-left: 10px" for="' . $listHorario['diaSemana'] . '">' . $listHorario['diaSemana'] . '</label><br>';
                    ?>
                  </div>
                  <div class="md-6 sm-12">
                    <?php

                    echo '<input type="time" id="appt" name="appt" min="' . $horariosExp[0] . '" max="' . substr($horariosExp[1], 1) . '" required>';

                    ?>

                  </div>
                </div>
            <?php }
            } ?>

            <div class="divBotaoSeguinte">
              <p class="">Seguinte</p>
            </div>
          <?php
          }
          ?>


          <!-- <input type="submit" class="botao verde l" style="width: 100%;" value="Seguinte" name="fpaciente"> -->
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
                <div class="col-lg-3" style="margin: 0 auto;">
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
                      echo ' <a class="" href="?marcacaoConsulta=' . $rows["numOrdem"] . '" >Marcar Consulta</a>';
                    } else {
                      echo ' <a class="inativo">Marcar Consulta</a>';
                    }


                    ?>

                  </div>
                </div>
                <div class="col-lg-6">

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
    </div>
  </section>

  <script>
    const botaoSeguinte = document.querySelector(".divBotaoSeguinte");
    const botaoMarcarConsulta = document.querySelector(".divBotaoMarcarConsulta");
    if (botaoSeguinte) {
      botaoSeguinte.addEventListener("click", () => {
        const especialidade = document.querySelector('input[name="especialidadeSelecionada"]:checked').value;
        const dataConsulta = document.querySelector('input[name="dataConsulta"]:checked').value;

        window.location.href += "&passo=2&especialidade=" + especialidade + "&dataConsulta=" + dataConsulta;

      })
    }
    if (botaoMarcarConsulta) {

      botaoMarcarConsulta.addEventListener("click", () => {
        const horarioConsulta = document.querySelector('input[name="horaConsulta"]:checked').value;
        const motivoConsulta = document.getElementById("motivoConsulta").value;
        window.location.href += "&horaConsulta=" + horarioConsulta + "&motivoConsulta=" + motivoConsulta;
      })
    }
  </script>
  <script src="../../js/script.js"></script>
  <script src="../../js/chat.js"></script>

</body>

</html>