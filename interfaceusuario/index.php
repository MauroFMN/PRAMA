<!DOCTYPE html>
<html lang="pt-PT">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Interface do Usuário </title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../css/interfaceusuario.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/all.css">
        <script src="../js/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="sidebar french-blue">
            <div class="logo-details">
                <img src="../imagens/Logomarca-Pramaactualizada.png" alt="Logotipo" class="icon1">
                <i class="fas fa-bars" id="btn" ></i>
            </div>
            <ul class="nav-list">
                <li>
                    <i class="fas fa-search bx-search" ></i>
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
                        <i class="fas fa-user-md" ></i>
                        <span class="links_name">Os Meus Médicos</span>
                    </a>
                    <span class="tooltip">Os Meus Médicos</span>
                </li>
                <li>
                    <a href="#perfil">
                        <i class="far fa-user" ></i>
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
                        <i class="fas fa-archive" ></i>
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
                        <i class="fas fa-sign-out-alt" id="log_out" ></i>
                    </a>
                </li>
            </ul>
        </div>
        <section class="conteudoInterfaceUsuario" id="main">
            <div class="row userNameTitle">
                <div class="col-lg-12">
                    <h1>Área Pessoal</h1>
                </div>
            </div>
            <div class="row mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item userNavItem">
                        <a href="#primeiraTab" class="nav-link  active" role="tab" data-toggle="tab"> Consultas </a>
                    </li>
                    <li class="nav-item userNavItem">
                        <a href="#segundaTab" class="nav-link " role="tab" data-toggle="tab"> Prescrições </a>
                    </li>
                    <li class="nav-item userNavItem">
                        <a href="#terceiraTab" class="nav-link " role="tab" data-toggle="tab"> Histórico </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade mt-3 show active" role="tabpanel" id="primeiraTab">
                        <div class="row mt-5 opcoes">
                            <div class="col-lg-12">
                                <!--div class="row">
                                    <img src="../imagens/fazerAgendamento.png" alt="Img" />
                                </div>
                                <div class="row">
                                    <h3 class="mt-3">Marcar Consulta</h3>
                                </div-->
                                <div class="row mt-3">
                                    <p>Ainda não tem consulta marcada.</p>
                                </div>
                                <div class="row mt-3">
                                    <button type="button" class="btn btn-primary">Marcar Consulta.</button>
                                </div>
                            </div>
                            <!--div class="col-lg-6">

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

                            </div-->
                        </div>
                    </div>
                    <div class="tab-pane fade mt-3" role="tabpanel" id="segundaTab"> Sem Prescrições emitidas </div>
                    <div class="tab-pane fade mt-3" role="tabpanel" id="terceiraTab">Histórico Vazio.  </div>
                </div>
            </div>
        </section>
        <section class="home-section" id="medicos">
            <div class="text">
                <h2>Os Meus Médicos</h2>
            </div>
        </section>
        <section class="conteudoInterfaceUsuario perfilUsuario" id="perfil">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Perfil</h1>
                </div>
            </div>
            <div class="row">
                <form>
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                    <label>Data de Nascimento:</label>
                    <input type="date" name="">
                    <label>Género:</label>
                    <input type="text" name="">
                    <label>Estado Civil:</label>
                    <input type="text" name="">
                    <label>Nome do Pai:</label>
                    <input type="text" name="">
                    <label>Nome da Mãe:</label>
                    <input type="text" name="">
                    <label>Província:</label>
                    <input type="text" name="">
                    <label>Município:</label>
                    <input type="text" name="">
                    <label>Bairro:</label>
                    <input type="text" name="">
                    <label>Nome da Rua:</label>
                    <input type="text" name="">
                    <label>Número da Rua</label>
                    <input type="text" name="">
                    <label>Email:</label>
                    <input type="email" name="">
                    <label>Telefone:</label>
                    <input type="tel" name="">
                    <label>Nome de Utilizador:</label>
                    <input type="text" name="">
                    <label>Password:</label>
                    <input type="password" name="">
                </form>
            </div>
        </section>
        <section class="home-section hide" id="prescricoes">
            <div class="text">
                <h2>Prescrições</h2>
            </div>
        </section>
        <section class="home-section hide" id="historico">
            <div class="text">
                <h2>Histórico</h2>
            </div>
        </section>
        <script src="../js/script.js"></script>
        <script src="../js/bootstrap.min.js"></script>
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