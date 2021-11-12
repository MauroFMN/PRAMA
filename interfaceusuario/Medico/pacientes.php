<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Paciente </title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="perfil">
            <div class="text">
              <div class="row userNameTitle">
                  <div class="col-lg-12">
                      <h1>Os meus médicos</h1>
                  </div>
                  <div class="row mt-5">
                    <?php if (condition) {
                      echo "Nenhum paciente marcou consulta.";
                    } else {
                      // code...
                    }
                     ?>
                  </div>
              </div>
              <div class="row mt-5">
              <div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
    </body>
</html>
