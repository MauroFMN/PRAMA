<?php $foto = $idade = ""; ?>
<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/consulta.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
        <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="consulta">
          <?php
          $id_usuario = mysqli_real_escape_string($mysqli, $_GET['id_usuario']);
          $sql = "SELECT * FROM pessoa WHERE idPessoa = {$id_usuario}";
          $dados = mysqli_query($mysqli, $sql);
          while ($row = mysqli_fetch_assoc($dados)) { ?>
            <div class="text">
              <div class="row userNameTitle">
                <div class="col-lg-12">
                  <h1>Consulta</h1>
                </div>
                <div class="col-lg-12">
                    <div class="row mt-5">
                      <div class="row cartao-medico pb-4 pt-4">
                        <div class="col-lg-2" style="margin: 0 auto;">
                          <?php
                          if (!empty($row['foto'])) {
                            $foto = $row['foto'];
                          } else {
                            $foto = "camera-solid.svg";
                          } ?>
                            <img src="../../imagens/<?php echo $foto; ?>" alt="" style="width: 100px; height: 100px; margin: 0 auto; display: flex;">
                          <div class="divBotaoMarcacaoConsulta">
                            <a class="" href="" >Terminar Consulta</a>
                          </div>
                        </div>
                        <div class="col-lg-7">
                          <h4 class="mb-3"><?php echo $row['nome']; ?></h4>

                          <div class="grupo-especialidades">
                            <?php if (!empty($row['dataNasc'])) {
                              $ano = explode("-",$row['dataNasc']);
                              if (date('m') != $ano[1] && date('d') != $ano[2]) {
                                $idade = date('Y') - $ano[0] - 1;
                              }else {
                                $idade = date('Y') - $ano[0];
                              } ?>
                            <p class="especialidades-medico">Idade: <?php echo $idade; ?></p>
                          <?php } if (!empty($row['peso'])) { ?>
                            <p class="especialidades-medico">Peso: <?php echo $row['peso']; ?>kg</p>
                          <?php } if (!empty($row['genero'])) { ?>
                            <p class="especialidades-medico">Genero: <?php echo $row['genero']; ?></p>
                          <?php } if (!empty($row['estCivil'])) { ?>
                            <p class="especialidades-medico">Est.Civil: <?php echo $row['estCivil']; ?></p>
                          <?php } if (!empty($row['tipoSang'])) { ?>
                              <p class="especialidades-medico">Tipo Sanguíneo: <?php echo $row['tipoSang']; ?></p>
                            <?php } ?>
                          </div>
                          <div class="detalhes-medico">
                            <p><?php // Pegar os dados do paciente relativos a consulta ?></p>
                          </div>
                          <!-- span class="info"><?php //echo $lunh['nome']; ?></span -->
                        </div>
                        <div class="col-lg-3">
                          <!-- div class="centro">
                            <h5 class="mb-3">Horário de Atendimento</h5>
                          </div -->
                          <div class="containerHorario">
                            <?php ?>
                              <div class="col-lg-12">
                                <p style="text-align: center">Ver como tratar das prescrições e das recomendações</p>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
                <?php include_once "../chat.php" ?>
            </div>
            <?php } ?>
        </section>
        <script src="../../js/script.js"></script>
        <script src="../js/chat.js"></script>
    </body>
</html>
