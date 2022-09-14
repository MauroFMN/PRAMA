<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Os Meus Médicos</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/all.css">
  <link rel="stylesheet" type="text/css" href="../../css/chat.css">
  <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
</head>

<body>
  <?php include_once "menu.php"; ?>
  <section class="home-section" id="perfil">
    <div class="text">
      <div class="row userNameTitle">
        <div class="col-lg-12">
          <h1>Médicos</h1>
        </div>
        <div id="containerMedicos" class="col-lg-12">
          <?php
          $sql = "SELECT numOrdem FROM consulta WHERE idPessoa = {$_SESSION["idPessoa"]}  group by numOrdem";
          $numConsultas = mysqli_query($mysqli, $sql);
          if (mysqli_num_rows($numConsultas) == 0) {
            echo "Marque uma consulta para o médico constar na sua lista.";
          } else {
            while ($row = mysqli_fetch_assoc($numConsultas)) {
              $sql1 = "SELECT * FROM pessoa JOIN medico ON(pessoa.idPessoa = medico.idPessoa) WHERE numOrdem = '{$row['numOrdem']}' and nome like '%{$_GET['pesquisa']}%'";
              $listaMedicos = mysqli_query($mysqli, $sql1);
              if (mysqli_num_rows($listaMedicos) == 0) { ?>
                <script>
                  document.getElementById("containerMedicos").innerHTML = `
                    <p>Sem médicos encontrados para a pesquisa</p>
                  `
                </script>
              <?php
              }
              while ($rows = mysqli_fetch_assoc($listaMedicos)) { ?>
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
                          echo ' <a class="" href="/prama/interfaceusuario/Paciente/consulta.php?marcacaoConsulta=' . $rows["numOrdem"] . '" >Marcar Consulta</a>';
                        } else {
                          echo ' <a class="inativo">Marcar Consulta</a>';
                        } ?>
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
                  </div>
                </div>
          <?php }
            }
          }
          ?>
        </div>
        <div class="col-lg-12">
          <h1>Agendamentos</h1>
        </div>
        <div id="cotainerAgendamento" class="col-lg-12">
          <div id="agendamento">
            <?php $sql1 = "SELECT * FROM consulta WHERE idPessoa = {$_SESSION['idPessoa']} and estadoConsulta = 'Activo' order by dataConsulta";
            $dados1 = mysqli_query($mysqli, $sql1);
            if (!empty(mysqli_num_rows($dados1))) { ?>
              <table>
                <tr>
                  <th>Data/Hora</th>
                  <th>Especialidade</th>
                  <th>Médico</th>
                  <th>Atendimento</th>
                </tr>
                <?php while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                  <tr>
                    <td><?php echo $row1['dataConsulta']; ?></td>
                    <?php $dados2 = mysqli_query($mysqli, "SELECT * from especialidade WHERE codEspecialidade = {$row1['codEspecialidade']} and nome like '%{$_GET['pesquisa']}%' ");

                    if (mysqli_num_rows($dados2) == 0) { ?>
                      <script>
                        document.getElementById("cotainerAgendamento").innerHTML = `
                          <p>Sem agendamentos encontrados para a pesquisa</p>
                        `
                      </script>
                    <?php
                    }
                    while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                      <td><?php echo $row2['nome']; ?></td>
                      <?php };
                    $dados3 = mysqli_query($mysqli, "SELECT * FROM medico WHERE numOrdem = '{$row1['numOrdem']}'");
                    while ($row3 = mysqli_fetch_assoc($dados3)) {
                      $dados4 = mysqli_query($mysqli, "SELECT * FROM pessoa WHERE idPessoa = {$row3['idPessoa']} ");
                      while ($row4 = mysqli_fetch_assoc($dados4)) { ?>
                        <td><?php echo $row4['nome']; ?></td>
                        <td>Telemedicina</td>
                        <td><a href="index.php?id_usuario=<?php echo $row3['idPessoa'] ?>" style="color:black"><i class="fab fa-whatsapp" style="font-size:20px"></i></a></td>
                        <?php
                        if ($row1["estadoConsulta"] == "Activo") {
                        ?>
                          <td><a href=<?php echo "index.php?deleteId=" . $row1["codConsulta"]; ?> style="color:red"><i class="fas fa-times" style="font-size:20px"></i></a></td>
                        <?php
                        } else {
                        ?>
                          <td><a href=<?php echo "resumoConsulta.php?id_consulta=" . $row1["codConsulta"]; ?> style=" color:black"><i class="fas fa-file" style="font-size:20px"></i></a></td>
                        <?php
                        }
                        ?>
                  </tr>
            <?php }
                    }
                  } ?>
              </table>
            <?php } else {
              echo "Primeiro marque uma consulta.";
            } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../../js/script.js"></script>
  <script src="../js/chat.js"></script>
</body>

</html>