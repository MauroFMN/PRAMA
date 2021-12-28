<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Os Meus Pacientes</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/paciente.css">
        <link rel="stylesheet" type="text/css" href="../../css/foto.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="perfil">
            <div class="text">
                <div class="row userNameTitle">
                    <div class="col-lg-12">
                        <h1>Os meus Pacientes</h1>
                    </div>
                    <div class="row mt-5">
                        <?php
                        $sql = "SELECT * FROM medico WHERE idPessoa = {$_SESSION["idPessoa"]}";
                        $dados = mysqli_query($mysqli,$sql);
                        while ($row = mysqli_fetch_assoc($dados)) {
                          $sql1 = "SELECT * FROM consulta WHERE numOrdem = '{$row['numOrdem']}'";
                          $dados1 = mysqli_query($mysqli,$sql1);
                          if (mysqli_num_rows($dados1) != 0) {
                            while ($row1 = mysqli_fetch_assoc($dados1)) {
                              $sql2 = "SELECT * FROM pessoa WHERE idPessoa = {$row1['idPessoa']}";
                              $dados2 = mysqli_query($mysqli,$sql2);
                              while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                                <div class="card">
                                  <?php if (!empty($dadosusuario['foto'])) {
                                    $foto = $dadosusuario['foto'];
                                  } else {
                                    $foto = 'camera-solid.svg';
                                  }?>
                                  <img src="../../imagens/<?php echo $foto; ?>" alt="" style="width: 100px; height: 100px; margin: 0 auto;">
                                <h1><?php echo $row2['nome']; ?></h1>
                                <p class="title"><?php echo $row2['dataNasc']; //fazer o cálculo da idade ?></p>
                                <p></p>
                                <div style="margin: 24px 0;">
                                  Peso:
                                  Tipo Sanguíneo:
                                  <?php //colocar informações como: peso, tipo sanguíneo ?>

                                </div>
                                <p><button onclick="document.getElementById('infoPaciente').style.display='block';">Ver Informações</button></p>
                              </div>
                            <?php  }
                            }
                          } else {
                            echo "Nenhum paciente marcou consulta com o Doutor.";
                          }
                        } ?>
                    </div>
                </div>
            </div>
            <div id="infoPaciente" class="paciente contentor">
              <span class="fechar" onClick="this.parentElement.style.display = 'none'; location = '?p='">&times;</span><br>
              <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self" autocomplete="on">
                foto; nome; idade; tipo Sanguíneo; peso; antecedentes patológicos familiares; antecedentes patológicos pessoais;
                <div class="espacoImagem">
                  <div class="conteudoImagem">
                    <?php if (!empty($dadosusuario['foto'])) {
                      $foto = $dadosusuario['foto'];
                    } else {
                      $foto = 'camera-solid.svg';
                    }?>
                    <img src="../../imagens/<?php echo $foto; ?>" alt="" id="fotografia">
                  </div>
                </div>
              </form>
            </div>
        </section>
        <script src="../../js/script.js"></script>
    </body>
</html>
