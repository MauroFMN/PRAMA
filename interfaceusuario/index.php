<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Interface do Usuário </title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    </head>
    <body>
        <div class="snav french-blue">
            <div class="logo">
                <img src="../imagens/Logomarca-Pramaactualizada.png" alt="Logotipo" class="icon1">
                <span id="btnMenu">&#9776;</span>
            </div>
            <div class="lista">
                <div class="elLista">
                    <img class="bx-search" src="../icons/search-circle-outline - cópia.svg" alt="pesquisar">
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
                    <a href="javascript:void(0);">
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
        <div class="painel">
            <img src="../icons/" alt="Marcar Consulta">
            <span class="">Marcar Consulta</span>
        </div>
        <div class="painel">
            <img src="../icons/document-attach-outline - cópia.svg" alt="Marcar Consulta">
            <span class="">Histórico de Consultas</span>
        </div>
        <script src="../js/script.js"></script>
    </body>
</html>
