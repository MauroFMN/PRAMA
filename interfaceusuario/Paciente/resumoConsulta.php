<!-- ALTER TABLE `mensagens` CHANGE `idMensagen` `idMensagem` INT(11) NOT NULL AUTO_INCREMENT; -->
<?php $foto = $idade = "";
include '../../conexao.php';
?>
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
    $id_consulta = mysqli_real_escape_string($mysqli, $_GET['id_consulta']);
    $sql = "SELECT * FROM consulta INNER JOIN pessoa ON pessoa.idPessoa = consulta.idPessoa WHERE consulta.codConsulta = {$id_consulta}";
    $dados = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_assoc($dados)) { ?>
      <div class="text">
        <div class="row userNameTitle">
          <div class="col-lg-12">
            <h1>Consulta</h1>
          </div>
          <div class="col-lg-12">
            <div class="row mt-5">
              <div class="row cartao-medico pb-4 pt-4 mb-5">
                <div class="col-lg-3" style="margin: 0 auto;">
                  <?php
                  if (!empty($row['foto'])) {
                    $foto = $row['foto'];
                  } else {
                    $foto = "camera-solid.svg";
                  } ?>
                  <img src="../../imagens/<?php echo $foto; ?>" alt="" style="width: 100px; height: 100px; margin: 0 auto; display: flex;">

                </div>
                <div class="col-lg-9">
                  <h4 class="mb-3"><?php echo $row['nome']; ?></h4>

                  <div class="grupo-especialidades">
                    <?php if (!empty($row['dataNasc'])) {
                      $ano = explode("-", $row['dataNasc']);
                      if (date('m') != $ano[1] && date('d') != $ano[2]) {
                        $idade = date('Y') - $ano[0] - 1;
                      } else {
                        $idade = date('Y') - $ano[0];
                      } ?>
                      <p class="especialidades-medico">Idade: <?php echo $idade; ?></p>
                    <?php }
                    if (!empty($row['peso'])) { ?>
                      <p class="especialidades-medico">Peso: <?php echo $row['peso']; ?>kg</p>
                    <?php }
                    if (!empty($row['genero'])) { ?>
                      <p class="especialidades-medico">Genero: <?php echo $row['genero']; ?></p>
                    <?php }
                    if (!empty($row['estCivil'])) { ?>
                      <p class="especialidades-medico">Est.Civil: <?php echo $row['estCivil']; ?></p>
                    <?php }
                    if (!empty($row['tipoSang'])) { ?>
                      <p class="especialidades-medico">Tipo Sanguíneo: <?php echo $row['tipoSang']; ?></p>
                    <?php } ?>
                  </div>
                  <div class="row">
                    <div class="col-lg-9">

                      <div class="detalhes-medico" style="height: auto;">
                        <br>
                        <label for="">Recomendações</label>
                        <textarea name="recomendacao" id="recomendacao" rows="8" cols="80" disabled><?php echo $row["recomendacao"]; ?></textarea>
                        <?php
                        $sql2 = "SELECT descricao as descricaoPrescricao FROM prescricao WHERE codConsulta = {$id_consulta}";
                        $dados2 = mysqli_query($mysqli, $sql2);
                        if (!empty(mysqli_num_rows($dados2))) {
                          while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                            <label for="">Prescrição</label>
                            <textarea name="prescricao" id="prescricao" rows="8" cols="80" disabled><?php echo $row2["descricaoPrescricao"]; ?></textarea>
                          <?php }
                        } else {
                          ?>
                          <label for="">Prescrição</label>
                          <textarea name="prescricao" id="prescricao" rows="8" cols="80" disabled></textarea>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php

        $id_consulta = mysqli_real_escape_string($mysqli, $_GET['id_consulta']);
        $sql = "SELECT * FROM consulta INNER JOIN medico on medico.numOrdem = consulta.numOrdem INNER JOIN pessoa on pessoa.idPessoa = medico.idPessoa WHERE consulta.codConsulta = {$id_consulta}";
        $dados = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_assoc($dados)) {
          $id_contacto = $row["idPessoa"];
          $nomeContacto = $row["nome"];
        } ?>
        <?php include_once "../chat.php" ?>
      </div>
    <?php } ?>
  </section>

  <script src="../../js/script.js"></script>
</body>

</html>