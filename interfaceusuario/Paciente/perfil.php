<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil do Paciente</title>
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/all.css">
        <link rel="stylesheet" type="text/css" href="../../css/chat.css">
    </head>
    <body>
        <?php include_once "menu.php"; ?>
        <section class="home-section" id="perfil">
            <div class="text">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Perfil</h1>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="formulario">
                        <form class="formRegElm">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome">
                            <label>Data de Nascimento:</label>
                            <input type="date" name=""><br>
                            <label>Género:</label>
                            <select>
                                <option value="">Prefiro não informar</option>
                            </select>
                            <label>Estado Civil:</label>
                            <select>
                                <option value="">Prefiro não informar</option>
                            </select>
                            <label>Nome do Pai:</label>
                            <input type="text" name="">
                            <label>Nome da Mãe:</label>
                            <input type="text" name="">
                            <label>Província:</label>
                            <select>
                                <option value="">Selecione a Província</option>
                            </select>
                            <label>Município:</label>
                            <select>
                                <option value="">Selecione o Município</option>
                            </select>
                            <label>Bairro:</label>
                            <input type="text" name="">
                            <label>Nome da Rua:</label>
                            <input type="text" name="">
                            <label>Número da Rua</label>
                            <input type="text" name="">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="exemplo@exemplo.com">
                            <label>Telefone:</label>
                            <input type="tel" name="" value="9xxxxxxxx">
                            <label>Nome de Utilizador:</label>
                            <input type="text" name="">
                            <label>Password:</label>
                            <input type="password" name="">
                            <div class="centro">
                                <input type="submit" class="botao verde" value="Editar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../js/script.js"></script>
        <script src="../../js/chat.js"></script>
    </body>

</html>
