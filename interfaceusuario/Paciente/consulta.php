<?php include 'conexao.php'; ?>
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
                  <div class="row mt-5">
                    <div class="cartao-medico">
                      <?php
                      $medicos = "select * from medico";
                      $listamedicos = mysqli_query($mysqli,$medicos);
                      while($rows = mysqli_fetch_assoc($listamedicos){ ?>
                        <div class="centro separador">
                          <img src="../../imagens/" alt="" style="width: 100px; height: 100px;">
                        </div>
                        <div class="separador info-medico">
                          <h1><?php echo "$rows['numOrdem']"; ?></h1>
                          <span class="info">Especialidades1</span>
                          <span class="info">Especialidades2</span>
                          <span class="info">Especialidades3</span>
                          <div class="detalhes-medico">
                            <p>Informações sobre o médico </p>
                          </div>
                          <span class="info">unidade hospitalar1</span>
                          <span class="info">unidade hospitalar1</span>
                        </div>
                      <?php  }?>
                      <div class="separador calendario">
                        <div class="centro">
                          <h3>Horário de Atendimento</h3>
                        </div>
                        <div>
                          <table>
                            <tr>
                              <th>Segunda</th>
                              <th>Terça</th>
                              <th>Quarta</th>
                              <th>Quinta</th>
                              <th>Sexta</th>
                              <th>Sábado</th>
                              <th>Domingo</th>
                            </tr>
                            <tr>
                              <td>08:00</td>
                              <td>08:00</td>
                              <td>08:00</td>
                              <td>08:00</td>
                              <td>08:00</td>
                              <td>08:00</td>
                              <td>08:00</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
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
