<?php include '../../conexao.php'; ?>
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
                  <?php
                  $medicos = "select * from medico join pessoa on (medico.idPessoa = pessoa.idPessoa) order by nome";
                  $listamedicos = mysqli_query($mysqli,$medicos);
                  while($rows = mysqli_fetch_assoc($listamedicos)){ ?>
                  <div class="row mt-5">
                    <div class="cartao-medico">
                        <div class="centro separador">
                          <img src="../../imagens/" alt="" style="width: 100px; height: 100px;">
                        </div>
                        <div class="separador info-medico">
                          <h3><?php echo $rows['nome']; ?></h3>
                          <?php
                          $esp = "SELECT * FROM especialidade esp JOIN especialidademedico espm ON(esp.codEspecialidade = espm.codEspecialidade) JOIN medico med ON(espm.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                          $listaesp = mysqli_query($mysqli,$esp);
                          while ($lesp = mysqli_fetch_assoc($listaesp)) { ?>
                            <span class="info"><?php echo $lesp['nome']; ?></span>
                          <?php } ?>
                          <div class="detalhes-medico">
                            <p><?php if (!empty($rows['descricao'])) {
                              echo $rows['descricao'];
                            } else {
                              echo "Sem descrição disponível.";
                            }
                             ?></p>
                          </div>
                          <?php
                          $unh = "SELECT * FROM unhospitalar unh JOIN trabalhar trab ON(unh.codHospital = trab.codHospital) JOIN medico med ON(trab.numOrdem = med.numOrdem) WHERE idPessoa = {$rows['idPessoa']}";
                          $listunh = mysqli_query($mysqli,$unh);
                          while ($lunh = mysqli_fetch_assoc($listunh)) { ?>
                            <span class="info"><?php echo $lunh['nomeUnHosp']; ?></span>
                          <?php } ?>
                        </div>
                      <div class="separador calendario">
                        <div class="centro">
                          <h3>Horário de Atendimento</h3>
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
                    </div>
                  </div>
                  <?php  }?>
              </div>
              <div class="row mt-5">
              <div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
        <script src="../../js/chat.js"></script>
    </body>
</html>
