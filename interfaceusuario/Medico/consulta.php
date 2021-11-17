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
        <link rel="stylesheet" type="text/css" href="../../css/consulta.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="consulta">
            <div class="text">
              <div class="header">
                <div class="col-lg-12">
                    <h1><?php if (condition) {
                      echo "Nenhuma consulta realizada";
                    } else {
                      // code...
                    } ?></h1>
                </div>
              </div>

              <div class="topnav">
                <img src="" alt="" class="elm">
                <div class="elm">
                  <span>Mauro Neto</span>
                </div>
                <div class="elm">
                  <span>género</span>
                </div>
                <div class="elm">
                  <span>Idade</span>
                </div>
                <button type="button" name="button" class="verde direita elm">Terminar Consulta</button>
              </div>

              <div class="row">
                <div class="column">
                  <form class="">
                    <label for="">Peso</label>
                    <input type="text" name="" value="">
                    <label for="">Tipo Sanguíneo</label>
                    <input type="text" name="" value="">
                    <label for="">Antecedentes Patológicos Familiares</label>
                    <textarea name="name" rows="4" cols="30"></textarea>
                    <label for="">Antecedentes Patológicos Pessoais</label>
                    <textarea name="name" rows="4" cols="30"></textarea>
                    <label for="">Exame Físico</label>
                    <textarea name="name" rows="4" cols="30"></textarea>
                  </form>
                </div>

                <div class="column">
                  <form>
                    <label for="">Motivo da Consulta</label>
                    <textarea name="name" rows="4" cols="30"></textarea>
                    <label for="">Diagnóstico Provável</label>
                    <textarea name="name" rows="4" cols="30"></textarea>
                    <label for="">Histórico da Doença Atual</label>
                    <textarea name="name" rows="5" cols="30"></textarea>
                    <label for="">Prescrição Médica</label>
                    <input type="radio" name="" value="">
                    <label for="">Requisição Médica</label>
                    <input type="radio" name="" value="">
                    <textarea name="name" rows="5" cols="30"></textarea
                  </form>
                </div>

                <!--div class="column">
                  <form>

                  </form>
                </div-->
              </div>
            </div>
        </section>
        <section class="wrapper" id="chat">
          <div class="chat-area">
            <header>
              <?php  ?>
              <span class="fechar back-icon" onClick="this.parentElement.style.display = 'none'; location = '?p='"><i class="far fa-times-circle"></i></span>
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
        <script src="../../js/script.js"></script>
    </body>
</html>
