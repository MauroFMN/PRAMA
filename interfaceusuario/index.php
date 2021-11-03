<!DOCTYPE html>
<html lang="pt-PT">
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
                        <i class="fas fa-file-medical-alt" ></i>
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
        <section class="home-section" id="main">
            <div class="text">
                <h2>Área Pessoal</h2>
                <div>
                    <a href="">Consulta</a>
                    <a href="">Prescrições</a>
                    <a href="">Histórico</a>
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
        <script src="../js/script.js"></script>
    </body>
</html>
