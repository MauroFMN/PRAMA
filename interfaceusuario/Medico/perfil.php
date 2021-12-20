<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Médico</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/chat.css">
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
                            <?php if (!empty($row['foto'])) { ?>
                            <div class="conteudoImagem">
                              <img src="../../imagens/<?php echo $dadosusuario['foto']; ?>" alt="" id="fotografia">
                            <?php } else{ ?>
                              <img src="../../imagens/camera-solid.svg" alt="Selecione uma Imagem" id="fotografia">
                            </div>
                            <?php } ?>
                            <input type="file" name="flimagem" id="flimagem" accept="image/*">
                          </div>
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" disabled>
                            <label for="dataNasc">Data de Nascimento:</label>
                            <input type="date" name="dataNasc" id="dataNasc" value="<?php echo $row['dataNasc']; ?>" disabled>
                            <label>Género:</label>
                            <select disabled>
                                <option value="<?php echo $row['genero']; ?>"><?php echo $row['genero']; ?></option>
                            </select>
                            <?php $sql1 = "SELECT * FROM medico WHERE idPessoa = {$row['idPessoa']}";
                            $dados1 = mysqli_query($mysqli, $sql1);
                            while ($row1 = mysqli_fetch_assoc($dados1)) { ?>
                            <label for="numOrdem">Númeno da Ordem:</label>
                            <input type="text" name="numOrdem" id="numOrdem" value="<?php echo $row1['numOrdem']; ?>" disabled>
                          <?php
                          $sql2 = "SELECT * from especialidade esp JOIN especialidademedico espm on(esp.codEspecialidade = espm.codEspecialidade) WHERE numOrdem = '{$row1['numOrdem']}'";
                          $dados2 = mysqli_query($mysqli,$sql2);
                          while ($row2 = mysqli_fetch_assoc($dados2)) { ?>
                            <label for="nome">Especialidade:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $row2['nome']; ?>" disabled>
                            <?php $sql3 = "SELECT * FROM unhospitalar uh JOIN trabalhar tr on(uh.codHospital = tr.codHospital) WHERE numOrdem = '{$row1['numOrdem']}'";
                            $dados3 = mysqli_query($mysqli,$sql3);
                            while ($row3 = mysqli_fetch_assoc($dados3)) { ?>
                            <label for="nomeUnHosp">Local de Trabalho</label>
                            <input type="text" name="nomeUnHosp" id="nomeUnHosp" value="<?php echo $row3['nomeUnHosp']; ?>" disabled>
                          <?php }}}?>
                          <?php $sql4 = "SELECT * FROM email WHERE idPessoa = {$row['idPessoa']}";
                          $dados4 = mysqli_query($mysqli,$sql4);
                          while ($row4 = mysqli_fetch_assoc($dados4)) { ?>
                            <label for="endereco">Email:</label>
                            <input type="email" name="endereco" id="endereco" value="<?php echo $row4['endereco']; ?>" disabled>
                          <?php };
                          $sql5 = "SELECT * FROM telefone WHERE idPessoa = {$row['idPessoa']}";
                          $dados5 = mysqli_query($mysqli,$sql5);
                          while ($row5 = mysqli_fetch_assoc($dados5)) { ?>
                            <label for="numero">Telefone:</label>
                            <input type="tel" name="numero" id="numero" value="<?php echo $row5['numero']; ?>" disabled>
                          <?php } ?>
                            <label for="nomeUtilizador">Nome de Utilizador:</label>
                            <input type="text" name="nomeUtilizador" id="nomeUtilizador" value="<?php echo $row['nomeUtilizador']; ?>" disabled>
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" disabled>
                            <hr>
                            <h4 class="centro">Horário de Atendimento</h4>
                            <hr>
                            <div class="dias">
                                <table>
                                    <tr>
                                        <th></th>
                                        <th>Dias da Semana</th>
                                        <th>Inico</th>
                                        <th>Fim</th>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>2ª Feira</td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>3ª Feira</td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>4ª Feira</td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>5ª Feira</td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>6ª Feira</td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>Sábado</td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                                <option value="08:00">14:00</option>
                                                <option value="08:00">15:00</option>
                                                <option value="08:00">16:00</option>
                                                <option value="08:00">17:00</option>
                                                <option value="08:00">18:00</option>
                                                <option value="08:00">19:00</option>
                                                <option value="08:00">20:00</option>
                                            </select>
                                        </td>
                                        <td><select style="width: auto;">
                                                <option value=""></option>
                                                <option value="08:00">09:00</option>
                                                <option value="08:00">10:00</option>
                                                <option value="08:00">11:00</option>
                                                <option value="08:00">12:00</option>
                                                <option value="08:00">13:00</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <hr>
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
    <script src="../../js/foto.js"></script>
</body>

</html>
