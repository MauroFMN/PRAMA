<?php $foto = $nome = $peso = $tiposangue = $idade = $id = "";  ?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisa</title>
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
        <div id="containerPacientes" class="row mt-5">
          <?php
          $sql = "SELECT * FROM medico WHERE idPessoa = {$_SESSION["idPessoa"]}";
          $dados = mysqli_query($mysqli, $sql);
          while ($row = mysqli_fetch_assoc($dados)) {
            $sql1 = "SELECT idPessoa FROM consulta WHERE numOrdem = '{$row['numOrdem']}' group by idPessoa";
            $dados1 = mysqli_query($mysqli, $sql1);
            if (mysqli_num_rows($dados1) != 0) {
              while ($row1 = mysqli_fetch_assoc($dados1)) {
                $sql2 = "SELECT * FROM pessoa WHERE idPessoa = {$row1['idPessoa']} and nome like '%{$_GET['pesquisa']}%' ";
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
                    <p><a href="?paciente=<?php echo $row1['idPessoa']; ?>" class="verPerfil" onclick="document.getElementById('infoPaciente').style.display='block';">Ver Perfil</a></p>
                  </div>
          <?php  }
              }
            } else {
              echo "Nenhum paciente marcou consulta com o Doutor.";
            }
          } ?>
        </div>
        <div class="row mt-3">
          <div class="col-lg-12">
            <h1>Consultas</h1>
          </div>
          <div>
            <?php
            $sql0 = "SELECT * FROM medico WHERE idPessoa = {$_SESSION["idPessoa"]}";
            $dados0 = mysqli_query($mysqli, $sql0);
            while ($row0 = mysqli_fetch_assoc($dados0)) {
              $nOrdem = $row0['numOrdem'];
              $sql = "SELECT * FROM consulta WHERE numOrdem = '$nOrdem' AND estadoConsulta = 'Activo' ORDER BY dataConsulta";
              $dados = mysqli_query($mysqli, $sql);
              if (!empty(mysqli_num_rows($dados))) { ?>
                <table>
                  <tr>
                    <th>Paciente</th>
                    <th>Especialidade</th>
                    <th>Data/Hora</th>
                  </tr>
                  <?php
                  while ($row = mysqli_fetch_assoc($dados)) {
                    $sql1 = "SELECT * FROM pessoa WHERE idPessoa = {$row['idPessoa']} and nome like '%{$_GET['pesquisa']}%'";
                    $dados1 = mysqli_query($mysqli, $sql1);
                    while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                      <tr>
                        <td><?php echo $row1['nome']; ?></td>
                        <?php
                        $sql2 = "SELECT * FROM especialidade WHERE codEspecialidade = {$row['codEspecialidade']}";
                        $dados2 = mysqli_query($mysqli, $sql2);
                        while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                          <td><?php echo $row2['nome']; ?></td>
                        <?php }  ?>
                        <td><?php echo $row['dataConsulta']; ?></td>
                        <td><a href="pacientes.php?paciente=<?php echo $row['idPessoa']; ?>" class="btn btn-primary w-100">Histórico</a><a href="consulta.php?id_consulta=<?php echo $row['codConsulta']; ?>" class="btn btn-primary btn-success w-100">Atender</a></td>
                      </tr>
                  <?php }
                  } ?>
                </table>
            <?php } else {
                echo "Não tem consulta(s) marcada(s).";
              }
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