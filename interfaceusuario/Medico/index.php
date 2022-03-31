<?php $nOrdem = ""; ?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface do Médico</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/all.css">
  <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
  <link rel="stylesheet" type="text/css" href="../../css/chat.css">
  <script src="../../js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <?php include_once 'menu.php'; ?>
  <section class="home-section" id="main">
    <div class="text">
      <div class="row userNameTitle">
        <div class="col-lg-12">
          <h1>Área de Trabalho</h1>
        </div>
      </div>
      <div class="row mt-5 w-100">
        <ul class="nav nav-tabs">
          <li class="nav-item userNavItem">
            <a href="#primeiraTab" class="nav-link  active" role="tab" data-toggle="tab">Consultas</a>
          </li>
          <li class="nav-item userNavItem">
            <a href="#segundaTab" class="nav-link " role="tab" data-toggle="tab">Histórico de consultas</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade mt-3 show active" role="tabpanel" id="primeiraTab">
            <div class="row mt-5 opcoes">
              <div class="col-lg-12">
                <div class="row mt-3">
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
                            $sql1 = "SELECT * FROM pessoa WHERE idPessoa = {$row['idPessoa']}";
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
                                <?php echo $row['idPessoa'] ?>
                                <td><a href="pacientes.php?paciente=<?php echo $row['idPessoa']; ?>" class="btn btn-primary w-100">Histórico</a><a href="consulta.php?id_usuario=<?php echo $row['idPessoa']; ?>" class="btn btn-primary btn-success w-100">Atender</a></td>
                                <!-- Por o estado (online ou offline) ou ativar o botão de atendimento quando
                                                  paciente estiver online e desabilitar quando estive offline -->
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
          </div>
          <div class="tab-pane fade mt-3" role="tabpanel" id="segundaTab">
            <div class="row mt-5 opcoes">
              <div class="col-lg-6">
                <div class="row mt-3">
                  <div>
                    <?php
                    $sql3 = "SELECT * FROM consulta WHERE numOrdem = '$nOrdem' AND estadoConsulta = 'Atendido'";
                    $dados3 = mysqli_query($mysqli, $sql3);
                    if (!empty(mysqli_num_rows($dados3))) { ?>
                      <table>
                        <tr>
                          <th>Paciente</th>
                          <th>Especialidade</th>
                          <th>Data/Hora</th>
                        </tr>
                        <?php
                        $sql4 = "SELECT * FROM pessoa WHERE idPessoa = {$row['idPessoa']}";
                        $dados4 = mysqli_query($mysqli, $sql4);
                        while ($row4 = mysqli_fetch_assoc($dados4)) { ?>
                          <tr>
                            <td><?php echo $row4['nome']; ?></td>
                            <?php
                            $sql5 = "SELECT * FROM especialidade WHERE codEspecialidade = {$row['codEspecialidade']}";
                            $dados5 = mysqli_query($mysqli, $sql5);
                            while ($row5 = mysqli_fetch_assoc($dados5)) { ?>
                              <td><?php echo $row5['nome']; ?></td>
                            <?php }  ?>
                            <td><?php echo $row3['dataConsulta']; ?></td>
                            <td><button type="button" class="btn btn-primary w-100">Visualizar</button></td>
                          </tr>
                        <?php } ?>
                      </table>
                    <?php } else {
                      echo "O histórico de consultas está vazio.";
                    } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="home-section hide" id="pacientes">
    <div class="text">
      <h2>Os Meus Pacientes</h2>
    </div>
  </section>
  <section class="home-section hide" id="perfil">
    <div class="text">
      <h2>Perfil</h2>
    </div>
  </section>

  <script src="../../js/script.js"></script>
  <script>
    // console.log("Medico")
    $(".nav.nav-tabs li").on("click", function(e) {
      console.log("Element", e)
      $(".nav-link.active").removeClass("active");
      $(this).children("a").addClass("active");

      const id = $(this).children("a").attr("href");
      $(".tab-pane.fade").removeClass("show");
      $(".tab-pane.fade").removeClass("active");

      const element = document.getElementById(id.substr(1))
      element.classList = element.classList + " show active"
    })
  </script>
  <script src="../js/chat.js"></script>
</body>

</html>