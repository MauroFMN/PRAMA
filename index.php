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
            <a href="#hospitais"> Hospitais </a>
            <a href="#pacientes"> Pacientes </a>
            <a href="#sobre"> Sobre </a>
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
        <div class="contentor info">
            <h1 class="titulo">Atendimento rápido e eficiente</h1>
            <div class="linha linhaEsq">
                <div class="imagem">
                    <img src="imagens/Unknown-8.png"style="width:500px; height: 300px;">
                </div>
                <div class="conteudo">
                    <p>Com o PRAMA, os médicos conseguem acessar os dados e os resultados dos exames médicos de forma rápida e em qualquer local com um dispositivo conectado a internet, sem precisar realizar um atendimento prévio para entender o histórico do paciente</p>
                    <p>O atendimento mais próximo e humanizado possível. O Médico consegue ter uma visão única e completa sobre cada paciente através do seu historico de consultas.</p>
                    <p>Com o PRAMA é possivel gerir as consultas e essas informações são atualizadas em tempo real, permitindo o paciente confirme, remarque ou cancele sua consulta on-line – atualizando a agenda automaticamente.</p>
                </div>
            </div>
        </div>
        <section id="medicos" style="background-color: whitesmoke;">
            <h1 class="titulo">Como funciona para os médicos?</h1>
            <div class="linha linhaDir">
                <div class="conteudo">
                    <p>Com o PRAMA, os médicos conseguem acessar os dados e os resultados dos exames médicos de forma rápida e em qualquer local com um dispositivo conectado a internet, sem precisar realizar um atendimento prévio para entender o histórico do paciente</p>
                    <p>O atendimento mais próximo e humanizado possível. O Médico consegue ter uma visão única e completa sobre cada paciente através do seu historico de consultas.</p>
                    <p>Com o PRAMA é possivel gerir as consultas e essas informações são atualizadas em tempo real, permitindo o paciente confirme, remarque ou cancele sua consulta on-line – atualizando a agenda automaticamente.</p>
                </div>
                <div style="margin-right: 5px;">
                    <img src="imagens/Unknown.png"style="width:500px; height: 300px;">
                </div>
            </div>
        </section>
        <section class="centro">
            <h1 class="titulo">Vantagens do PRAMA</h1>
            <div class="icons-container">
                <div class="icons">
                    <p>Telemedicina para médicos, pacientes e unidades hospitalares</p>
                </div>
                <div class="icons">
                    <p>Consultas por chat em qualquer lucgar com internet</p>
                </div>
                <div class="icons">
                    <p>Acesso por computador, tablet e smarthphone</p>
                </div>
                <div class="icons">
                    <p>Histórico de consultas completo dos pacientes</p>
                </div>
            </div>
        </section>
        <section id="hospitais" style="background-color: whitesmoke;">
            <h1 class="titulo">Para as Unidades Hospitalares</h1>
            <div class="linha linhaEsq">
                <div style="margin-left: 15px;">
                    <img src="imagens/Unknown-7.png"style="width:500px; height: 300px;">
                </div>
                <div class="conteudo">
                    <p>Os diretores gerais podem registar as instituições que dirigem, os médicos e indicar os serviços de especialidades praticados.</p>
                    <p>Permite contar com uma avaliação especializada à distância, cujo investimento é realizado conforme a necessidade</p>
                </div>
            </div>
        </section>
        <section id="pacientes">
            <h1 class="titulo">Vantagens para os Pacientes</h1>
            <div class="linha linhaDir">
                <div class="conteudo">
                    <p>Qualquer clínica pode oferecer atendimento multidisciplinar. Afinal, o diagnóstico é feito à distância e por um especialista da área, que garante um diagnóstico mais preciso.</p>
                    <p>Mesmo com a agenda preenchida, os pacientes conseguem falar com seus médicos ou ser atendidos onde estiverem e sem perder tempo com deslocamentos.</p>
                    <p>Além disso, eles têm acesso à todos os especialistas inscritos na plataforma e ao histório das consultas que fica armazenado na base de dados do PRAMA, podendo ser consultado a qualquer momento.</p>
                </div>
                <div style="margin-right: 5px;">
                    <img src="imagens/Unknown-10.png"style="width:500px; height: 300px;">
                </div>
            </div>
        </section>
        <section id="sobre" class="sobre" style="background-color: whitesmoke;">
            <h1 class="titulo">Sobre Nós</h1>
            <div class="linha linhaEsq">
                <div style="margin-left: 15px;">
                    <img src="imagens/Unknown-7.png"style="width:500px; height: 300px;">
                </div>
                <div class="conteudo">
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
                            <label for="nome"><b>Nome Completo</b>
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
                                <input type="text" placeholder="Insira o Número da Ordem dos Médicos" name="nOrdem" id="nOrdem">
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
                                <br>
                                <label for="sector"><b>Sector no SNS</b></label>
                                <select id="sector" name="sector">
                                    <option value="publico">Sector Público</option>
                                    <option value="privado">Sector Privado</option>
                                    <option value="tradicional">Sector de Medicina Tradicional</option>
                                    <option value="deficicão" selected>Seleccione o sector da UH</option>
                                </select>
                                <br>
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
                            <?php } ?>
                            <br>
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Insira o Email" name="email" id="email">
                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Insira a Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="A Password deve conter um número, uma letra minúscula e uma maiúscula no mínimo e tem que ter no mínimo 6 caracteres" required>
                            <label for="password-repeat"><b>Confirme a Password</b></label>
                            <input type="password" placeholder="Insira Novamente a Password" name="password-repeat" id="password-repeat" required>
                            <hr>
                            <input type="submit" class="botao verde l" style="width: 100%;" value="Registar" name="fpaciente">
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
