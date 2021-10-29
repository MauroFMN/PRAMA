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
                        }
                        ?>
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
                            <?php if ($_GET["p"] == "1") { ?>
                                <label for="dnasc"><b>Data de Nascimento</b></label>
                                <input type="date" name="dnasc" id="dnasc" max="<?php echo date('Y-m-d'); ?>" onchange="if ((<?php echo date('Y'); ?> - this.value.split('-')[0]) < 18) {
                                            document.getElementById('fil').style.display = 'block'
                                        } else {
                                            document.getElementById('fil').style.display = 'none'
                                        }
                                        ;">
                                <div id="fil" style="display: none;">
                                    <label ><b>Filiação</b></label>
                                    <input type="text" placeholder="Insira o Nome do Pai" name="nomePai" id="nomePai">
                                    <label for="nome"><b>e de</b></label>
                                    <input type="text" placeholder="Insira o Nome da mãe" name="nomeMae" id="nomeMae">
                                </div><br>
                            <?php } ?>
                            <label><b>Documento de Identificação</b></label>
                            <select id="tipoDocIndent" name="tipoDocIndent">
                                <option value="B.I.">Bilhete de Identidade</option>
                                <option value="Cédula Passoal">Cédula Passoal</option>
                                <option value="Passaporte">Passaporte</option>
                            </select>
                            <label for="numDocIndent"><b>Nº do documento de identificação</b></label>
                            <input type="text" placeholder="Insira o número do documento de indentificação" name="numDocIndent" id="numDocIndent" style="width: 35%">
                            <?php if ($_GET["p"] == "3") { ?>
                                <hr>
                                <label><b>Dados da Unidade Hospitalar</b></label>
                                <hr>
                                <label for="nomeUH"><b>Nome da Unidade Hospitalar</b></label>
                                <input type="text" placeholder="Escreva o Nome da Unidade Hospitalar" name="nomeUH" id="nomeUH">
                            <?php } ?> 
                            <hr>
                            <label><b> Endereço </b></label>
                            <hr>
                            <label for="nomeProv"><b>Província</b></label>
                            <select id="nomeProv" name="nomeProv">
                                <option value=""> Selecione a Província </option>
                                <option value="Bengo"> Bengo </option>
                                <option value="Benguela"> Benguela </option>
                                <option value="Bié"> Bié </option>
                                <option value="Cabinda"> Cabinda </option>
                                <option value="Cuando-Cubango"> Cuando-Cubango </option>
                                <option value="Cuanza Norte"> Cuanza Norte </option>
                                <option value="Cuanza Sul"> Cuanza Sul</option>
                                <option value="Cunene"> Cunene </option>
                                <option value="Huambo"> Huambo </option>
                                <option value="Huíla"> Huíla </option>
                                <option value="Luanda"> Luanda </option>
                                <option value="Lunda Norte"> Lunda Norte </option>
                                <option value="Lunda Sul"> Lunda Sul </option>
                                <option value="Malanje"> Malanje </option>
                                <option value="Moxico"> Moxico </option>
                                <option value="Namibe"> Namibe </option>
                                <option value="Uíge"> Uíge </option>
                                <option value="Zaire"> Zaire </option>
                            </select>
                            <label for="nomeMuni"><b>Município</b></label>
                            <select id="nomeMuni" name="nomeMuni">
                                <option value=""> Selecione o Monicípio </option>
                                <!--Municípios do Bengo BGO-->
                                <option value="Dande"> Dande </option>
                                <option value="Dembos"> Dembos </option>
                                <option value="Nambuangongo"> Nambuangongo </option>
                                <option value="Bula Atumba"> Bula Atumba </option>
                                <option value="Ambriz"> Ambriz </option>
                                <option value="Pango Aluquém"> Pango Aluquém </option>
                                <!--Municípios do Benguela BGU-->
                                <option value="Benguela"> Benguela </option><!-- Selected -->
                                <option value="Ganda"> Ganda </option>
                                <option value="Lobito"> Lobito </option>
                                <option value="Catumbela"> Catumbela </option>
                                <option value="Bocoio"> Bocoio </option>
                                <option value="Balombo"> Balombo </option>
                                <option value="Cubal"> Cubal </option>
                                <option value="Baía Farta"> Baía Farta </option>
                                <option value="Caimbambo"> Caimbambo </option>
                                <option value="Chongorói"> Chongorói </option>
                                <!--Municípios do Bié BIE-->
                                <option value="Andulo"> Andulo </option>
                                <option value="Chitembo"> Chitembo </option>
                                <option value="Cuito"> Cuito </option><!-- Selected -->
                                <option value="Camacupa"> Camacupa </option>
                                <option value="Chinguar"> Chinguar </option>
                                <option value="Catabola"> Catabola </option>
                                <option value="Cunhinga"> Cunhinga </option>
                                <option value="Cuemba"> Cuemba </option>
                                <option value="Nharêa"> Nharêa </option>
                                <!--Municípios do Cabinda CAB-->
                                <option value="Cabinda"> Cabinda </option> <!-- selected -->
                                <option value="Cacongo"> Cacongo </option>
                                <option value="Buco Zau"> Buco Zau </option>
                                <option value="Belize"> Belize </option>
                                <!--Municípios do Cuando-Cubamgo CCU-->
                                <option value="Menongue"> Menongue </option><!-- Selected -->
                                <option value="Mavinga"> Mavinga </option>
                                <option value="Dirico"> Dirico </option>
                                <option value="Cuito Cuanavale"> Cuito Cuanavale </option>
                                <option value="Cuchi"> Cuchi </option>
                                <option value="Rivungo"> Rivungo </option>
                                <option value="Calai"> Calai </option>
                                <option value="Cuangar"> Cuangar </option>
                                <option value="Nancova"> Nancova </option>
                                <!--Municípios do Cuanza Norte CNO-->
                                <option value="Cazengo"> Cazengo </option><!-- Selected -->
                                <option value="Golungo Alto"> Golungo Alto </option>
                                <option value="Cambambe"> Cambambe </option>
                                <option value="Samba Cajú"> Samba Cajú </option>
                                <option value="Ambaca"> Ambaca </option>
                                <option value="Lucala"> Lucala </option>
                                <option value="Banga"> Banga </option>
                                <option value="Bolongongo"> Bolongongo </option>
                                <option value="Quiculungo"> Quiculungo </option>
                                <option value="Ngonguembo"> Ngonguembo </option>
                                <!--Municípios do Cuanza Sul CUS-->
                                <option value="Sumbe"> Sumbe </option><!-- Selected -->
                                <option value="Libolo"> Libolo </option>
                                <option value="Amboim"> Amboim </option>
                                <option value="Cassongue"> Cassongue </option>
                                <option value="Porto Amboim"> Porto Amboim </option>
                                <option value="Quibala"> Quibala </option>
                                <option value="Seles"> Seles </option>
                                <option value="Cela"> Cela </option>
                                <option value="Mussende"> Mussende </option>
                                <option value="Quilenda"> Quilenda </option>
                                <option value="Ebo"> Ebo </option>
                                <option value="Conda"> Conda </option>
                                <!--Municípios do Cunene CNN-->
                                <option value="61"> Ombadja </option> 
                                <option value="Ombadja"> Cuanhama </option><!-- selected -->
                                <option value="Curoca"> Curoca </option>
                                <option value="Cahama"> Cahama </option>
                                <option value="Cuvelai"> Cuvelai </option>
                                <option value="Namacunde"> Namacunde </option>
                                <!--Municípios do Huambo HUA-->
                                <option value="Bailundo"> Bailundo </option>
                                <option value="Huambo"> Huambo </option><!-- Selected -->
                                <option value="Londuimbali"> Londuimbali </option>
                                <option value="Caála"> Caála </option>
                                <option value="Chicala Choloanga"> Chicala Choloanga </option>
                                <option value="Cachiungo"> Cachiungo </option>
                                <option value="Mungo"> Mungo </option>
                                <option value="Longonjo"> Longonjo </option>
                                <option value="Ucuma"> Ucuma </option>
                                <option value="Ecunha"> Ecunha </option>
                                <option value="Chinjenje"> Chinjenje </option>
                                <!--Municípios do Huíla HUI-->
                                <option value="Caconda"> Caconda </option>
                                <option value="Gambos"> Gambos </option>
                                <option value="Humpata"> Humpata </option>
                                <option value="Lubango"> Lubango </option><!-- Selected -->
                                <option value="Cuvango"> Cuvango </option>
                                <option value="Quipungo"> Quipungo </option>
                                <option value="Chibia"> Chibia </option>
                                <option value="Quilengues"> Quilengues </option>
                                <option value="Caluquembe"> Caluquembe </option>
                                <option value="Matala"> Matala </option>
                                <option value="Jamba"> Jamba </option>
                                <option value="Chipindo"> Chipindo </option>
                                <option value="Chicomba"> Chicomba </option>
                                <option value="Cacula"> Cacula </option>
                                <!--Municípios do Luanda LUA-->
                                <option value="Luanda"> Luanda </option><!-- Selected -->
                                <option value="Icolo e Bengo"> Icolo e Bengo </option>
                                <option value="Quiçama"> Quiçama </option>
                                <option value="Cacuaco"> Cacuaco </option>
                                <option value="Cazenga"> Cazenga </option>
                                <option value="Viana"> Viana </option>
                                <option value="Belas"> Belas </option>
                                <option value="Kilamba Kiaxi"> Kilamba Kiaxi </option>
                                <option value="Talatona"> Talatona </option>
                                <!--Municípios do Lunda Norte LNO-->
                                <option value="Cuilo"> Cuilo </option> 
                                <option value="Caungula"> Caungula </option>
                                <option value="Chitato"> Chitato </option><!-- selected -->
                                <option value="Lubalo"> Lubalo </option>
                                <option value="Capenda Camulemba"> Capenda Camulemba </option>
                                <option value="Cuango"> Cuango </option>
                                <option value="Lucapa"> Lucapa </option>
                                <option value="Cambulo"> Cambulo </option>
                                <option value="Xá Muteba"> Xá Muteba </option>
                                <option value="110"> 110 </option>
                                <!--Municípios do Lunda Sul LSU-->
                                <option value="Saurimo"> Saurimo </option><!-- Selected -->
                                <option value="Muconda"> Muconda </option>
                                <option value="Cacolo"> Cacolo </option>
                                <option value="Dala"> Dala </option>
                                <!--Municípios do Malanje MAL-->
                                <option value="Calandula"> Calandula </option>
                                <option value="Malanje"> Malanje </option><!-- Selected -->
                                <option value="Cacuso"> Cacuso </option>
                                <option value="Massango"> Massango </option>
                                <option value="Marimba"> Marimba </option>
                                <option value="Quela"> Quela </option>
                                <option value="Quirima"> Quirima </option>
                                <option value="Cangandala"> Cangandala </option>
                                <option value="Cahombo"> Cahombo </option>
                                <option value="Kunda dya Baze"> Kunda dya Baze </option>
                                <option value="Cambundi Catembo"> Cambundi Catembo </option>
                                <option value="Mucari"> Mucari </option>
                                <option value="Kiwaba Nzoji"> Kiwaba Nzoji </option>
                                <option value="Luquembo"> Luquembo </option>
                                <!--Municípios do Moxico MOX-->
                                <option value="Moxico"> Moxico </option><!-- Selected -->
                                <option value="Luchazes"> Luchazes </option>
                                <option value="Alto Zambeze"> Alto Zambeze </option>
                                <option value="Bundas"> Bundas </option>
                                <option value="Luacano"> Luacano </option>
                                <option value="Cameia"> Cameia </option>
                                <option value="Camanongue"> Camanongue </option>
                                <option value="Luau"> Luau </option>
                                <option value="Léua"> Léua </option>
                                <!--Municípios do Namibe NAM-->
                                <option value="Moçâmedes"> Moçâmedes </option> <!-- selected -->
                                <option value="Tômbwa"> Tômbwa </option>
                                <option value="Bibala"> Bibala </option>
                                <option value="Virei"> Virei </option>
                                <option value="Camucuio"> Camucuio </option>
                                <!--Municípios do Uíge UIG-->
                                <option value="Dange-Quitexe"> Dange-Quitexe </option>
                                <option value="Bungo"> Bungo </option>
                                <option value="Ambuíla"> Ambuíla </option>
                                <option value="Negage"> Negage </option>
                                <option value="Puri"> Puri </option>
                                <option value="Maquela do Zombo"> Maquela do Zombo </option>
                                <option value="Damba"> Damba </option>
                                <option value="Pombo"> Pombo </option>
                                <option value="Bembe"> Bembe </option>
                                <option value="Milunga"> Milunga </option>
                                <option value="Songo"> Songo </option>
                                <option value="Quimbele"> Quimbele </option>
                                <option value="Alto Cauale"> Alto Cauale </option>
                                <option value="Uíge"> Uíge </option><!-- Selected -->
                                <option value="Mucaba"> Mucaba </option>
                                <option value="Buengas"> Buengas </option>
                                <!--Municípios do Zaire ZAI-->
                                <option value="Soyo"> Soyo </option>
                                <option value="Mbanza Kongo"> Mbanza Kongo </option><!-- Selected -->
                                <option value="Nzeto"> Nzeto </option>
                                <option value="Tomboco"> Tomboco </option>
                                <option value="Cuimba"> Cuimba </option>
                                <option value="Nóqui"> Nóqui </option>
                            </select>
                            <label for="bairro"><b>Bairro</b></label>
                            <input type="text" placeholder="Insira o nome do Bairro" name="bairro" id="bairro" style="width: 45%;">
                            <br>
                            <label for="nomeRua"><b>Rua</b></label>
                            <input type="text" placeholder="Insira o nome da Rua" name="nomeRua" id="nomeRua" style="width: 46.3%;">
                            <label><b>e/ou</b></label>
                            <input type="text" placeholder="Insira o número da Rua" name="numRua" id="numRua" style="width: 46.2%;">
                            <?php if ($_GET["p"] == "1") { ?>
                                <label for="nat"><b>Naturalidade</b></label>
                                <input type="text" placeholder="Insira o país de origem" name="nat" id="nat" style="width: 20%;">
                            <?php } ?>
                            <label for="tlf"><b>Telefone</b></label>
                            <input type="tel" placeholder="Nº de Telefone" name="tlf" id="tlf" required>
                            <?php if ($_GET["p"] == "1" || $_GET["p"] == "2") { ?>
                                <label for="gen"><b>Gênero</b></label>
                                <select id="gen" name="gen">
                                    <option value="femenino">Femenino</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="" selected="">Prefiro não Informar</option>
                                </select>
                            <?php } ?>
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
                                <label for="sesp"><b>Subespecialidade</b></label>
                                <select id="sesp" name="sesp">
                                    <option value="">Selecione a Subespecialidade</option>
                                    <option value="Cuidados Intensivos Pediátricos">Cuidados Intensivos Pediátricos</option>
                                    <option value="Cardiologia de Intervenção">Cardiologia de Intervenção</option>
                                    <option value="Eletrofisiologia Cardíaca">Eletrofisiologia Cardíaca</option>
                                    <option value="Hepatologia">Hepatologia</option>
                                    <option value="EEG/Neurofisiologia">EEG/Neurofisiologia</option>
                                    <option value="Neonatologia">Neonatologia</option>
                                    <option value="Neuropediatria">Neuropediatria</option>
                                    <option value="Oncologia Pediátrica">Oncologia Pediátrica</option>
                                    <option value="Ginecologia Oncológica">Ginecologia Oncológica</option>
                                    <option value="Dermatopatologia">Dermatopatologia</option>
                                    <option value="Medicina Materno-Fetal">Medicina Materno-Fetal</option>
                                    <option value="Medicina da Reprodução">Medicina da Reprodução</option>
                                    <option value="Ortodoncia">Ortodoncia</option>
                                    <option value="Psiquiatria Forense">Psiquiatria Forense</option>
                                    <option value="Neuropatologia">Neuropatologia</option>
                                    <option value="Ortopedia Infantil">Ortopedia Infantil</option>
                                </select><br>
                            <?php } ?>
                            <?php if ($_GET["p"] == "1") { ?>
                                <label for="estcivil"><b>Estado Civil</b></label>
                                <select id="estcivil" name="estcivil">
                                    <option value="solteiro">Solteiro</option>
                                    <option value="casado">Casado</option>
                                    <option value="divorciado">Divorciado</option>
                                    <option value="viuvo">Viúvo</option>
                                    <option value="" selected="">Prefiro não Informar</option>
                                    <option value="solteiro">Solteira</option>
                                    <option value="casado">Casada</option>
                                    <option value="divorciado">Divorciada</option>
                                    <option value="viuvo">Viúva</option>
                                </select>
                                <br>
                            <?php } ?>
                            <?php if ($_GET["p"] == "1") { ?>
                                <label for="prof"><b>Profissão</b></label>
                                <input type="text" placeholder="Insira a Profissão" name="prof" id="prof" style="width: 50%;">
                                <br>
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

                            <label for="utilizador"><b>Nome de utilizador</b></label>
                            <input type="text" placeholder="Insira o Nome de Utilizador" name="utilizador" id="utilizador" required style="width: 45%;">

                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Insira a Password" name="password" id="password" required style="width: 39%;">

                            <label for="password-repeat"><b>Confirme a Password</b></label>
                            <input type="password" placeholder="Insira Novamente a Password" name="password-repeat" id="password-repeat" required style="width: 38%;">
                            <hr>
                            <input type="submit" class="botao centro verde l" style="width: 100%;" value="Registar" name="fpaciente">
                        </div>
                    </form>
                    <?php
                }
                ?>
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
