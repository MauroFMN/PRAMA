<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Interface do Dir.Geral</title>
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
                        <span class="links_name">Área de Trabalho</span>
                    </a>
                    <span class="tooltip">Área de Trabalho</span>
                </li>
                <li>
                    <a href="#medicos">
                        <i class="fas fa-user-md" ></i>
                        <span class="links_name">Médicos</span>
                    </a>
                    <span class="tooltip">Médicos</span>
                </li>
                <li>
                    <a href="#definições">
                        <i class="fas fa-cog"></i>
                        <span class="links_name">Definições</span>
                    </a>
                    <span class="tooltip">definições</span>
                </li>
                <li class="profile">
                    <div class="profile-details">
                        <img src="" alt="">
                        <div class="name_job">
                            <div class="name"><b>Dir.Mauro Neto</b></div>
                            <div class="job">Diretor Geral</div>
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
                <h2>Área de Trabalho</h2>
                <div>
                    <a href="">Médico</a>
                </div>
            </div>
        </section>
        <section class="home-section" id="medicos">
            <div class="text">
                <h2>Médicos</h2>
            </div>
        </section>
        <section class="home-section" id="definições">
            <div class="text">
                <h2>Definições</h2>
            </div>
        </section>
        <script src="../js/script.js"></script>
    </body>
</html>
