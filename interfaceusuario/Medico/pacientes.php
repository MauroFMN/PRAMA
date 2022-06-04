<?php $foto = $nome = $peso = $tiposangue = $idade = $id = "";  ?>
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
  <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
  <link rel="stylesheet" type="text/css" href="../../css/chat.css">
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
          $dados = mysqli_query($mysqli, $sql);
          while ($row = mysqli_fetch_assoc($dados)) {
            $sql1 = "SELECT idPessoa FROM consulta WHERE numOrdem = '{$row['numOrdem']}' group by idPessoa";
            $dados1 = mysqli_query($mysqli, $sql1);
            if (mysqli_num_rows($dados1) != 0) {
              while ($row1 = mysqli_fetch_assoc($dados1)) {
                $sql2 = "SELECT * FROM pessoa WHERE idPessoa = {$row1['idPessoa']}";
                $dados2 = mysqli_query($mysqli, $sql2);
                while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                  <div class="card">
                    <?php if (!empty($dadosusuario['foto'])) {
                      $foto = $dadosusuario['foto'];
                    } else {
                      $foto = 'camera-solid.svg';
                    };
                    $nome = $row2['nome'];
                    $peso = $row2['peso'];
                    $tiposangue = $row2['tipoSang'];
                    $id = $row2['idPessoa'];
                    $ano = explode("-", $row2['dataNasc']);
                    if (date('m') != $ano[1] && date('d') != $ano[2]) {
                      $idade = date('Y') - $ano[0] - 1;
                    } else {
                      $idade = date('Y') - $ano[0];
                    }
                    ?>
                    <img src="../../imagens/<?php echo $foto; ?>" alt="" style="width: 100px; height: 100px; margin: 0 auto;">
                    <h1><?php echo $nome; ?></h1>
                    <p class="title"><?php echo $idade . " anos de idade."; ?></p>
                    <div style="margin: 24px 0;">
                      <span>Peso:<?php echo $peso . " kg."; ?></span>
                      <span>Tipo Sanguíneo:<?php echo $tiposangue; ?></span>
                    </div>
                    <p><a href="?paciente=<?php echo $row1['idPessoa'];?>" class="verPerfil" onclick="document.getElementById('infoPaciente').style.display='block';">Ver Perfil</a></p>
                  </div>
          <?php  }
              }
            } else {
              echo "Nenhum paciente marcou consulta com o Doutor.";
            }
          } ?>
        </div>
      </div>
      <?php
      if (isset($_GET["paciente"])) {
      ?>
        <div id="infoPaciente" class="paciente contentor">
          <span class="fechar" onClick="this.parentElement.style.display = 'none'; location = '?p='">&times;</span><br>
          <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self" autocomplete="on">
            <div class="espacoImagem">
              <div class="conteudoImagem">
                <img src="../../imagens/<?php echo $foto; ?>" alt="" id="fotografia">
              </div>
            </div>
            <div class="dias" style="margin: 0 100px">
              <?php
              $sql4 = "SELECT * FROM consulta WHERE idPessoa = {$_GET["paciente"]}";
              $sql5 = "SELECT * FROM pessoa WHERE idPessoa = {$_GET["paciente"]}";
              $dados4 = mysqli_query($mysqli, $sql4);
              if (mysqli_num_rows($dados4) != 0) { ?>
              <table>
                  <?php
                  $dados5 = mysqli_query($mysqli, $sql5);
                  while ($row5 = mysqli_fetch_assoc($dados5)) {
                    $nome = $row5['nome'];
                    $peso = $row5['peso'];
                    $tiposangue = $row5['tipoSang'];
                    $id = $row5['idPessoa'];
                    $ano = explode("-", $row5['dataNasc']);
                    if (date('m') != $ano[1] && date('d') != $ano[2]) {
                      $idade = date('Y') - $ano[0] - 1;
                    } else {
                      $idade = date('Y') - $ano[0];
                    }
                    ?>

                    <tr>
                    <td>Nome: <?php echo $nome; ?></td>
                  </tr>
                  <tr>
                    <td>Idade: <?php echo $idade; ?></td>
                  </tr>
                  <tr>
                    <td>Tipo Sanguíneo: <?php echo $tiposangue; ?></td>
                  </tr>
                  <tr>
                    <td>Peso: <?php echo $peso . " kg."; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>
                    <td>Antecedentes Patológicos Familiares:
                      <?php
                      while ($row4 = mysqli_fetch_assoc($dados4)) {
                        if (!empty($row4['antPatFamiliares'])) {
                          echo $row4['antPatFamiliares']." |";
                        }
                      } ?>
                  </tr>
                  <tr>
                    <td>Antecedentes Patológios Pessoais:</td>
                      <?php
                      while ($row4 = mysqli_fetch_assoc($dados4)) {
                        if (!empty($row4['antPatPessoais'])) {
                          echo $row4['antPatPessoais']." |";
                        }
                      } ?>
                    </td>
                  </tr>
                </table>
              <?php } ?>
            </div>
          </form>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
  <script src="../../js/script.js"></script>
  <script src="../js/chat.js"></script>
</body>

</html>
