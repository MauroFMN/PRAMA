<!DOCTYPE html>
<html lang="pt-PT">
<<<<<<< HEAD <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Interface do Usuário </title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.6.0.min.js"></script>

    </head>

    <body>
        <div class="snav french-blue">
            <div class="logo">
                <img src="../imagens/Logomarca-Pramaactualizada.png" alt="Logotipo" class="icon1">
                <span id="btnMenu">&#9776;</span>
            </div>
            <div class="lista">
                <div class="elLista">
                    <img class="bx-search" src="../icons/search-circle-outline.svg" alt="pesquisar">
                    <input type="text" placeholder="pesquisar...">
                    <span class="nome">Pesquisar</span>
                </div>
                <div class="elLista">
                    <a href="#">
                        <img src="../icons/grid-outline.svg">
                        <span class="nomeLink">Painel</span>
                    </a>
                    <span class="nome">Painel</span>
                </div>
                <div class="elLista">
                    <a href="perfil.php">
                        <img src="../icons/person-sharp - cópia.svg" alt="Perfil">
                        <span class="nomeLink">Perfil</span>
                    </a>
                    <span class="nome">Perfil</span>
                </div>
                <div class="elLista">
                    <a href="javascript:void(0);">
                        <img src="../icons/medical-outline - cópia.svg" alt="Consulta">
                        <span class="nomeLink">Consulta</span>
                    </a>
                    <span class="nome">Consulta</span>
                </div>
                <div class="elLista">
                    <a href="javascript:void(0);">
                        <img src="../icons/file-tray-full-outline - cópia.svg" alt="Histórico">
                        <span class="nomeLink">Histórico</span>
                    </a>
                    <span class="nome">Histórico</span> =======

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Interface do Usuário</title>
                        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
                        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
                        <link rel="stylesheet" type="text/css" href="../css/all.css">
                    </head>

                    <body>
                        <div class="sidebar french-blue">
                            <div class="logo-details">
                                <img src="../imagens/Logomarca-Pramaactualizada.png" alt="Logotipo" class="icon1">
                                <i class="fas fa-bars" id="btn"></i> >>>>>>> 8b3a026ca0db536b41147c15b7ddc9fabb95a01a
                            </div>
                            <ul class="nav-list">
                                <li>
                                    <i class="fas fa-search bx-search"></i>
                                    <input type="text" placeholder="Pesquisar...">
                                    <span class="tooltip">Pesquisar</span>
                                </li>
                                <li>
                                    <a href="#main">
                                        <i class="fas fa-th-large"></i>
                                        <span class="links_name">Área Pessoal</span>
                                    </a>
                                    <span class="tooltip">Área Pessoal</span>
                                </li>
                                <li>
                                    <a href="#medicos">
                                        <i class="fas fa-user-md"></i>
                                        <span class="links_name">Os Meus Médicos</span>
                                    </a>
                                    <span class="tooltip">Os Meus Médicos</span>
                                </li>
                                <li>
                                    <a href="#perfil">
                                        <i class="far fa-user"></i>
                                        <span class="links_name">Perfil</span>
                                    </a>
                                    <span class="tooltip">Perfil</span>
                                </li>
                                <li>
                                    <a href="#prescricoes">
                                        <i class="fas fa-notes-medical"></i>
                                        <span class="links_name">Prescrisções</span>
                                    </a>
                                    <span class="tooltip">Prescrisções</span>
                                </li>
                                <li>
                                    <a href="#historico">
                                        <i class="fas fa-archive"></i>
                                        <span class="links_name">Histórico</span>
                                    </a>
                                    <span class="tooltip">Histórico</span>
                                </li>
                                <li class="profile">
                                    <div class="profile-details">
                                        <img src="" alt="">
                                        <div class="name_job">
                                            <div class="name"><b>Mauro Neto</b></div>
                                            <div class="job">Dj</div>
                                        </div>
                                    </div>
                                    <a href="../index.php">
                                        <i class="fas fa-sign-out-alt" id="log_out"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <section class="home-section" id="main">
                            <div class="text">
                                <h2>Área Pessoal</h2>
                                <div>
                                    <a href="">Consulta</a>
                                    <a href="">Prescrições</a>
                                    <a href="">Histórico</a>
                                </div>
                            </div>
                </div>
            </div>
        </div>

        </section>
        <section class="home-section" id="medicos">
            <div class="text">
                <h2>Os Meus Médicos</h2>
            </div>
        </section>
        <section class="home-section" id="perfil">
            <div class="text">
                <h2>Perfil</h2>
            </div>
        </section>
        <section class="home-section" id="prescricoes">
            <div class="text">
                <h2>Prescrições</h2>
            </div>
        </section>
        <section class="home-section" id="historico">
            <div class="text">
                <h2>Histórico</h2>
            </div>
        </section>


        <div class="conteudoInterfaceUsuario">

            <div class="row userNameTitle">
                <div class="col-lg-12">
                    <h1>Bem vindo Mauro Neto</h1>
                </div>
            </div>

            <div class="row mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item userNavItem">
                        <a href="#primeiraTab" class="nav-link  active" role="tab" data-toggle="tab"> Consultas </a>
                    </li>
                    <li class="nav-item userNavItem">
                        <a href="#segundaTab" class="nav-link " role="tab" data-toggle="tab"> Recibos </a>
                    </li>
                    <li class="nav-item userNavItem">
                        <a href="#terceiraTab" class="nav-link " role="tab" data-toggle="tab"> Prescrições </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade mt-3 show active" role="tabpanel" id="primeiraTab">
                        <div class="row mt-5 opcoes">
                            <div class="col-lg-6">
                                <div class="row">
                                    <img src="../imagens/fazerAgendamento.png" alt="Img" />
                                </div>
                                <div class="row">
                                    <h3 class="mt-3">Fazer Agendamento</h3>
                                </div>
                                <div class="row mt-3">
                                    <p>Faça agora um agendamento de consulta e garanta o seu bem estar e saúde.</p>
                                </div>
                                <div class="row mt-3">
                                    <button type="button" class="btn btn-primary">Agendar Consulta.</button>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="row">
                                    <img src="../imagens/meusagendamentos.png" alt="Img" />
                                </div>
                                <div class="row">
                                    <h3 class="mt-3">Meus Agendamentos</h3>
                                </div>
                                <div class="row mt-3">
                                    <p>Tenha acesso aos seus agendamentos e não perca uma consulta.</p>
                                </div>
                                <div class="row mt-3">
                                    <button type="button" class="btn btn-primary">Ver Agendamentos.</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-3" role="tabpanel" id="segundaTab"> Sem Recibos Emitidos </div>
                    <div class="tab-pane fade mt-3" role="tabpanel" id="terceiraTab"> Sem Prescrições emitidas </div>
                </div>

            </div>


            <script src="../js/script.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script>
                $(".nav.nav-tabs li").on("click", function() {
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