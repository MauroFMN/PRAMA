<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da Unidade Hospitalar</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
    <link rel="stylesheet" type="text/css" href="../../css/foto.css">
</head>

<body>
    <?php include_once "menu.php"; ?>
    <section class="home-section" style="background-color: white;" id="perfil">
        <div class="text">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Perfil</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="formulario">
                    <?php $sql = "SELECT * FROM pessoa WHERE idPessoa = {$_SESSION["idPessoa"]}";
                    $dados = mysqli_query($mysqli, $sql);
                    while ($row = mysqli_fetch_assoc($dados)) { ?>
                        <form id="form" style="display: block;" class="formRegElm">
                          <div class="espacoImagem">
                            <div class="conteudoImagem">
                              <?php if (!empty($row['foto'])) {
                                $foto = $row['foto'];
                              } else {
                                $foto = 'camera-solid.svg';
                              }?>
                              <img src="../../imagens/<?php echo $foto; ?>" alt="" id="fotografia">
                            </div>
                            <input type="file" name="foto" id="foto" accept="image/*">
                          </div>
                            <label for="nome">Nome da Un.Hospitalar:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" disabled>
                            <label for="numeroDocumento">Número de Indetificação Fiscal:</label>
                            <input type="text" name="numeroDocumento" id="numeroDocumento" value="<?php echo $row['numeroDocumento']; ?>" disabled>
                            <?php
                             $sql1 = "SELECT provincia.nome from provincia JOIN municipio ON(provincia.codProvincia = municipio.codProvincia) WHERE codMunicipio = {$row['codMunicipio']}";
                             $dadosProv = mysqli_query($mysqli,$sql1);
                             while ($provincia = mysqli_fetch_assoc($dadosProv)) {?>
                            <label>Província:</label>
                            <select disabled style="height: 50px;">
                                <option value="<?php echo $provincia['nome']; ?>"><?php echo $provincia['nome']; ?></option>
                            </select>
                            <?php } ?>
                            <label>Município:</label>
                            <?php
                             $sql2 = "SELECT * from municipio WHERE codMunicipio = {$row['codMunicipio']}";
                             $dadosMuni = mysqli_query($mysqli,$sql2);
                             while ($municipio = mysqli_fetch_assoc($dadosMuni)) {?>
                            <select disabled style="height: 50px;">
                                <option value="<?php echo $municipio['nome']; ?>"><?php echo $municipio['nome']; ?></option>
                            </select>
                          <?php } ?>
                              <label for="nomeBairro">Endereço:</label>
                              <input type="text" name="endereco" id="endereco" value="<?php echo $row['endereco']; ?>" disabled>
                              <?php
                              $sql4 = "SELECT endereco FROM email WHERE idPessoa = {$_SESSION["idPessoa"]}";
                              $email = mysqli_query($mysqli,$sql4);
                              while ($endereco = mysqli_fetch_assoc($email)) {?>
                              <label for="email">Email:</label>
                              <input type="email" name="email" id="email" value="<?php echo $endereco['endereco']; ?>" disabled style="width: 50%;height: 50px;">
                            <?php } ?>
                            <?php
                            $sql3 = "SELECT numero FROM `telefone` WHERE idPessoa={$_SESSION["idPessoa"]}";
                            $dados3 = mysqli_query($mysqli,$sql3);
                            while ($row3 = mysqli_fetch_assoc($dados3)) { ?>
                              <label for="numero">Telefone:</label>
                              <input type="tel" name="numero" id="numero"value="<?php echo $row3['numero']; ?>" disabled style="width: 20%">
                            <?php } ?>
                          <hr>
                          <label for="">Dados de Gestão da Clínica</label>
                          <hr>
                            <label for="nomeUtilizador">Nome de Utilizador:</label>
                            <input type="text" name="nomeUtilizador" id="nomeUtilizador" value="<?php echo $row['nomeUtilizador']; ?>" disabled>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" disabled>
                            <hr>
                            <div class="centro">
                                <input type="submit" class="botao verde" value="Editar">
                            </div>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../js/script.js"></script>
    <script src="../../js/foto.js"></script>
</body>

</html>
