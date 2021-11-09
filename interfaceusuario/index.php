<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Interface do Usuário </title>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/interfaceusuario.css">
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
                <span class="nome">Histórico</span>
            </div>
            <div class="elLista perfil">
                <div class="detalhesPerfil">
                    <img src="../icons/person-sharp - cópia.svg" alt="Imagem do Perfil" id="fotoPerfil">
                    <div>
                        <div class="nomePerfil">Mauro Neto</div>
                        <div class="profissao">Dj</div>
                    </div>
                </div>
                <img src="../icons/exit-outline - cópia.svg" alt="Sair" id="sair">
            </div>
        </div>
    </div>
    </div>
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