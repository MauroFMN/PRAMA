<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Interface do Médico</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/interfaceusuario.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
        <script src="../../js/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <?php include_once 'menu.php'; ?>
        <section class="home-section" id="main">
            <div class="text">
                <div class="row userNameTitle">
                    <div class="col-lg-12">
                        <h1>Área de Trabalho</h1>
                    </div>
                </div>
                <div class="row mt-5 w-100">
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
                                <div class="col-lg-12">
                                    <div class="row mt-3">
                                        <p></p>
                                    </div>
                                    <div class="row mt-3">
                                        <!--button type="button" class="btn btn-primary w-50">Marcar Consulta.</button-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" role="tabpanel" id="segundaTab">
                            <div class="row mt-5 opcoes">
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" role="tabpanel" id="terceiraTab">
                            <div class="row mt-5 opcoes">
                                <div class="col-lg-6">
                                    <div class="row mt-3">
                                        <p>
                                           </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-section hide" id="pacientes">
            <div class="text">
                <h2>Os Meus Pacientes</h2>
            </div>
        </section>
        <section class="home-section hide" id="perfil">
            <div class="text">
                <h2>Perfil</h2>
            </div>
        </section>
        <section class="home-section hide" id="definições">
            <div class="text">
                <h2>Definições</h2>
            </div>
        </section>
        <script src="../../js/script.js"></script>
        <script>
            // console.log("Medico")
            $(".nav.nav-tabs li").on("click", function (e) {
                console.log("Element",e)
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
