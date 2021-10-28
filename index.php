<?php
include 'connexao.php';
?>
<!DOCTYPE html>
<html lang="pt-PT">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Plataforma de Registo e Atendimento Médico Ambulatório </title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>
        <div class="navegador" id="myTopnav">
            <a href="#principal" id="logotipo"></a>
            <a href="#medicos" onclick="myFunction();"> Médicos </a>
            <a href="unidadeshospitalares/index.php"> Hospitais </a>
            <a href="pacientes/index.php"> Pacientes </a>
            <a href="sobre/index.php"> Sobre </a>
            <a href="#Registo" class="direita" onclick="document.getElementById('reg').style.display = 'block';myFunction()"> Registar </a> 
            <a href="#Login" class="direita" onclick="document.getElementById('login').style.display = 'block';myFunction()">Entrar</a>
            <a href="javascript:void(0);" style="font-size: 15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        <!-- Tela de Login -->
        <div id="login" class="tela-login cartao">
            <form class="form-tela-login">
                <h2 style="text-align: center">Login</h2>
                <input type="text" placeholder="Insira o nome do usuário, Email ou o Telefone" name="uname" required autofocus>
                <input type="password" placeholder="Insira a password" name="psw" required>
                <button type="submit" class="botao verde l" style="width: 100%; margin: 5px 0;"> Entrar </button>
                <button type="button" onclick="document.getElementById('login').style.display = 'none'" class="botao vermelho l" style="width: 100%; margin: 5px 0;"> Cancelar </button>
                <div class="rod-tela-login">
                    <div>
                        <a href="#">Esqueceu a Password?</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- Cabeçalho -->
        <section id="principal">
            <div class="contentor french-blue" style="padding:128px 16px">
                <div class="centro">
                    <div><img src="imagens/Logomarca-Pramaactualizada.png" style="width: 300px; height: 300px; " alt="LogoMarca"></div>
                    <h2> A plataforma de telemedicina gratuíta. Mais tecnologia no acesso a saúde. </h2>
                </div>
            </div>
        </section>
        <div>
            <p>Informações sobre a plataforma e o que se pode encontrar nela</p>
            <p>Informações para os médicos e as vantagens ao aderirem a plataforma</p>
            <p>Informações para os pacientes e as vantagens ao aderirem a plataforma</p>
            <p>Informações para os diretores das unidades hospitalares e as vantagens ao aderirem a plataforma</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <section id="medicos">
            <div>
                <h2>cabeçalho da secção dos Médicos</h2>
                <p> A plataforma de telemedicina gratuíta. Mais tecnologia no acesso a saúde. </p>
            </div>
            <div>
                <h2></h2>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        <section id="hospitais">
            <div>
                <h2>cabeçalho da secção dos hospitais</h2>
                <p> A plataforma de telemedicina gratuíta. Mais tecnologia no acesso a saúde. </p>
            </div>
            <p>conteúdo da secçãodos hospitais</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        <section id="pacientes">
            <div>
                <h2>cabeçalho da secção dos Médicos</h2>
                <p> A plataforma de telemedicina gratuíta. Mais tecnologia no acesso a saúde. </p> 
            </div>
            <div>vantagens para os médicos</div>
            <p>conteúdo da secçãodos médicos</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </section>
        <section id="sobre" class="sobre">
            <h1 class=""> <span>Sobre</span> nós </h1>
            <div class="">
                <div class="">
                    <img src="" alt="">
                </div>
                <div class="">
                    <h3>Nós cuidamos da sua saúde</h3>
                    <p>Somos uma plataforma de cuidados em saúde que valoriza os médicos, os pacientes e amplia o acesso à saúde, com atendimento humanizado.</p>
                    <p>Oferecemos tecnologia para atendimentos a pacientes por telemedicina e acompanhamento da adesão ao tratamento.</p>
                    <p>Com o PRAMA, é possível receber e analisar resultados de exames e fazer prescrições online. Tudo em um único lugar!</p>
                    <p>Os atendimentos poderão ocorrer por meio de chat ou de forma presencial dependendo do quadro clínico do paciente.</p>
                    <p>Experimente!</p>
                </div>
            </div>
        </section>
        <!-- Formulário de Registo -->
        <div>
            <div id="reg" class="registo contentor">
            <div class="centross">
                <a class="xl hover-opacity" href="?p=1">Paciente</a>
                <a class="xl hover-opacity" href="?p=2">Médico</a>
                <a class="xl hover-opacity" href="?p=3">Unidade Hospitalar</a>
            </div>
                <span class="fechar" onClick="this.parentElement.style.display = 'none'; location='?p='">&times;</span><br>
                <?php if (!empty($_GET["p"])) { ?>
                    <script> document.getElementById('reg').style.display = 'block';</script>
                    <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self" autocomplete="on">
                        <?php
                        if (!empty($_POST["fpaciente"])) {
                            print_r($_POST);
                            $permitir = conectar();
                            $sql = "INSERT INTO `Pessoa`(`idPessoa`, `codTipoSnague`, `codGenero`, `codEstadoCivil`, `codProvincia`, `codDataNasc`, `nome`, `peso`, `ss`) VALUES (NULL,$_POST[nome],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])";
                            mysqli_query($permitir, $sql);
                        } ?>
                        <div class="formRegElm">
                            <?php if ($_GET["p"] == "1") { ?> <h1>Registo de Paciente</h1> <?php } ?>
                            <?php if ($_GET["p"] == "2") { ?> <h1>Registo de Médico</h1> <?php } ?>
                            <?php if ($_GET["p"] == "3") { ?> <h1>Registo de Unidade Hospitalar</h1> <?php } ?>
                            <hr>
                            <?php if ($_GET["p"] == "3") { ?>
                                <label><b> Dados do Diretor Geral</b></label><br>
                                <hr>
                            <?php } ?>
                            <label for="nome"><b>Nome Completo</b></label>
                            <input type="text" placeholder="Insira o Nome Completo" name="nome" id="nome" required autofocus>
                            <?php if ($_GET["p"] == "3") { ?>
                                <hr>
                                <label><b>Dados da Unidade Hospitalar</b></label>
                                <hr>
                                <label for="nomeUH"><b>Nome da Unidade Hospitalar</b></label>
                                <input type="text" placeholder="Escreva o Nome da Unidade Hospitalar" name="nomeUH" id="nomeUH">
                            <?php } ?> 
                            <label for="tlf"><b>Telefone</b></label>
                            <input type="tel" placeholder="Nº de Telefone" name="tlf" id="tlf" required>
                            <?php if ($_GET["p"] == "2") { ?>
                                <br>
                                <label for="nOrdem"><b>Nº da Ordem dos Médicos</b></label>
                                <input type="text" placeholder="Insira o Número da Ordem dos Médicos" name="nOrdem" id="nOrdem" style="width: 42%;">
                                <label for="esp"><b>Especialidade</b></label>
                                <select id="esp" name="esp">
                                    <option value="">Selecione a Especialidade</option>
                                    <option value="Clínico Geral">Clínico Geral</option>
                                    <option value="Anatomia Patológica">Anatomia Patológica</option>
                                    <option value="Anestesiologia">Anestesiologia</option>
                                    <option value="Angiologia e Cirurgia Vascular">Angiologia e Cirurgia Vascular</option>
                                    <option value="Cardiologia">Cardiologia</option>
                                    <option value="Cardiologia Pediátrica">Cardiologia Pediátrica</option>
                                    <option value="Cirurgia Cardíaca">Cirurgia Cardíaca</option>
                                    <option value="Cirurgia Cardiotorácica">Cirurgia Cardiotorácica</option>
                                    <option value="Cirurgia Geral">Cirurgia Geral</option>
                                    <option value="Cirurgia Maxilofacial">Cirurgia Maxilofacial</option>
                                    <option value="Cirurgia Pediátrica">Cirurgia Pediátrica</option>
                                    <option value="Cirurgia Plástica Reconstrutiva e Estética">Cirurgia Plástica Reconstrutiva e Estética</option>
                                    <option value="Cirurgia Torácica">Cirurgia Torácica</option>
                                    <option value="Dermatovenereologia">Dermatovenereologia</option>
                                    <option value="Doenças Infecciosas">Doenças Infecciosas</option>
                                    <option value="Endocrinologia e Nutrição">Endocrinologia e Nutrição</option>
                                    <option value="Estomatologia">Estomatologia</option>
                                    <option value="Gastrenterologia">Gastrenterologia</option>
                                    <option value="Genética Médica">Genética Médica</option>
                                    <option value="Ginecologia/Obstetrícia">Ginecologia/Obstetrícia</option>
                                    <option value="Imunoalergologia">Imunoalergologia</option>
                                    <option value="Imuno-hemoterapia">Imuno-hemoterapia</option>
                                    <option value="Farmacologia Clínica">Farmacologia Clínica</option>
                                    <option value="Hematologia Clínica">Hematologia Clínica</option>
                                    <option value="Medicina Desportiva">Medicina Desportiva</option>
                                    <option value="Medicina do Trabalho">Medicina do Trabalho</option>
                                    <option value="Medicina Física e Reabilitação">Medicina Física e Reabilitação</option>
                                    <option value="Medicina Geral e Familiar">Medicina Geral e Familiar</option>
                                    <option value="Medicina Intensiva">Medicina Intensiva</option>
                                    <option value="Medicina Interna">Medicina Interna</option>
                                    <option value="Medicina Legal">Medicina Legal</option>
                                    <option value="Medicina Nuclear">Medicina Nuclear</option>
                                    <option value="Medicina Tropical">Medicina Tropical</option>
                                    <option value="Nefrologia">Nefrologia</option>
                                    <option value="Neurocirurgia">Neurocirurgia</option>
                                    <option value="Neurologia">Neurologia</option>
                                    <option value="Neurorradiologia">Neurorradiologia</option>
                                    <option value="Oftalmologia">Oftalmologia</option>
                                    <option value="Oncologia Médica">Oncologia Médica</option>
                                    <option value="Ortopedia">Ortopedia</option>
                                    <option value="Otorrinolaringologia">Otorrinolaringologia</option>
                                    <option value="Patologia Clínica">Patologia Clínica</option>
                                    <option value="Pediatria">Pediatria</option>
                                    <option value="Pneumologia">Pneumologia</option>
                                    <option value="Psiquiatria">Psiquiatria</option>
                                    <option value="Psiquiatria da Infância e da Adolescência">Psiquiatria da Infância e da Adolescência</option>
                                    <option value="Radiologia">Radiologia</option>
                                    <option value="Radioncologia">Radioncologia</option>
                                    <option value="Reumatologia">Reumatologia</option>
                                    <option value="Saúde Pública">Saúde Pública</option>
                                    <option value="Urologia">Urologia</option>
                                </select>
                            <?php } ?>
                            <?php if ($_GET["p"] == "3") { ?>
                                <label for="sector"><b>Sector no SNS</b></label>
                                <select id="sector" name="sector">
                                    <option value="publico">Sector Público</option>
                                    <option value="privado">Sector Privado</option>
                                    <option value="tradicional">Sector de Medicina Tradicional</option>
                                    <option value="deficicão" selected>Seleccione o sector da UH</option>
                                </select>
                                <label for="subsector"><b>Subsector do SNS</b></label>
                                <select name="subsector" id="subsector">
                                    <!-- Sector Público -->
                                    <option value="">Selecione o subsector da UH</option>
                                    <option value="SNS"> SNS </option>
                                    <option value="SS das FAA"> SS das FAA </option>
                                    <option value="SS do MININT"> SS do MININT </option>
                                    <option value="SS das Empresas Públicas"> SS das Empresas Públicas </option>
                                    <!-- Sector Privado -->
                                    <option value="Lucrativo"> Lucrativo </option>
                                    <option value="Não Lucrativo"> Não Lucrativo </option>
                                </select>
                                <br>
                                <label for="npac">Nº de Pacientes atendidos Diáriamente</label>
                                <input type="number" placeholder="Insira o nº" name="npac" id="npac">
                                <br>
                            <?php } ?>
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Insira o Email" name="email" id="email" style="width: 36%;">
                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Insira a Password" name="password" id="password" required style="width: 39%;">
                            <label for="password-repeat"><b>Confirme a Password</b></label>
                            <input type="password" placeholder="Insira Novamente a Password" name="password-repeat" id="password-repeat" required style="width: 38%;">
                            <hr>
                            <input type="submit" class="botao centro verde l" style="width: 100%;" value="Registar" name="fpaciente">
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>        
        <!-- Rorapé -->
        <footer class="contentor centro">  
            <div class="xl">

            </div>
        </footer>
        <script src="js/script.js"></script>
    </body>
</html>
