<?php
include '../../conexao.php';
session_start();
var_dump($_POST);
var_dump($_GET);
var_dump($_SESSION);
if (isset($_POST['nome'])) {

  $endereco = "{$_POST['nomeBairro']}, {$_POST['nomeRua']}, {$_POST['numeroRua']}";
  $sqlPessoa = "UPDATE `pessoa` SET `nomeUtilizador`= '" . $_POST['nomeUtilizador'] . "', `password`= '" . $_POST['password'] . "', foto='{$_POST['foto']}', `nome`= '" . $_POST['nome'] . "', `dataNasc`= '" . $_POST['dataNasc'] . "', `genero`= '" . $_POST['genero'] . "', `estCivil`= '" . $_POST['estadoCivil'] . "', `codMunicipio`= '" . $_POST['municipio'] . "', endereco='{$endereco}' where idPessoa={$_SESSION["idPessoa"]}";
  $sqlTelefone = "UPDATE `telefone` SET `numero`= '" . $_POST['telefone'] . "' WHERE coTelefone=" . $_POST['telefoneId'] . "";
  $sqlEmail = "UPDATE `email` set `endereco`='{$_POST['email']}' where codEmail = {$_POST['emailId']}";

  if ($_POST['idPai'] == '0' && $_POST['nomePai'] != '-') {
    $sqlPai = "INSERT INTO pessoa (idPessoa, nome, codMunicipio) values (null, '{$_POST['nomePai']}',{$_POST['municipio']})";
    if (mysqli_query($mysqli, $sqlPai)) {
      $last_id = mysqli_insert_id($mysqli);
      $sqlParente = "INSERT into parente (idParente, idPessoa, idPessoa1, grau) values (null, {$_SESSION["idPessoa"]}, {$last_id}, 'Pai')";
      if (mysqli_query($mysqli, $sqlParente)) {
      } else {
        echo 'error pai 1' . mysqli_error($mysqli);
      }
    } else {
      echo 'error pai 2' . mysqli_error($mysqli);
    }
  } else if ($_POST['idPai'] != '0' && !empty($_POST['nomePai'])) {
    $sqlPai = "UPDATE pessoa set nome='{$_POST['nomePai']}' where idPessoa={$_POST['idPai']}";
    if (mysqli_query($mysqli, $sqlPai)) {
    } else {
    }
  }

  if ($_POST['idMae'] == '0' && $_POST['nomeMae'] != '-') {
    $sqlMae = "INSERT INTO pessoa (idPessoa, nome, codMunicipio) values (null, '{$_POST['nomeMae']}', {$_POST['municipio']})";
    if (mysqli_query($mysqli, $sqlMae)) {
      $last_id = mysqli_insert_id($mysqli);
      $sqlParente = "INSERT into parente (idParente, idPessoa, idPessoa1, grau) values (null, {$_SESSION["idPessoa"]}, {$last_id}, 'Mae')";
      if (mysqli_query($mysqli, $sqlParente)) {
      } else {
        echo 'error mae 1' . mysqli_error($mysqli);
      }
    } else {
      echo 'error mae 2' . mysqli_error($mysqli);
    }
  } else if ($_POST['idMae'] != '0' && !empty($_POST['nomeMae'])) {
    $sqlMae = "UPDATE pessoa set nome='{$_POST['nomeMae']}' where idPessoa={$_POST['idMae']}";
    if (mysqli_query($mysqli, $sqlMae)) {
    } else {
    }
  }

  if (mysqli_query($mysqli, $sqlPessoa)) {
  } else {
  }

  if (mysqli_query($mysqli, $sqlTelefone)) {
  } else {
  }

  if (mysqli_query($mysqli, $sqlEmail)) {
    header("location: perfil.php");
  } else {
  }
}

?>
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
  <script src="../../js/jquery-3.6.0.min.js"></script>
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
            <form id="form" style="display: block;" class="formRegElm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" target="_self">
              <div class="espacoImagem">
                <div class="conteudoImagem">
                  <?php if (!empty($row['foto'])) {
                    $foto = $row['foto'];
                  } else {
                    $foto = 'camera-solid.svg';
                  } ?>
                  <img src="../../imagens/<?php echo $foto; ?>" alt="" id="fotografia">
                </div>
                <input type="file" name="foto" id="foto" accept="image/*" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
              </div>
              <label for="nome">Nome:</label>
              <input type="text" name="nome" id="nome" value="<?php echo $dadosusuario['nome']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: 94.42%">
              <label for="dataNasc">Data de Nascimento:</label>
              <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $dadosusuario['dataNasc']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto">
              <label for="genero">Género:</label>
              <select name="genero" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto; height: 50px;">
                <option value="<?php echo $dadosusuario['genero']; ?>"><?php echo $dadosusuario['genero']; ?></option>
              </select>
              <label for>Estado Civil:</label>
              <select name="estadoCivil" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto; height: 50px;">
                <option value="<?php echo $dadosusuario['estCivil']; ?>"><?php echo $dadosusuario['estCivil']; ?></option>
              </select>
              <?php
              $sql1 = "SELECT * FROM parente WHERE idPessoa = {$dadosusuario['idPessoa']}";
              $parente = mysqli_query($mysqli, $sql1);
              if (mysqli_num_rows($parente) == 0) {
                $nomePai = '-';
                $idPai = '0';
                $nomeMae = '-';
                $idMae = '0';
              } else {
                while ($dadosParente = mysqli_fetch_assoc($parente)) {
                  $sql2 = "SELECT * FROM pessoa WHERE idPessoa = {$dadosParente['idPessoa1']}";
                  $parente1 = mysqli_query($mysqli, $sql2);
                  while ($infoParente = mysqli_fetch_assoc($parente1)) {
                    if ($dadosParente['grau'] == 'Pai') {
                      $nomePai = $infoParente['nome'];
                      $idPai = $infoParente['idPessoa'];
                    } else {
                      $nomeMae = $infoParente['nome'];
                      $idMae = $infoParente['idPessoa'];
                    }
                  }
                }
              } ?>
              <br>
              <label>Nome Pai:</label>
              <input type="text" name="nomePai" value="<?php echo $nomePai; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
              <input type="hidden" name="idPai" value="<?php echo $idPai; ?>" />
              <label>Nome Mãe:</label>
              <input type="text" name="nomeMae" value="<?php echo $nomeMae; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
              <input type="hidden" name="idMae" value="<?php echo $idMae; ?>" />
              <?php
              $sql = "SELECT provincia.nome, provincia.codProvincia from provincia JOIN municipio ON(provincia.codProvincia = municipio.codProvincia) WHERE codMunicipio = {$dadosusuario['codMunicipio']}";
              $dadosProv = mysqli_query($mysqli, $sql);
              $codProvincia1 = '';
              while ($provincia = mysqli_fetch_assoc($dadosProv)) { ?>
                <input type="hidden" id="codProvincia1" value="<?php echo $provincia['codProvincia'] ?>" <label>Província:</label>
                <select id="provincia" name="provincia" onchange="carregarMunicipios(this.value)" value="<?php echo $provincia['codProvincia']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="height: 50px;">
                  <?php
                  $provinciaSql = "SELECT codProvincia, nome FROM provincia";
                  $provinciaResult = mysqli_query($mysqli, $provinciaSql);
                  while ($row    = mysqli_fetch_assoc($provinciaResult)) {
                  ?>
                    <option value="<?php echo $row["codProvincia"] ?>" <?php echo $row["codProvincia"] == $provincia['codProvincia'] ? 'selected' : '' ?>> <?php echo $row['nome'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              <?php } ?>
              <label>Município:</label>
              <?php
              $sql = "SELECT * from municipio WHERE codMunicipio = {$dadosusuario['codMunicipio']}";
              $dadosMuni = mysqli_query($mysqli, $sql);
              while ($municipio = mysqli_fetch_assoc($dadosMuni)) { ?>


                <select id="municipio" name="municipio" onchange="" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="height: 50px;">
                  <option>Seleccione o município</option>
                  <?php
                  $municipioSql = "SELECT codMunicipio, codProvincia, nome FROM municipio";
                  $municipioResult = mysqli_query($mysqli, $municipioSql);
                  while ($row    = mysqli_fetch_assoc($municipioResult)) {
                  ?>
                    <option value="<?php echo $row["codMunicipio"] ?>" id="<?php echo $row["codProvincia"] ?>" <?php echo $row["codMunicipio"] == $municipio['codMunicipio'] ? 'selected' : '' ?>> <?php echo $row['nome'] ?> </option>
                  <?php
                  }
                  // mysqli_close($mysqli);
                  ?>
                </select>
              <?php } ?>
              <?php
              $sql = "SELECT * from bairro WHERE codMunicipio = {$dadosusuario['codMunicipio']}";
              $dadosBairro = mysqli_query($mysqli, $sql);
              while ($bairro = mysqli_fetch_assoc($dadosBairro)) { ?>
                <br>
                <label for="nomeBairro">Bairro:</label>
                <input type="text" name="nomeBairro" id="nomeBairro" value="<?php echo $bairro['nomeBairro']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
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
                                                                        ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                  <label for="numeroRua">Número da Rua</label>
                  <input type="text" name="numeroRua" id="numeroRua" value="<?php
                                                                            if (!empty($rua['numeroRua'])) {
                                                                              echo $rua['numeroRua'];
                                                                            } else {
                                                                              echo "-";
                                                                            }
                                                                            ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
              <?php }
              } ?>
              <?php
              $sql = "SELECT endereco, codEmail FROM email WHERE idPessoa = {$_SESSION["idPessoa"]}";
              $email = mysqli_query($mysqli, $sql);
              while ($endereco = mysqli_fetch_assoc($email)) { ?>
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $endereco['endereco']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto;height: 50px;">
                <input type="hidden" name="emailId" value="<?php echo $endereco['codEmail'] ?>" <?php } ?> <?php
                                                                                                            $sql = "SELECT numero,coTelefone FROM telefone WHERE idPessoa = {$_SESSION["idPessoa"]}";
                                                                                                            $telefone = mysqli_query($mysqli, $sql);
                                                                                                            while ($numero = mysqli_fetch_assoc($telefone)) { ?> <br>
                <label>Telefone:</label>
                <input type="tel" name="telefone" value=" <?php echo $numero['numero']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?> style="width: auto">
                <input type="hidden" name="telefoneId" value="<?php echo $numero['coTelefone'] ?>" <?php } ?> <br>
                <label for="nomeUtilizador">Nome de Utilizador:</label>
                <input type="text" name="nomeUtilizador" id="nomeUtilizador" value="<?php echo $dadosusuario['nomeUtilizador']; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="<?php echo $dadosusuario["password"]; ?>" <?php echo isset($_GET['editar']) ? "" : "disabled"; ?>>
                <div class="centro">
                  <?php
                  if (isset($_GET['editar'])) {
                  ?>
                    <button type="submit" class="botao verde" value="Editar" id="botaoEditar">Guardar</button>
                    <a href="?" class="botao vermelho">Cancelar</a>
                  <?php
                  } else {
                  ?>
                    <a href="?editar" class="botao verde" value="Editar" id="botaoEditar">Editar</a>
                  <?php
                  }
                  ?>
                </div>
            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <script>
    function carregarMunicipios(codProvincia) {
      console.log($("#municipio")[0].options)
      for (let i = 0; i < $("#municipio")[0].options.length; i++) {
        $("#municipio")[0].options[i].classList = "";

      }
      for (let i = 0; i < $("#municipio")[0].options.length; i++) {
        if ($("#municipio")[0].options[i].id !== codProvincia) {
          $("#municipio")[0].options[i].classList = "d-none";
        }
      }
    }

    carregarMunicipios(document.getElementById('codProvincia1').value)
  </script>
  <script src="../../js/script.js"></script>
  <script src="../../js/foto.js"></script>
</body>

</html>