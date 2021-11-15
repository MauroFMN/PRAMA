<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="consulta">
            <div class="text">
              <div class="row userNameTitle">
                  <div class="col-lg-12">
                      <h1><?php if (condition) {
                        echo "Nenhuma consulta realizada";
                      } else {
                        // code...
                      } ?></h1>
                  </div>
                  <div class="row mt-5">
                      <div class="consulta" style="display: flex;">
                        <div class="formulario">
                            <header>
                              <?php  ?>
                              <img src="" alt="">
                              <div class="details">
                                <span>Mauro Neto</span>
                              </div>
                            </header>
                          <form class="formRegElm">
                            <label for="">Género:</label>
                            <input type="text" name="" value="">
                            <label for="">Idade:</label>
                            <input type="text" name="" value="">
                            <label for="">Peso:</label>
                            <input type="text" name="" value="">
                            <label for="">Tipo Sanguíneo:</label>
                            <input type="text" name="" value="">
                            <label for="">Antecedentes Patológicos Familiares</label>
                            <input type="text" name="" value="">
                            <label for="">Antecedentes Patológicos Pessoais</label>
                            <input type="text" name="" value="">
                          </form>
                        </div>
                        <div class="formulario">
                        <form class="formRegElm">
                          <label for="">Motivo da Consulta</label>
                          <input type="text-area" name="" value="">
                          <label for="">Diagnóstico Provável</label>
                          <input type="text-area" name="" value="">
                          <label for="">Histórico da Doença Atual</label>
                          <input type="text-area" name="" value="">
                        </form>
                      </div>
                      <section class="wrapper" style="display: block;">
                        <div class="chat-area">
                          <header>
                            <?php  ?>
                            <img src="" alt="">
                            <div class="details">
                              <span><?php  ?></span>
                              <p><?php  ?></p>
                            </div>
                          </header>
                          <div class="chat-box">

                          </div>
                          <form action="#" class="typing-area">
                            <input type="text" class="incoming_id" name="incoming_id" value="<?php  ?>" hidden>
                            <input type="text" name="menssagem" placeholder="Escreva aqui a sua mensagem..." autocomplete="off">
                            <button type="button" name="button"><i class="fab fa-telegram-plane"></i></button>
                          </form>
                        </div>
                      </section>
                  </div>
              </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
    </body>
</html>
