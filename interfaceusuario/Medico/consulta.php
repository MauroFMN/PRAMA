<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/consulta.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="consulta">
            <div class="text">
                <div class="header">
                    <div class="col-lg-12">
                        <h1>Ver forma de usar o perfil do paciente para as consultas, e editar a partir de lá</h1>
                    </div>
                </div>

                <div class="topnav">
                    <div class="elm">
                        <span>Mauro Neto</span>
                    </div>
                    <div class="elm">
                        <span>Masculino</span>
                    </div>
                    <div class="elm">
                        <span>35 anos</span>
                    </div>
                    <div class="elm">
                        <span>kg</span>
                    </div>
                    <div class="elm">
                        <span>AB+</span>
                    </div>
                    <button type="button" name="button" class="verde direita elm">Terminar</button>
                </div>

                <div class="row">
                    <div class="column">
                        <form class="">
                            <label for="">Exame Físico</label>
                            <textarea name="name" rows="4" cols="30"></textarea>
                            <label for="">Motivo da Consulta</label>
                            <textarea name="name" rows="4" cols="30"></textarea>
                            <label for="">Diagnóstico Provável</label>
                            <textarea name="name" rows="4" cols="30"></textarea>
                        </form>
                    </div>

                    <div class="column">
                        <form>
                            <label for="">Histórico da Doença Atual</label>
                            <textarea name="name" rows="4" cols="30"></textarea>
                            <label for="">Prescrição Médica</label>
                            <input type="radio" checked="checked" name="">
                            <label for="">Requisição Médica</label>
                            <input type="radio" name="">
                            <textarea name="name" rows="5" cols="30"></textarea
                        </form>
                    </div>
                </div>
                <?php include_once "../chat.php" ?>
            </div>
        </section>
        <script src="../../js/script.js"></script>
    </body>
</html>
