<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dir.Geral</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/marcacao.css">
        <link rel="stylesheet" type="text/css" href="../../css/foto.css">
    </head>
    <body>
        <?php include_once 'menu.php'; ?>
        <section class="home-section" id="inscever">
            <div class="text">
                <div class="row userNameTitle">
                    <div class="col-lg-12">
                        <h1>Inscrever Médico</h1>
                    </div>
                    <div class="row mt-5">
                      <div class="formulario">
                        <form class="formRegElm">
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
                          <label for="nome">Nome Completo:</label>
                          <input type="text" name="nome" id="nome" placeholder="Escreva o Nome Completo">
                          <label>Data Nascimento:</label>
                          <input type="date" name="" style="width: auto;">
                          <label>Género:</label>
                          <select style="width: auto;">
                              <option value="">Prefiro não informar</option>
                              <option value="Femenino">Femenino</option>
                              <option value="Masculino">Masculino</option>
                          </select><br>
                          <label>Númeno da Ordem:</label>
                          <input type="text" name=""><br>
                          <label for="">Especialidade</label>
                          <select class="" name="">
                            <option value="Clínico Geral">Clínico Geral</option>
                          </select>
                          <!--label for="">Local de Trabalho:</label>
                          <input type="text" name="" value="" --><br>
                          <label for="email">Email:</label>
                          <input type="email" name="email" id="email" placeholder="exemplo@exemplo.com" style="width: auto; height: 50%"><br>
                          <label>Telefone:</label>
                          <input type="tel" name="" placeholder="9xxxxxxxx" style="width: auto;"><br>
                          <label>Nome de Utilizador:</label>
                          <input type="text" name="" placeholder="Nome do utilizador">
                          <label>Password:</label>
                          <input type="password" name="" placeholder="********">
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
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><input type="checkbox"></td>
                                      <td>3ª Feira</td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="08:00">08:00</option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><input type="checkbox"></td>
                                      <td>4ª Feira</td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="08:00">08:00</option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><input type="checkbox"></td>
                                      <td>5ª Feira</td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="08:00">08:00</option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><input type="checkbox"></td>
                                      <td>6ª Feira</td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="08:00">08:00</option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td><input type="checkbox"></td>
                                      <td>Sábado</td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="08:00">08:00</option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                              <option value="14:00">14:00</option>
                                              <option value="15:00">15:00</option>
                                              <option value="16:00">16:00</option>
                                              <option value="17:00">17:00</option>
                                              <option value="18:00">18:00</option>
                                              <option value="19:00">19:00</option>
                                              <option value="20:00">20:00</option>
                                          </select>
                                      </td>
                                      <td><select style="width: auto;">
                                              <option value=""></option>
                                              <option value="09:00">09:00</option>
                                              <option value="10:00">10:00</option>
                                              <option value="11:00">11:00</option>
                                              <option value="12:00">12:00</option>
                                              <option value="13:00">13:00</option>
                                          </select>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                          <hr>
                          <div class="centro">
                              <input type="submit" class="botao verde" value="Adicionar">
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
        <script src="../../js/foto.js"></script>
    </body>
</html>
