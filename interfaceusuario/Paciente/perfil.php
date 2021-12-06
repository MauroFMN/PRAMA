<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil do Paciente</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
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
                      $dados = mysqli_query($mysqli,$sql);
                      while ($dadosusuario = mysqli_fetch_assoc($dados)) { ?>
                        <form class="formRegElm">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $dadosusuario['nome']; ?>" disabled>
                            <label for="dataNasc">Data de Nascimento:</label>
                            <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $dadosusuario['dataNasc']; ?>" disabled><br>
                            <label for="genero">Género:</label>
                            <select disabled>
                                <option value="<?php echo $dadosusuario['genero']; ?>"><?php echo $dadosusuario['genero']; ?></option>
                            </select>
                            <label for>Estado Civil:</label>
                            <select disabled>
                                <option value="<?php echo $dadosusuario['estCivil']; ?>"><?php echo $dadosusuario['estCivil']; ?></option>
                            </select>
                            <label>Nome do Pai:</label>
                            <input type="text" name="" disabled>
                            <label>Nome da Mãe:</label>
                            <input type="text" name="" disabled>
                            <?php
                             $sql = "SELECT provincia.nome from provincia JOIN municipio ON(provincia.codProvincia = municipio.codProvincia) WHERE codMunicipio = $dadosusuario['codMunicipio']";
                             $dadosProv = mysqli_query($mysqli,$sql);
                             while ($provincia = mysqli_fetch_assoc($dadosProv)) {?>
                            <label>Província:</label>
                            <select disabled>
                                <option value="<?php echo $provincia['nome']; ?>"><?php echo $provincia['nome']; ?></option>
                            </select>
                          <?php } ?>
                            <label>Município:</label>
                            <select disabled>
                                <option value="">Selecione o Município</option>
                            </select>
                            <label>Bairro:</label>
                            <input type="text" name="" disabled>
                            <label>Nome da Rua:</label>
                            <input type="text" name="" disabled>
                            <label>Número da Rua</label>
                            <input type="text" name="" disabled>
                            <?php
                            $sql = "SELECT endereco FROM email WHERE idPessoa = {$_SESSION["idPessoa"]}";
                            $email = mysqli_query($mysqli,$sql);
                            while ($endereco = mysqli_fetch_assoc($email)) {?>
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="<?php echo $endereco['endereco']; ?>" disabled>
                          <?php } ?>
                            <?php
                            $sql = "SELECT numero FROM telefone WHERE idPessoa = {$_SESSION["idPessoa"]}";
                            $telefone = mysqli_query($mysqli,$sql);
                            while ($numero = mysqli_fetch_assoc($telefone)) {?>
                            <label>Telefone:</label>
                            <input type="tel" name="" value="<?php echo $numero['numero']; ?>" disabled>
                          <?php } ?>
                            <label for="nomeUtilizador">Nome de Utilizador:</label>
                            <input type="text" name="nomeUtilizador" id="nomeUtilizador" placeholder="<?php echo $dadosusuario['nomeUtilizador']; ?>"disabled>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" placeholder="********" disabled>
                            <div class="centro">
                                <input type="submit" class="botao verde" value="Editar">
                            </div>
                        </form>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
        <script src="../../js/chat.js"></script>
    </body>

</html>
