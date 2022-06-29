<!-- ALTER TABLE `mensagens` CHANGE `idMensagen` `idMensagem` INT(11) NOT NULL AUTO_INCREMENT; -->
<?php $foto = $idade = "";
include '../../conexao.php';

if (isset($_GET['antPatFamiliares']) && isset($_GET["id_consulta"])) {
  $antPatFamiliares = $_GET["antPatFamiliares"];
  $antPatPessoais = $_GET["antPatPessoais"];
  $motivoConsulta = $_GET["motivoConsulta"];
  $historicoDoencaAtual = $_GET["historicoDoencaAtual"];
  $resumoSindromico = $_GET["resumoSindromico"];
  $diagnosticoProvavel = $_GET["diagnosticoProvavel"];
  $recomendacao = $_GET["recomendacao"];
  $prescricao = $_GET["prescricao"];


  $sql3 = "SELECT descricao as descricaoPrescricao FROM prescricao WHERE codConsulta = {$_GET["id_consulta"]}";
  $dados3 = mysqli_query($mysqli, $sql3);
  if (!empty(mysqli_num_rows($dados3))) {
    while ($row3 = mysqli_fetch_assoc($dados3)) {
      $sql = "UPDATE prescricao SET `descricao`='" . $prescricao . "' where codConsulta =" . $_GET["id_consulta"] . "";
      if (mysqli_query($mysqli, $sql)) {
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
      }
    }
  } else {
    $sql = "INSERT INTO prescricao (descricao, codConsulta) VALUES ('" . $prescricao . "',  " . $_GET["id_consulta"] . ")";
    if (mysqli_query($mysqli, $sql)) {
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
  }

  $sql = "UPDATE consulta SET antPatFamiliares='" . $antPatFamiliares . "',  antPatPessoais='" . $antPatPessoais . "',  motivoConsulta='" . $motivoConsulta . "',  historicoDoencaAtual='" . $historicoDoencaAtual . "',  resumoSindromico='" . $resumoSindromico . "',  diagnosticoProvavel='" . $diagnosticoProvavel . "',  recomendacao='" . $recomendacao . "', estadoConsulta='Encerrado' where codConsulta =" . $_GET["id_consulta"] . "";
  if (mysqli_query($mysqli, $sql)) {
    header("location: consulta.php?id_consulta=" . $_GET['id_consulta'] . "");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
  }
}


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
                  <div class="divBotaoMarcacaoConsulta" id="botaoTerminarConsulta">
                    <a class="" id="botaoTerminarConsulta"><?php echo $row['estadoConsulta'] == "Encerrado" ? "Actualizar Consulta" : "Terminar Consulta" ?></a>
                  </div>
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
                        <form class="" action="index.html" method="post">
                          <label for="">Antecedentes Patológicos Familiares</label>
                          <textarea name="antPatFamiliares" id="antPatFamiliares" rows="5" cols="10"><?php echo $row["antPatFamiliares"]; ?></textarea>
                          <label for="">Antecedentes Patológicos Pessoais</label>
                          <textarea name="antPatPessoais" id="antPatPessoais" rows="5" cols="10"><?php echo $row["antPatPessoais"]; ?></textarea>
                          <label for="">Motivo da Consulta</label>
                          <textarea name="motivoConsulta" id="motivoConsulta" rows="5" cols="10"><?php echo $row["motivoConsulta"]; ?></textarea>
                          <label for="">Histórico da Doença Actual</label>
                          <textarea name="historicoDoencaAtual" id="historicoDoencaAtual" rows="5" cols="10"><?php echo $row["historicoDoencaAtual"]; ?></textarea>
                          <label for="">Resumo Sindrómico</label>
                          <textarea name="resumoSindromico" id="resumoSindromico" rows="5" cols="10"><?php echo $row["resumoSindromico"]; ?></textarea>
                          <label for="">Diagnóstico Provável</label>
                          <textarea name="diagnosticoProvavel" id="diagnosticoProvavel" rows="5" cols="10"><?php echo $row["diagnosticoProvavel"]; ?></textarea>
                        </form>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <br>
                      <div class="containerHorario" style="height: auto;">
                        <?php ?>
                        <div class="col-lg-12">
                          <label for="">Recomendações</label>
                          <textarea name="recomendacao" id="recomendacao" rows="8" cols="80"><?php echo $row["recomendacao"]; ?></textarea>
                          <br />
                          <?php
                          $sql2 = "SELECT descricao as descricaoPrescricao FROM prescricao WHERE codConsulta = {$id_consulta}";
                          $dados2 = mysqli_query($mysqli, $sql2);
                          if (!empty(mysqli_num_rows($dados2))) {
                            while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                              <label for="">Prescrição</label>
                              <textarea name="prescricao" id="prescricao" rows="8" cols="80"><?php echo $row2["descricaoPrescricao"]; ?></textarea>
                            <?php }
                          } else {
                            ?>
                            <label for="">Prescrição</label>
                            <textarea name="prescricao" id="prescricao" rows="8" cols="80"></textarea>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $id_contacto = $row["idPessoa"];
        ?>
        <?php include_once "../chat.php" ?>
      </div>
    <?php } ?>
  </section>
  <script>
    const botaoTerminarConsulta = document.querySelector("#botaoTerminarConsulta");
    if (botaoTerminarConsulta) {
      botaoTerminarConsulta.addEventListener("click", () => {
        const antPatFamiliares = document.getElementById("antPatFamiliares").value;
        const antPatPessoais = document.getElementById("antPatPessoais").value;
        const motivoConsulta = document.getElementById("motivoConsulta").value;
        const historicoDoencaAtual = document.getElementById("historicoDoencaAtual").value;
        const resumoSindromico = document.getElementById("resumoSindromico").value;
        const diagnosticoProvavel = document.getElementById("diagnosticoProvavel").value;
        const recomendacao = document.getElementById("recomendacao").value;
        const prescricao = document.getElementById("prescricao").value;
        window.location.href += "&antPatFamiliares=" + antPatFamiliares + "&antPatPessoais=" + antPatPessoais + "&motivoConsulta=" + motivoConsulta + "&historicoDoencaAtual=" + historicoDoencaAtual + "&resumoSindromico=" + resumoSindromico + "&diagnosticoProvavel=" + diagnosticoProvavel + "&recomendacao=" + recomendacao + "&prescricao=" + prescricao;
      })
    }
  </script>
  <script src="../../js/script.js"></script>
</body>

</html>