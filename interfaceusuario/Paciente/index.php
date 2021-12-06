<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paciente</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
        <script src="../../js/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="main">
            <div class="text">
                <div class="row userNameTitle">
                    <div class="col-lg-12">
                        <h1>Área Pessoal</h1>
                    </div>
                </div>
                <div class="row mt-5">
                    <ul class="nav nav-tabs">
                        <li class="nav-item userNavItem">
                            <a href="#primeiraTab" class="nav-link  active" role="tab" data-toggle="tab">Consultas</a>
                        </li>
                        <li class="nav-item userNavItem">
                            <a href="#segundaTab" class="nav-link " role="tab" data-toggle="tab">Prescrições</a>
                        </li>
                        <li class="nav-item userNavItem">
                            <a href="#terceiraTab" class="nav-link " role="tab" data-toggle="tab">Histórico</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade mt-3 show active" role="tabpanel" id="primeiraTab">
                            <div class="row mt-5 opcoes">
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p><?php
                                            // if (condition) {
                                            //     echo "Ainda não tem consulta marcada.";
                                            // } else {
                                            //     // code...
                                            // }
                                            ?></p>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-primary w-50"><a href="consulta.php" style="text-decoration: none; color: white;">Marcar Consulta.</a></button>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p>Tenha acesso aos seus agendamentos e não perca uma consulta.</p>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-primary w-50">Ver Agendamentos.</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" role="tabpanel" id="segundaTab">
                            <div class="row mt-5 opcoes">
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p><?php
                                            // if (condition) {
                                            //     echo "Não tem prescrições médicas.";
                                            // } else {
                                            //     // code...
                                            // }
                                            ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" role="tabpanel" id="terceiraTab">
                            <div class="row mt-5 opcoes">
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p><?php
                                            // if (condition) {
                                            //     echo "Histórico de consultas vazio.";
                                            // } else {
                                            //     // code...
                                            // }
                                            ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/chat.js"></script>
        <script>
            $(".nav.nav-tabs li").on("click", function () {
                $(".nav-link.active").removeClass("active");
                $(this).children("a").addClass("active");

                const id = $(this).children("a").attr("href");
                $(".tab-pane.fade").removeClass("show");
                $(".tab-pane.fade").removeClass("active");

                const element = document.getElementById(id.substr(1))
                element.classList = element.classList + " show active"
            })
        </script>
    </body>
</html>
