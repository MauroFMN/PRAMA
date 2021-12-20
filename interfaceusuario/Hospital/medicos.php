<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Os Meus Pacientes</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
        <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="medicos">
            <div class="text">
                <div class="row userNameTitle">
                    <div class="col-lg-12">
                        <h1>Médicos</h1>
                    </div>
                    <div class="row mt-5">
                        <?php
                        $sql = "SELECT * From unhospitalar WHERE idPessoa = {$_SESSION["idPessoa"]}";
                        $instrucao = mysqli_query($mysqli,$sql);
                        if (mysqli_num_rows($instrucao) != 0) {
                          while ($row = mysqli_fetch_assoc($instrucao)) {
                            $sql1 = "SELECT * FROM pessoa JOIN medico ON(pessoa.idPessoa = medico.idPessoa) JOIN trabalhar ON(medico.numOrdem = trabalhar.numOrdem) WHERE codHospital = {$row['codHospital']}";
                            $infoMedico = mysqli_query($mysqli,$sql1);
                            while ($rows = mysqli_fetch_assoc($infoMedico)) {?>
                              <div class="row mt-5">
                                <div class="row cartao-medico pb-4 pt-4">
                                  <div class="col-lg-2" style="margin: 0 auto;">
                                    <div style="width: 100px; height: 100px; margin: 0 auto; display: flex;">
                                      <?php if (!empty($dadosusuario['foto'])) { ?>
                                        <img src="../../imagens/<?php echo $dadosusuario['foto']; ?>" alt="">
                                      <?php } else{ ?>
                                        <img src="../../imagens/camera-solid.svg" alt="">
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class="col-lg-7">
                                  <h4 class="mb-3"><?php echo $rows['nome']; ?></h4>
                                      <?php
                                      $esp = "SELECT * FROM especialidade esp JOIN especialidademedico espm ON(esp.codEspecialidade = espm.codEspecialidade) JOIN medico med ON(espm.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                                      $listaesp = mysqli_query($mysqli,$esp);

                                      ?>
                                      <div class="grupo-especialidades">
                                      <?php
                                      $rowsEsp = mysqli_num_rows($listaesp);
                                      if($rowsEsp>0){
                                        while ($lesp = mysqli_fetch_assoc($listaesp)) { ?>
                                          <p class="especialidades-medico"><?php echo $lesp['nome']; ?></p>
                                        <?php }
                                      } else{
                                        ?>
                                        <p class="especialidades-medico">Clínico Geral</p>
                                        <?php
                                      }?>

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
                                      $listunh = mysqli_query($mysqli,$unh);
                                      while ($lunh = mysqli_fetch_assoc($listunh)) { ?>
                                        <!-- span class="info"><?php //echo $lunh['nomeUnHosp']; ?></span -->
                                      <?php } ?>
                                  </div>
                                  <div class="col-lg-3">
                                  <div class="centro">
                                      <h5 class="mb-3">Horário de Atendimento</h5>
                                    </div>
                                    <div class="containerHorario">
                                    <?php
                                      $horarioAtendimento = "SELECT * FROM `horariomedico` INNER JOIN medico med ON(horariomedico.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                                      $listaHorarioAtendimento = mysqli_query($mysqli,$horarioAtendimento);

                                      ?>
                                      <?php
                                      $rowsHorario = mysqli_num_rows($listaHorarioAtendimento);
                                      if($rowsHorario>0){
                                        while ($listHorario = mysqli_fetch_assoc($listaHorarioAtendimento)) { ?>
                                        <div class="col-lg-3">
                                        <p class="" style="margin-right: 15px"><?php echo $listHorario['diaSemana']; ?></p>
                                        <?php
                                        $horariosExp = explode(",",$listHorario["horarioAtendimento"]);
                                        foreach($horariosExp as $chave => $valor){
                                          echo $valor;
                                        }
                                        ?>
                                        </div>
                                        <?php }
                                      } else{
                                        ?>
                                        <div class="col-lg-12">
                                          <p style="text-align: center">Sem Horários Disponíveis</p>
                                        </div>
                                        <?php
                                      }?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }
                          }
                        } else {
                          echo "Não existem médicos inscritos no(a) ".$_SESSION["nomeUnHosp"].".";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
    </body>
</html>
