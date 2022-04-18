<?php  ?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Paciente</title>
  <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/all.css">
  <link rel="stylesheet" type="text/css" href="../../css/foto.css">
</head>

<body>
  <?php include_once "menu.php"; ?>
  <section class="home-section" id="perfil">
    <div class="text">
      <div class="row">
        <div class="col-lg-12">
          <h1>Perfil</h1>
        </div>
      </div>
      <div class="row mt-5">
        <div class="formulario">
          <?php
          $sql = "SELECT * FROM pessoa WHERE idPessoa = {$_SESSION["idPessoa"]}";
          $dados = mysqli_query($mysqli, $sql);
          while ($dadosusuario = mysqli_fetch_assoc($dados)) { ?>
            <form id="form" style="display: block;" class="formRegElm">
              <div class="espacoImagem">
                <div class="conteudoImagem">
                  <?php if (!empty($row['foto'])) {
                    $foto = $row['foto'];
                  } else {
                    $foto = 'camera-solid.svg';
                  } ?>
                  <img src="../../imagens/<?php echo $foto; ?>" alt="" id="fotografia">
                </div>
                <input type="file" name="foto" id="foto" accept="image/*" disabled>
              </div>
              <label for="nome">Nome:</label>
              <input type="text" name="nome" id="nome" value="<?php echo $dadosusuario['nome']; ?>" disabled style="width: 94.42%">
              <label for="dataNasc">Data de Nascimento:</label>
              <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $dadosusuario['dataNasc']; ?>" disabled style="width: auto">
              <label for="genero">Género:</label>
              <select disabled style="width: auto; height: 50px;">
                <option value="<?php echo $dadosusuario['genero']; ?>"><?php echo $dadosusuario['genero']; ?></option>
              </select>
              <label for>Estado Civil:</label>
              <select disabled style="width: auto; height: 50px;">
                <option value="<?php echo $dadosusuario['estCivil']; ?>"><?php echo $dadosusuario['estCivil']; ?></option>
              </select>
              <?php
              $sql1 = "SELECT * FROM parente WHERE idPessoa = {$dadosusuario['idPessoa']}";
              $parente = mysqli_query($mysqli, $sql1);
              if (mysqli_num_rows($parente) == 0) {
                $nomePai = '-';
                $nomeMae = '-';
              } else {
                while ($dadosParente = mysqli_fetch_assoc($parente)) {
                  $sql2 = "SELECT * FROM pessoa WHERE idPessoa = {$dadosParente['idPessoa1']}";
                  $parente1 = mysqli_query($mysqli, $sql2);
                  while ($infoParente = mysqli_fetch_assoc($parente1)) {
                    if ($dadosParente['grau'] == 'Pai') {
                      $nomePai = $infoParente['nome'];
                    } else {
                      $nomeMae = $infoParente['nome'];
                    }
                  }
                }
              } ?>
              <br>
              <label>Nome Pai:</label>
              <input type="text" name="" value="<?php echo $nomePai; ?>" disabled>
              <label>Nome Mãe:</label>
              <input type="text" name="" value="<?php echo $nomeMae; ?>" disabled>
              <?php
              $sql = "SELECT provincia.nome from provincia JOIN municipio ON(provincia.codProvincia = municipio.codProvincia) WHERE codMunicipio = {$dadosusuario['codMunicipio']}";
              $dadosProv = mysqli_query($mysqli, $sql);
              while ($provincia = mysqli_fetch_assoc($dadosProv)) { ?>
                <label>Província:</label>
                <select disabled style="height: 50px;">
                  <option value="<?php echo $provincia['nome']; ?>"><?php echo $provincia['nome']; ?></option>
                </select>
              <?php } ?>
              <label>Município:</label>
              <?php
              $sql = "SELECT * from municipio WHERE codMunicipio = {$dadosusuario['codMunicipio']}";
              $dadosMuni = mysqli_query($mysqli, $sql);
              while ($municipio = mysqli_fetch_assoc($dadosMuni)) { ?>
                <select disabled style="height: 50px;">
                  <option value="<?php echo $municipio['nome']; ?>"><?php echo $municipio['nome']; ?></option>
                </select>
              <?php } ?>
              <?php
              $sql = "SELECT * from bairro WHERE codMunicipio = {$dadosusuario['codMunicipio']}";
              $dadosBairro = mysqli_query($mysqli, $sql);
              while ($bairro = mysqli_fetch_assoc($dadosBairro)) { ?>
                <br>
                <label for="nomeBairro">Bairro:</label>
                <input type="text" name="nomeBairro" id="nomeBairro" value="<?php echo $bairro['nomeBairro']; ?>" disabled>
                <?php
                $sql = "SELECT * from rua WHERE codBairro = {$bairro['codBairro']}";
                $dadosRua = mysqli_query($mysqli, $sql);
                while ($rua = mysqli_fetch_assoc($dadosRua)) { ?>
                  <label for="nomeRua">Nome da Rua:</label>
                  <input type="text" name="nomeRua" id="nomeRua" value="<?php
                                                                        if (!empty($rua['nomeRua'])) {
                                                                          echo $rua['nomeRua'];
                                                                        } else {
                                                                          echo "-";
                                                                        }
                                                                        ?>" disabled>
                  <label for="numeroRua">Número da Rua</label>
                  <input type="text" name="numeroRua" id="numeroRua" value="<?php
                                                                            if (!empty($rua['numeroRua'])) {
                                                                              echo $rua['numeroRua'];
                                                                            } else {
                                                                              echo "-";
                                                                            }
                                                                            ?>" disabled>
              <?php }
              } ?>
              <?php
              $sql = "SELECT endereco FROM email WHERE idPessoa = {$_SESSION["idPessoa"]}";
              $email = mysqli_query($mysqli, $sql);
              while ($endereco = mysqli_fetch_assoc($email)) { ?>
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $endereco['endereco']; ?>" disabled style="width: auto;height: 50px;">
              <?php } ?>
              <?php
              $sql = "SELECT numero FROM telefone WHERE idPessoa = {$_SESSION["idPessoa"]}";
              $telefone = mysqli_query($mysqli, $sql);
              while ($numero = mysqli_fetch_assoc($telefone)) { ?>
                <br>
                <label>Telefone:</label>
                <input type="tel" name="" value=" <?php echo $numero['numero']; ?>" disabled style="width: auto">
              <?php } ?>
              <br>
              <label for="nomeUtilizador">Nome de Utilizador:</label>
              <input type="text" name="nomeUtilizador" id="nomeUtilizador" placeholder="<?php echo $dadosusuario['nomeUtilizador']; ?>" disabled>
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" value="<?php echo $dadosusuario["password"]; ?>" disabled>
              <div class="centro">
                <input type="submit" class="botao verde" value="Editar" onclick="editar()" id="botaoEditar">
                <input type="submit" class="botao vermelho hide" value="Guardar" onclick="editar()" id="botaoSalvar">
              </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <script src="../../js/script.js"></script>
  <script src="../../js/foto.js"></script>
  <script src="../../js/perfil.js"></script>
</body>

</html>