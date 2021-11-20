<?php
include 'conexao.php';


$username = $password = "";
$nomeUsuario_erro = $senha_erro = $login_erro = "";

// $especialidadesSelecionadas

// if($especialidadestmt = mysqli_prepare($mysqli, $especialidadessql)){

//     if(mysqli_stmt_execute($especialidadestmt)){
//         mysqli_stmt_store_result($especialidadestmt);
//     }
// }

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET["p"] == 1) {
    $sql = "INSERT INTO `pessoa`(`idPessoa`, `nomeUtilizador`, `password`, `nome`, `peso`, `dataNasc`, `genero`, `estCivil`, `tipoSang`, `tipoUser`, `endereco`, `codMunicipio`, `documentoIdentificacao`, `numeroDocumento`) VALUES (null,'" . trim($_POST["nameu"]) . "','" . md5($_POST["password"]) . "','" . trim($_POST["nome"]) . "','" . trim($_POST["peso"]) . "','" . trim($_POST["dataNasc"]) . "','" . trim($_POST["genero"]) . "','" . trim($_POST["estadoCivil"]) . "','" . trim($_POST["tipoSang"]) . "','Paciente','" . trim($_POST["endereco"]) . "','" . trim($_POST["municipio"]) . "', '" . trim($_POST["docId"]) . "', '" . trim($_POST["numeroDoc"]) . "')";

    if (mysqli_query($mysqli, $sql)) {
        $last_id = mysqli_insert_id($mysqli);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        $sql = "INSERT INTO `telefone`(`coTelefone`, `codHospital`, `idPessoa`, `numero`) VALUES (null, null,'" . $last_id . "','" . trim($_POST["tlf"]) . "')";
        if (mysqli_query($mysqli, $sql)) {
            $sql = "INSERT INTO `email`(`codEmail`, `idPessoa`, `codHospital`, `endereco`) VALUES (null,'" . $last_id . "',null, '" . trim($_POST["email"]) . "')";
            if (mysqli_query($mysqli, $sql)) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION["logado"] = true;
                $_SESSION["id"] = $last_id;
                $_SESSION["nomeusuario"] = trim($_POST["nameu"]);
                $_SESSION["tipoUser"] = 'Paciente';
                header("location: interfaceusuario/Paciente/index.php");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET["p"] == 2) {
    $sql = "INSERT INTO `pessoa`(`idPessoa`, `nomeUtilizador`, `password`, `nome`, `peso`, `dataNasc`, `genero`, `estCivil`, `tipoSang`, `tipoUser`, `endereco`, `codMunicipio`, `documentoIdentificacao`, `numeroDocumento`) VALUES (null,'" . trim($_POST["nameu"]) . "','" . md5($_POST["password"]) . "','" . trim($_POST["nome"]) . "','" . trim($_POST["peso"]) . "','" . trim($_POST["dataNasc"]) . "','" . trim($_POST["genero"]) . "','" . trim($_POST["estadoCivil"]) . "','" . trim($_POST["tipoSang"]) . "','Paciente','" . trim($_POST["endereco"]) . "','" . trim($_POST["municipio"]) . "', '" . trim($_POST["docId"]) . "', '" . trim($_POST["numeroDoc"]) . "')";

    if (mysqli_query($mysqli, $sql)) {
        $last_id = mysqli_insert_id($mysqli);
        echo "New record created successfully. Last inserted ID is: " . $last_id;
        $sql = "INSERT INTO `telefone`(`coTelefone`, `codHospital`, `idPessoa`, `numero`) VALUES (null, null,'" . $last_id . "','" . trim($_POST["tlf"]) . "')";
        if (mysqli_query($mysqli, $sql)) {
            $sql = "INSERT INTO `email`(`codEmail`, `idPessoa`, `codHospital`, `endereco`) VALUES (null,'" . $last_id . "',null, '" . trim($_POST["email"]) . "')";
            if (mysqli_query($mysqli, $sql)) {

                $sql = "INSERT INTO `medico`(`numOrdem`, `idPessoa`, `descricao`) VALUES ('" . trim($_POST["nOrdem"]) . "','" . $last_id . "','" . trim($_POST["descricaoMedico"]) . "')";

                if (mysqli_query($mysqli, $sql)) {
                    $sql = '';

                    foreach ($_POST['esp'] as $esp) {
                        $id = "" . trim($_POST['nOrdem']) . "";
                        $sql .= "('" . $id . "','$esp'),";
                    }

                    $sql = "INSERT INTO `especialidademedico`(`numOrdem`, `codEspecialidade`) VALUES" . trim($sql, ",");

                    if (mysqli_query($mysqli, $sql)) {

                        $sql = "";

                        $horarioSegunda = "";
                        foreach ($_POST['segundaF'] as $segundaF) {
                            $horarioSegunda .= "" . $segundaF . ", ";
                        }

                        $horarioTerca = "";
                        foreach ($_POST['tercaF'] as $tercaF) {
                            $horarioTerca .= "" . $tercaF . ", ";
                        }

                        $horarioQuarta = "";
                        foreach ($_POST['quartaF'] as $quartaF) {
                            $horarioQuarta .= "" . $quartaF . ", ";
                        }

                        $horarioQuinta = "";
                        foreach ($_POST['quintaF'] as $quintaF) {
                            $horarioQuinta .= "" . $quintaF . ", ";
                        }

                        $horarioSexta = "";
                        foreach ($_POST['sextaF'] as $sextaF) {
                            $horarioSexta .= "" . $sextaF . ", ";
                        }

                        $horarioSabado = "";
                        foreach ($_POST['sabado'] as $sabado) {
                            $horarioSabado .= "" . $sabado . ", ";
                        }

                        $sql = "INSERT INTO `horariomedico`(`codHorarioMedico`, `diaSemana`, `horarioAtendimento`, `numOrdem`) values (null, 'Segunda', '" . $horarioSegunda . "', '" . $id . "'), (null, 'Terça', '" . $horarioTerca . "', '" . $id . "'), (null, 'Quarta', '" . $horarioQuarta . "', '" . $id . "'),(null, 'Quinta', '" . $horarioQuinta . "', '" . $id . "'), (null, 'Sexta', '" . $horarioSexta . "', '" . $id . "'), (null, 'Sabado', '" . $horarioSabado . "', '" . $id . "'), (null, 'Domingo', '" . $horarioDomingo . "', '" . $id . "')";


                        if (mysqli_query($mysqli, $sql)) {
                            $sql = "INSERT INTO `email`(`codEmail`, `idPessoa`, `codHospital`, `endereco`) VALUES (null,'" . $last_id . "',null, '" . trim($_POST["email"]) . "')";
                            if (session_status() === PHP_SESSION_NONE) {
                                session_start();
                            }
                            $_SESSION["logado"] = true;
                            $_SESSION["id"] = $last_id;
                            $_SESSION["nomeusuario"] = trim($_POST["nameu"]);
                            $_SESSION["tipoUser"] = 'Paciente';
                            //
                            header("location: interfaceusuario/Medico/index.php");
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_GET["p"] == 3) {
    echo "<script> alert(3)</script>";
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["uname"]))) {
        $nomeUsuario_erro = "Introduza o nome de usuario.";
    } else {
        $username = trim($_POST["uname"]);
    }

    if (empty(trim($_POST["psw"]))) {
        $senha_erro = "Introduza uma senha valida";
    } else {
        $password = md5(trim($_POST["psw"]));
    }



    if (empty($nomeUsuario_erro) && empty($senha_erro)) {
        $sql = "SELECT idPessoa, nomeUtilizador, tipoUser FROM pessoa WHERE nomeUtilizador = ? and password = ?";


        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $idPessoa, $nomeUtilizador, $tipoUser);
                    if (mysqli_stmt_fetch($stmt)) {
                        echo ($idPessoa);
                        echo ($nomeUtilizador);
                        echo ($tipoUser);
                        session_start();

                        $_SESSION["logado"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["nomeusuario"] = $username;
                        $_SESSION["tipoUser"] = $tipoUser;

                        if ($tipoUser == "Paciente") {
                            header("location: interfaceusuario/Paciente/index.php");
                        }
                        if ($tipoUser == "Medico") {
                            header("location: interfaceusuario/Medico/index.php");
                        }
                        if ($tipoUser == "Director") {
                            header("location: interfaceusuario/Hospital/index.php");
                        }
                    }
                    $login_erro = "Invalid username or password.";
                } else {
                    $login_erro = "Senha ou passwordInvalida.";
                }
            } else {
                echo "Ocorreu um erro.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($mysqli);
}
?>
<!DOCTYPE html>
<html lang="pt-PT">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plataforma de Registo e Atendimento Médico Ambulatório</title>
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div class="navegador" id="myTopnav">
    <a href="index.php" id="logotipo"></a>
    <a href="#medicos" onclick="myFunction();">Médicos</a>
    <a href="#hospitais" onclick="myFunction();">Hospitais</a>
    <a href="#pacientes" onclick="myFunction();">Pacientes</a>
    <a href="#sobre" onclick="myFunction();">Sobre</a>
    <a href="#Registo" class="direita"
      onclick="document.getElementById('reg').style.display='block'; myFunction()">Registar</a>
    <a href="#Login" class="direita"
      onclick="document.getElementById('login').style.display='block'; myFunction()">Entrar</a>
    <a href="javascript:void(0);" style="font-size: 17px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
  <!-- Tela de Login -->
  <div id="login" class="tela-login cartao">
    <form class="form-tela-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h2 style="text-align: center">Login</h2>
      <input type="text" placeholder="Insira o nome do usuário, Email ou o Telefone" name="uname" required autofocus>
      <input type="password" placeholder="Insira a password" name="psw" required>
      <button type="submit" class="botao verde l" style="width: 100%; margin: 5px 0;"> Entrar </button>
      <button type="button" onclick="document.getElementById('login').style.display = 'none'" class="botao vermelho l"
        style="width: 100%; margin: 5px 0;">Cancelar</button>
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
        <div><img src="imagens/Logomarca-Pramaactualizada.png" style="width: 300px; height: 300px; " alt="LogoMarca">
        </div>
        <h2>A plataforma de telemedicina gratuíta. Mais tecnologia no acesso a saúde.</h2>
      </div>
    </div>
    <div class="row seccaoConteudoTelaApresentacao">
      <div class="col-12">
        <h1 class="titulo">Atendimento rápido e eficiente</h1>

      </div>
      <div class="col-lg-3 col-sm-6">
        <img src="imagens/Unknown-8.png" style="width:100%;" alt="">

      </div>
      <div class="col-lg-9 col-sm-6">

        <div class="conteudo">
          <p>Com o PRAMA, os médicos conseguem acessar os dados e os resultados dos exames médicos de forma rápida e em
            qualquer local com um dispositivo conectado a internet, sem precisar realizar um atendimento prévio para
            entender o histórico do paciente</p>
          <p>O atendimento mais próximo e humanizado possível. O Médico consegue ter uma visão única e completa sobre
            cada paciente através do seu historico de consultas.</p>
          <p>Com o PRAMA é possivel gerir as consultas e essas informações são atualizadas em tempo real, permitindo o
            paciente confirme, remarque ou cancele sua consulta on-line – atualizando a agenda automaticamente.</p>
        </div>
      </div>
    </div>
  </section>
  <section id="medicos" style="background-color: whitesmoke;">
    <div class="row seccaoConteudoTelaApresentacao">
      <div class="col-12">
        <h1>Como funciona para os médicos?</h1>

      </div>
      <div class="col-lg-9 col-sm-6">
        <div class="conteudo ">
          <p>Com o PRAMA, os médicos conseguem acessar os dados e os resultados dos exames médicos de forma rápida e em
            qualquer local com um dispositivo conectado a internet, sem precisar realizar um atendimento prévio para
            entender o histórico do paciente</p>
          <p>O atendimento mais próximo e humanizado possível. O Médico consegue ter uma visão única e completa sobre
            cada paciente através do seu historico de consultas.</p>
          <p>Com o PRAMA é possivel gerir as consultas e essas informações são atualizadas em tempo real, permitindo o
            paciente confirme, remarque ou cancele sua consulta on-line – atualizando a agenda automaticamente.</p>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <img src="imagens/Unknown.png" style="width:100%;" alt="">

      </div>
    </div>
    <div class="centro row seccaoConteudoTelaApresentacao" style="background: white!important ">
      <div class="col-12">
        <h1>Vantagens do PRAMA</h1>
      </div>

      <div class="row icons-container pb-5 pt-5">
        <div class="col-lg-3 col-sm-6 mb-sm-4 col-xs-12 mb-xs-4">
          <div class="icons">
            <p>Telemedicina para médicos, pacientes e unidades hospitalares</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-sm-4 col-xs-12 mb-xs-4">
          <div class="icons">
            <p>Consultas por chat em qualquer lugar com internet</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 mb-xs-4">
          <div class="icons">
            <p>Acesso por computador, tablet e smarthphone</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12 mb-xs-4">
          <div class="icons">
            <p>Histórico de consultas completo dos pacientes</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="hospitais" style="background-color: whitesmoke;">

    <div class="row seccaoConteudoTelaApresentacao">
      <div class="col-12">
        <h1>Para as Unidades Hospitalares</h1>

      </div>
      <div class="col-lg-3 col-sm-6">
        <img src="imagens/Unknown-7.png" style="width:100%;" alt="">
      </div>

      <div class="col-lg-9 col-sm-6">

        <div class="conteudo">
          <p>Os diretores gerais podem registar as instituições que dirigem, os médicos e indicar os serviços de
            especialidades praticados.</p>
          <p>Permite contar com uma avaliação especializada à distância, cujo investimento é realizado conforme a
            necessidade</p>
        </div>
      </div>
    </div>

  </section>
  <section id="pacientes">

    <div class="row seccaoConteudoTelaApresentacao">
      <div class="col-12">
        <h1>Vantagens para os Pacientes</h1>
      </div>
      <div class="col-lg-9 col-sm-6">
        <div class="conteudo">
          <p>Qualquer clínica pode oferecer atendimento multidisciplinar. Afinal, o diagnóstico é feito à distância e
            por um especialista da área, que garante um diagnóstico mais preciso.</p>
          <p>Mesmo com a agenda preenchida, os pacientes conseguem falar com seus médicos ou ser atendidos onde
            estiverem e sem perder tempo com deslocamentos.</p>
          <p>Além disso, eles têm acesso à todos os especialistas inscritos na plataforma e ao histório das consultas
            que fica armazenado na base de dados do PRAMA, podendo ser consultado a qualquer momento.</p>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <img src="imagens/Unknown-10.png" style="width:100%;" alt="">
      </div>
    </div>
  </section>
  <section id="sobre" style="background-color: whitesmoke;">
    <div class="row seccaoConteudoTelaApresentacao mb-5">
      <div class="col-12">
        <h1>Sobre Nós</h1>
      </div>
      <div class="col-lg-3 col-sm-6">
        <img src="imagens/images.jpeg" style="width:100%;" alt="">
      </div>
      <div class="col-lg-9 col-sm-6">
        <div class="conteudo">
          <p>Somos uma plataforma de cuidados em saúde que valoriza os médicos, os pacientes e amplia o acesso à saúde,
            com atendimento humanizado.</p>
          <p>Oferecemos tecnologia para atendimentos a pacientes por telemedicina e acompanhamento da adesão ao
            tratamento.</p>
          <p>Com o PRAMA, é possível receber e analisar resultados de exames e fazer prescrições online. Tudo em um
            único lugar!</p>
          <p>Os atendimentos poderão ocorrer por meio de chat ou de forma presencial dependendo do quadro clínico do
            paciente.</p>
          <p>Experimente!</p>
        </div>
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
      <span class="fechar" onClick="this.parentElement.style.display = 'none'; location = '?p='">&times;</span><br>
      <?php if (!empty($_GET["p"])) { ?>
      <script>
      document.getElementById('reg').style.display = 'block';
      </script>
      <form id="form" class="formulario" style="display: block;" action="" method="post" target="_self"
        autocomplete="on">

        <div class="formRegElm">
          <?php if ($_GET["p"] == "1") { ?> <h1>Registo de Paciente</h1> <?php } ?>
          <?php if ($_GET["p"] == "2") { ?> <h1>Registo de Médico</h1> <?php } ?>
          <?php if ($_GET["p"] == "3") { ?> <h1>Registo de Unidade Hospitalar</h1> <?php } ?>
          <hr>
          <?php if ($_GET["p"] == "3") { ?>
          <label><strong>Dados do Diretor Geral</strong></label><br>
          <hr>
          <?php } ?>
          <label for="nome"><strong>Nome Completo</strong></label>
          <input type="text" placeholder="Insira o Nome Completo" name="nome" id="nome" required autofocus>
          <?php if ($_GET["p"] == "1" || $_GET["p"] == "2") {
                            echo '<br>';
                            echo '<label for="nameu"><strong>Nome de Utilizador</strong></label>';
                            echo '<input type="text" placeholder="Insira o nome de utilizador" name="nameu" id="nameu">';
                            echo '<br>';
                            echo '<label for="peso"><strong>Peso</strong></label>';
                            echo '<input type="text" placeholder="Insira o nome de utilizador" name="peso" id="peso">';
                            echo '<br>';
                            echo '<label for="dataNasc"><strong>Data de Nascimento</strong></label>';
                            echo '<br>';
                            echo '<input type="date" placeholder="Insira a sua data de Nascimento" name="dataNasc" id="dataNasc">';
                            echo '<br>';
                            echo '<label for="docId"><strong>Documento de Identificação</strong></label>';
                            echo '<br>';
                            echo '<select id="docId" name="docId">';
                            echo '<option>Selecionar...</option>';
                            echo '<option value="Bilhete de Identidade">Bilhete de Identidade</option>';
                            echo '<option value="Passaporte">Passaporte</option>';
                            echo '</select>';
                            echo '<br>';
                            echo '<label for="numeroDoc"><strong>Numero do Documento</strong></label>';
                            echo '<input type="text" placeholder="Insira o nome de utilizador" name="numeroDoc" id="numeroDoc">';
                            echo '<br>';
                            echo '<label for="genero"><strong>Genero</strong></label>';
                            echo '<br>';
                            echo '<select id="genero" name="genero">';
                            echo '<option>Selecionar...</option>';
                            echo '<option value="Masculino">Masculino</option>';
                            echo '<option value="Femenino">Femenino</option>';
                            echo '</select>';
                            echo '<br>';
                            echo '<label for="estadoCivil"><strong>Estado Civil</strong></label>';
                            echo '<br>';
                            echo '<select id="estadoCivil" name="estadoCivil">';
                            echo '<option>Selecionar...</option>';
                            echo '<option value="Casado">Casado</option>';
                            echo '<option value="Solteiro">Solteiro</option>';
                            echo '<option value="Viuvo">Viuvo</option>';
                            echo '<option value="Divorciado">Divorciado</option>';
                            echo '</select>';

                            echo '<br>';
                            echo '<label for="tipoSang"><strong>Tipo Sanguíneo</strong></label>';
                            echo '<br>';
                            echo '<select id="tipoSang" name="tipoSang">';
                            echo '<option>Selecionar...</option>';
                            echo '<option value="A+">A+</option>';
                            echo '<option value="A-">A-</option>';
                            echo '<option value="B+">B+</option>';
                            echo '<option value="B-">B-</option>';
                            echo '<option value="AB+">AB+</option>';
                            echo '<option value="AB-">AB-</option>';
                            echo '<option value="O+">O+</option>';
                            echo '<option value="O-">O-</option>';
                            echo '</select>';
                        }
                        if ($_GET["p"] == "3") { ?>
          <hr>
          <label><strong>Dados da Unidade Hospitalar</strong></label>
          <hr>
          <label for="nomeUH"><strong>Nome da Unidade Hospitalar</strong></label>
          <input type="text" placeholder="Escreva o Nome da Unidade Hospitalar" name="nomeUH" id="nomeUH">
          <?php } ?>
          <label for="tlf"><strong>Telefone</strong></label>
          <input type="tel" placeholder="Nº de Telefone" name="tlf" id="tlf" required>
          <?php if ($_GET["p"] == "2") {
                            echo '<br>';
                            echo '<label for="nOrdem"><strong>Nº da Ordem dos Médicos</strong></label>';
                            echo '<input type="text" placeholder="Insira o Número da Ordem dos Médicos" name="nOrdem" id="nOrdem">';
                            echo '<label for="esp"><strong>Especialidade</strong></label>';
                            echo '<select id="esp" name="esp[]" class="form-select" multiple aria-label="multiple select example">';

                            $especialidadessql = "SELECT codEspecialidade, nome FROM especialidade";

                            $especialidadesresult = mysqli_query($mysqli, $especialidadessql);

                            while ($row    = mysqli_fetch_assoc($especialidadesresult)) {

                                echo "<option value=" . $row["codEspecialidade"] . ">" . $row['nome'] . "</option>";
                            }

                            // mysqli_close($mysqli);

                            echo '</select>';

                            echo '<br>';
                            echo '<label for="segundaF"><strong>Horário de Atendimento às Segundas</strong></label>';
                            echo '<br>';
                            echo '<select id="segundaF" name="segundaF[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';


                            echo '<br>';
                            echo '<label for="tercaF"><strong>Horário de Atendimento às Terças</strong></label>';
                            echo '<br>';
                            echo '<select id="tercaF" name="tercaF[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';


                            echo '<br>';
                            echo '<label for="quartaF"><strong>Horário de Atendimento às Quartas</strong></label>';
                            echo '<br>';
                            echo '<select id="quartaF" name="quartaF[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';


                            echo '<br>';
                            echo '<label for="quintaF"><strong>Horário de Atendimento às Quintas</strong></label>';
                            echo '<br>';
                            echo '<select id="quintaF" name="quintaF[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';


                            echo '<br>';
                            echo '<label for="sextaF"><strong>Horário de Atendimento às Sextas </strong></label>';
                            echo '<br>';
                            echo '<select id="sextaF" name="sextaF[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';



                            echo '<br>';
                            echo '<label for="sabado"><strong>Horário de Atendimento aos Sábados</strong></label>';
                            echo '<br>';
                            echo '<select id="sabado" name="sabado[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';



                            echo '<br>';
                            echo '<label for="domingo"><strong>Horário de Atendimento aos Domingos</strong></label>';
                            echo '<br>';
                            echo '<select id="domingo" name="domingo[]" class="form-select" multiple aria-label="multiple select example">';
                            echo '<option value="00:00"> 00:00 </option>';
                            echo '<option value="01:00"> 01:00 </option>';
                            echo '<option value="02:00"> 02:00 </option>';
                            echo '<option value="03:00"> 03:00 </option>';
                            echo '<option value="04:00"> 04:00 </option>';
                            echo '<option value="05:00"> 05:00 </option>';
                            echo '<option value="06:00"> 06:00 </option>';
                            echo '<option value="07:00"> 07:00 </option>';
                            echo '<option value="08:00"> 08:00 </option>';
                            echo '<option value="09:00"> 09:00 </option>';
                            echo '<option value="10:00"> 10:00 </option>';
                            echo '<option value="11:00"> 11:00 </option>';
                            echo '<option value="12:00"> 12:00 </option>';
                            echo '<option value="13:00"> 13:00 </option>';
                            echo '<option value="14:00"> 14:00 </option>';
                            echo '<option value="16:00"> 16:00 </option>';
                            echo '<option value="17:00"> 17:00 </option>';
                            echo '<option value="18:00"> 18:00 </option>';
                            echo '<option value="19:00"> 19:00 </option>';
                            echo '<option value="20:00"> 20:00 </option>';
                            echo '<option value="21:00"> 21:00 </option>';
                            echo '<option value="22:00"> 22:00 </option>';
                            echo '<option value="23:00"> 23:00 </option>';
                            echo '</select>';


                            echo '<br>';
                            echo '<label for="descricaoMedico"><strong>Descrição Profissional</strong></label>';
                            echo '<br>';

                            echo '<textarea id="descricaoMedico" name="descricaoMedico"> </textarea>';
                        }


                        if ($_GET["p"] == "3") { ?>
          <br>
          <label for="sector"><strong>Sector no SNS</strong></label>
          <select id="sector" name="sector" onchange="alterarSubsector(this.value)">
            <option>Selecionar...</option>
            <option value="publico">Sector Público</option>
            <option value="privado">Sector Privado</option>
            <option value="tradicional">Sector de Medicina Tradicional</option>
            <option value="deficicão" selected>Seleccione o sector da UH</option>
          </select>
          <br>

          <label for="subsector"><strong>Subsector do SNS</strong></label>
          <select name="subsector" id="subsector">

            <!-- Sector Privado -->
          </select>
          <br>
          <label for="npac"><strong>Nº de Pacientes atendidos Diáriamente</strong></label>
          <input type="number" placeholder="Insira o nº" name="npac" id="npac">
          <?php } ?>
          <br>
          <label for="provincia"><strong>Provincia</strong></label>
          <br />
          <select id="provincia" name="provincia" onchange="carregarMunicipios(this.value)">
            <option>Selecionar...</option>
            <?php
                            // reabrirConexao();
                            $provinciaSql = "SELECT codProvincia, nome FROM provincia";

                            $provinciaResult = mysqli_query($mysqli, $provinciaSql);

                            while ($row    = mysqli_fetch_assoc($provinciaResult)) {

                                echo "<option value=" . $row["codProvincia"] . ">" . $row['nome'] . "</option>";
                            }
                            // mysqli_close($mysqli);
                            ?>
          </select>
          <br>
          <label for="municipio"><strong>Municipio</strong></label>
          <br />
          <select id="municipio" name="municipio" onchange="" disabled>
            <option>Selecionar...</option>
            <?php

                            // reabrirConexao();

                            $municipioSql = "SELECT codMunicipio, codProvincia, nome FROM municipio";

                            $municipioResult = mysqli_query($mysqli, $municipioSql);

                            while ($row    = mysqli_fetch_assoc($municipioResult)) {
                                echo "<option value=" . $row["codMunicipio"] . " id=" . $row["codProvincia"] . ">" . $row['nome'] . "</option>";
                            }
                            // mysqli_close($mysqli);
                            ?>
          </select>
          <br>
          <label for="endereco"><strong>Endereco</strong></label>
          <input type="text" placeholder="Escreva o seu endereco" name="endereco" id="endereco">
          <br />

          <label for="email"><strong>Email</strong></label>
          <input type="text" placeholder="Insira o Email" name="email" id="email">
          <label for="password"><strong>Password</strong></label>
          <input type="password" placeholder="Insira a Password" name="password" id="password"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
          <div id="message">A password deve ter <strong id="letter">uma letra minúscula</strong>, <strong
              id="capital">uma maiúscula</strong>, <strong id="number">um número</strong> e deve ter no <strong
              id="length">mínimo 8 caracteres!</strong></div>
          <label for="password-repeat"><strong>Confirme a Password</strong></label>
          <input type="password" placeholder="Insira Novamente a Password" name="password-repeat" id="password-repeat"
            required>
          <hr>
          <input type="submit" class="botao verde l" style="width: 100%;" value="Registar" name="fpaciente">
        </div>
      </form>
      <?php } ?>
    </div>
  </div>
  <!-- Rorapé -->
  <script>
  // $("#sector").on("change", function (e) {
  //     alert
  //                 // $(".nav-link.active").removeClass("active");
  //                 // $(this).children("a").addClass("active");

  //                 // const id = $(this).children("a").attr("href");
  //                 // $(".tab-pane.fade").removeClass("show");
  //                 // $(".tab-pane.fade").removeClass("active");


  //                 // const element = document.getElementById(id.substr(1))
  //                 // element.classList = element.classList + " show active"
  //             })

  function alterarSubsector(sector) {
    let opcoesSubsector;
    let el = $("#subsector");

    if (sector === "publico") {
      el.removeAttr('disabled');
      opcoesSubsector = {
        "SNS": "SNS",
        "SS das FAA": "SS das FAA",
        "SS do MININT": "SS do MININT",
        "SS das Empresas Públicas": "SS das Empresas Públicas"
      }
    } else if (sector === "privado") {
      el.removeAttr('disabled');
      opcoesSubsector = {
        "Lucrativo": "Lucrativo",
        "Não Lucrativo": "Não Lucrativo"
      }
    } else {
      el.attr('disabled', 'true');
    }



    el.empty();
    $.each(opcoesSubsector, function(key, value) {
      el.append($("<option></option>")
        .attr("value", value).text(key));
    });
  }

  function carregarMunicipios(codProvincia) {
    $("#municipio").removeAttr("disabled");
    console.log($("#municipio")[0].options)
    for (let i = 0; i < $("#municipio")[0].options.length; i++) {
      $("#municipio")[0].options[i].classList = "";

    }
    for (let i = 0; i < $("#municipio")[0].options.length; i++) {
      if ($("#municipio")[0].options[i].id !== codProvincia) {
        $("#municipio")[0].options[i].classList = "d-none";
      }
    }
  }
  </script>
  <footer class="contentor centro french-blue">
    <div>
      <span>&copy;Todos os Direitos Reservados à Universidade Metodista de Angola</span>
    </div>
  </footer>
  <script src="js/script.js"></script>
  <script src="js/mensagem.js"></script>
</body>

</html>