<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Marcar Consulta</title>
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
                      <h1>Marcação de Consulta</h1>
                  </div>
                  <div class="col-lg-12">
                  <?php
                  $medicos = "select * from medico join pessoa on (medico.idPessoa = pessoa.idPessoa) order by nome";
                  $listamedicos = mysqli_query($mysqli,$medicos);
                  while($rows = mysqli_fetch_assoc($listamedicos)){ ?>
                  <div class="row mt-5">
                    <div class="row cartao-medico pb-4 pt-4">
                      <div class="col-lg-2" style="margin: 0 auto;">
                        <img src="../../imagens/" alt="" style="width: 100px; height: 100px; margin: 0 auto; display: flex;">
                      </div>
                      <div class="col-lg-7">
                      <h4 class="mb-3"><?php echo $rows['nome']; ?></h4>
                          <?php
                          $esp = "SELECT * FROM especialidade esp JOIN especialidademedico espm ON(esp.codEspecialidade = espm.codEspecialidade) JOIN medico med ON(espm.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                          $listaesp = mysqli_query($mysqli,$esp);

                          ?>
                          <div class="grupo-especialidades">
                          <?php
                          while ($lesp = mysqli_fetch_assoc($listaesp)) { ?>
                            <p class="especialidades-medico"><?php echo $lesp['nome']; ?></p>
                          <?php } ?>
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
                            <span class="info"><?php echo $lunh['nomeUnHosp']; ?></span>
                          <?php } ?>
                      </div>
                      <div class="col-lg-3">
                      <div class="centro">
                          <h5>Horário de Atendimento</h5>
                        </div>
                        <div>
                          <table>
                            <tr>
                              <th></th>
                            </tr>
                            <tr>
                              <td></td>
                            </tr>
                          </table>
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
        <script src="../../js/script.js"></script>
        <script src="../../js/chat.js"></script>
    </body>
</html>
