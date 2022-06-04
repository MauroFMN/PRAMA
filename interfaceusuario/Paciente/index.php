<?php $idPaciente = $codConsulta = "";
$pre = $req = "-";
session_start();
include '../../conexao.php';


if (isset($_GET["deleteId"])) {
  $sql = "DELETE FROM consulta WHERE codConsulta = " . $_GET["deleteId"] . " and idPessoa= " . $_SESSION["idPessoa"] . "";
  if (mysqli_query($mysqli, $sql)) {
    header("location: index.php");
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
  <title>Paciente</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/all.css">
  <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
  <link rel="stylesheet" type="text/css" href="../../css/chat.css">
  <script src="../../js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php include_once "menu.php"; ?>
  <section class="home-section" id="main">
    <div class="text">
      <div class="row userNameTitle">
        <div class="col-lg-12">
          <h1>Área Pessoal</h1>
        </div>
      </div>
      <div class="row mt-5">
        <ul class="nav nav-tabs">
          <li class="nav-item userNavItem">
            <a href="#primeiraTab" class="nav-link  active" role="tab" data-toggle="tab">Consultas</a>
          </li>
          <li class="nav-item userNavItem">
            <a href="#segundaTab" class="nav-link " role="tab" data-toggle="tab">Prescrições/Requisições</a>
          </li>
          <li class="nav-item userNavItem">
            <a href="#terceiraTab" class="nav-link " role="tab" data-toggle="tab">Histórico</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade mt-3 show active" role="tabpanel" id="primeiraTab">
            <div class="row mt-5 opcoes">
              <div class="col-lg-6">
                <div class="row mt-3">
                  <div class="">
                    <?php
                    $idPaciente = $_SESSION["idPessoa"];
                    $sql = "SELECT * FROM consulta WHERE idPessoa = {$idPaciente}";
                    $numConsultas = mysqli_query($mysqli, $sql);
                    if (mysqli_num_rows($numConsultas) == 0) {
                      echo "Não tem consulta marcada!";
                    } else {
                      $ativo = 0;
                      while ($row = mysqli_fetch_assoc($numConsultas)) {
                        if ($row['estadoConsulta'] == 'Activo') {
                          $ativo++;
                        }
                      }
                      echo "Tem " . $ativo . " consulta(s) marcadas";
                    }
                    ?>
                  </div>
                </div>
                <div class="row mt-3">
                  <button type="button" class="btn btn-primary w-50"><a href="consulta.php" style="text-decoration: none; color: white;">Marcar Consulta</a></button>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row mt-3">
                  <div><?php echo "Tenha acesso aos seus agendamentos e não perca uma consulta."; ?></div>
                </div>
                <div class="row mt-3">
                  <button type="button" class="btn btn-primary w-50" onclick="document.getElementById('agendamento').classList=='hide'?document.getElementById('agendamento').classList='':document.getElementById('agendamento').classList='hide'">Ver Marcação(ões)</button>
                </div>
              </div>
              <div class="hide" id="agendamento">
                <?php $sql1 = "SELECT * FROM consulta WHERE idPessoa = {$idPaciente} order by dataConsulta";
                $dados1 = mysqli_query($mysqli, $sql1);
                if (!empty(mysqli_num_rows($dados1))) { ?>
                  <table>
                    <tr>
                      <th>Data/Hora</th>
                      <th>Especialidade</th>
                      <th>Médico</th>
                      <th>Atendimento</th>
                    </tr>
                    <?php while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                      <tr>
                        <td><?php echo $row1['dataConsulta']; ?></td>
                        <?php $dados2 = mysqli_query($mysqli, "SELECT * from especialidade WHERE codEspecialidade = {$row1['codEspecialidade']}");
                        while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                          <td><?php echo $row2['nome']; ?></td>
                          <?php };
                        $dados3 = mysqli_query($mysqli, "SELECT * FROM medico WHERE numOrdem = '{$row1['numOrdem']}'");
                        while ($row3 = mysqli_fetch_assoc($dados3)) {
                          $dados4 = mysqli_query($mysqli, "SELECT * FROM pessoa WHERE idPessoa = {$row3['idPessoa']}");
                          while ($row4 = mysqli_fetch_assoc($dados4)) { ?>
                            <td><?php echo $row4['nome']; ?></td>
                            <td>Telemedicina</td>
                            <td><a href="?id_usuario=<?php echo $row3['idPessoa'] ?>" style="color:black"><i class="fab fa-whatsapp" style="font-size:20px"></i></a></td>
                            <?php
                            if ($row1["estadoConsulta"] == "Activo") {
                            ?>
                              <td><a href=<?php echo "?deleteId=" . $row1["codConsulta"]; ?> style="color:red"><i class="fas fa-times" style="font-size:20px"></i></a></td>
                            <?php
                            } else {
                            ?>
                              <td><a href=<?php echo "resumoConsulta.php?id_consulta=" . $row1["codConsulta"]; ?> style=" color:black"><i class="fas fa-file" style="font-size:20px"></i></a></td>
                            <?php
                            }
                            ?>
                      </tr>
                <?php }
                        }
                      } ?>
                  </table>
                <?php } ?>
              </div>
            </div>
          </div>
          <div class="tab-pane fade mt-3" role="tabpanel" id="segundaTab">
            <div class="row mt-5 opcoes">
              <div class="col-lg-6">
                <div class="row mt-3">
                  <div>
                    <?php //tipo(prescrição), descrição (textArea), codPrescricao, codConsulta
                    echo "Fazer como na marcação de consulta!"; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade mt-3" role="tabpanel" id="terceiraTab">
            <div class="row mt-5 opcoes">
              <div class="col-lg-6">
                <div class="row mt-3">
                  <?php
                  $sql = "SELECT * FROM consulta WHERE idPessoa = {$idPaciente} and estadoConsulta = 'Atendido' or estadoConsulta = 'Cancelada'";
                  $dados = mysqli_query($mysqli, $sql);
                  if (!empty(mysqli_num_rows($dados))) { ?>
                    <table>
                      <tr>
                        <th>Data/Hora</th>
                        <th>Especialidade</th>
                        <th>Médico</th>
                        <th>Motivo consulta</th>
                        <th>Diagnóstico</th>
                        <th>Prescrição médica</th>
                        <th>Requisição médica</th>
                        <th>Preço</th>
                      </tr>
                      <?php while ($row = mysqli_fetch_assoc($dados)) { ?>
                        <tr>
                          <td><?php echo $row['dataConsulta']; ?></td>
                          <?php
                          $sql1 = "SELECT * from especialidade WHERE codEspecialidade = {$row['codEspecialidade']}";
                          $dados1 = mysqli_query($mysqli, $sql1);
                          while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                            <td><?php echo $row['nome']; ?></td>
                            <?php };
                          $sql2 = "SELECT * FROM medico WHERE numOrdem = '{$row['numOrdem']}'";
                          $dados2 = mysqli_query($mysqli, $sql2);
                          while ($row2 = mysqli_fetch_assoc($dados2)) {
                            $sql3 = "SELECT * from pessoa WHERE idPessoa = {$row2['idPessoa']}";
                            $dados3 = mysqli_query($mysqli, $sql3);
                            while ($row3 = mysqli_fetch_assoc($dados3)) { ?>
                              <td><?php echo $row3['nome']; ?></td>
                          <?php }
                          } ?>
                          <td><?php echo $row['motivoConsulta']; ?></td>
                          <td><?php echo $row['diagnosticoProvavel']; ?></td>
                          <?php
                          $sql4 = "SELECT * FROM prescricao WHERE codConsulta = {$row['codConsulta']}";
                          $dados4 = mysqli_query($mysqli, $sql4);
                          if (!empty($dados4)) {
                            while ($row4 = mysqli_fetch_assoc($dados4)) {
                              if ($row4['tipo'] == 'Prescrição') {
                                $pre = $row4['descricao'];
                              } else {
                                if ($row4['tipo'] == 'Rquisição') {
                                  $req = $row4['descricao'];
                                }
                              }
                            }
                          } ?>
                          <td><?php echo $pre; ?></td>
                          <td><?php echo $req; ?></td>
                          <td><?php echo $row['preco']; ?></td>
                        </tr>
                    <?php }
                    } else {
                      echo "O histórico de consultas está vazio.";
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      if (!empty($_GET['id_usuario'])) {
        $id_usuario = mysqli_real_escape_string($mysqli, $_GET['id_usuario']);
        $sql = "SELECT * FROM pessoa WHERE idPessoa = {$id_usuario}";
        $dados = mysqli_query($mysqli, $sql);
        if (!empty(mysqli_num_rows($dados))) {
          while ($row = mysqli_fetch_assoc($dados)) {
            include_once "../chat.php";
          }
        }
      } ?>
    </div>
  </section>
  <script src="../../js/script.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script>
    $(".nav.nav-tabs li").on("click", function() {
      $(".nav-link.active").removeClass("active");
      $(this).children("a").addClass("active");

      const id = $(this).children("a").attr("href");
      $(".tab-pane.fade").removeClass("show");
      $(".tab-pane.fade").removeClass("active");

      const element = document.getElementById(id.substr(1))
      element.classList = element.classList + " show active"
    })
  </script>
</body>

</html>