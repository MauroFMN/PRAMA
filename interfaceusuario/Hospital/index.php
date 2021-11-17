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
    </head>
    <body>
        <?php include_once 'menu.php'; ?>
        <section class="home-section">
            <div class="text">
                <div class="row userNameTitle">
                    <div class="col-lg-12">
                        <h1>Área de Trabalho</h1>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="nav nav-tabs">
                        <div class="nav-item userNavItem">
                            <p class="nav-link  active" role="tab" data-toggle="tab">Médicos</p>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade mt-3 show active" role="tabpanel" id="primeiraTab">
                            <div class="row mt-5 opcoes">
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p><?php
                                            if (condition) {
                                                echo "Não exitem médicos registados.";
                                            } else {
                                                // code...
                                            }
                                            ?></p>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-primary w-50" >Adicionar Médico</button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p><?php
                                            if (condition) {
                                                echo "Não existem médicos filiados a unidade hospitalar.";
                                            } else {
                                                // code...
                                            }
                                            ?></p>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-primary w-50">Ver Médicos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
    </body>
</html>
