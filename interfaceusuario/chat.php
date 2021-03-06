<?php

$id_usuario = "";
if (isset($_GET['id_usuario'])) {
  $id_usuario = $_GET["id_usuario"];
} else {
  $id_usuario = $id_contacto;
}

if (isset($row["nome"])) {
  $nome = $row["nome"];
} else {
  $nome = $nomeContacto;
}


if (isset($_GET["message"]) && !empty($_GET["message"])) {
  $sql = "INSERT INTO `mensagens`(`idPessoa`, `idPessoa1`, `msg`, `dataEnvio`) VALUES (" . $_SESSION["idPessoa"] . "," . $id_usuario . ",'" . trim($_GET["message"]) . "','" . date('Y-m-d h:i:s') . "')";
  mysqli_query($mysqli, $sql);
?>
  <script>
    console.log(location.pathname)
    console.log(location.search.split("&")[0])
    // location.search = search.split("&")[0];
    location.pathname = location.pathname;
    location.href = location.href.split("?")[0] + location.search.split("&")[0]
    // location.pathname = location.pathname + location.search.split("&")[0];
  </script>
<?php
}
?>
<button class="open-button" onclick="openForm()" style="max-width: 64px">
  <i class="fab fa-whatsapp"></i>
</button>

<div class="form-popup" id="myForm">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <p href="" style="cursor: pointer; margin: 0" class="back-icon" onclick="document.getElementById('myForm').style.display='none'" id="fechar"><i class="fas fa-times"></i></p>
        <div class="details">
          <span style="padding-left: 15px;"><?php echo $nome; ?></span>
          <!--p><?php //estado ou profissão 
                ?></p-->
        </div>
      </header>
      <div class="chat-box" id="chat-box">
        <?php
        if (isset($id_usuario)) {
          $sql = "SELECT * FROM mensagens WHERE (idPessoa = {$_SESSION["idPessoa"]} and idPessoa1 = {$id_usuario}) or (idPessoa = {$id_usuario} and idPessoa1 = {$_SESSION["idPessoa"]})";
          $mensagens = mysqli_query($mysqli, $sql);
          if (mysqli_num_rows($mensagens) == 0) {
            echo "Não exintem mensagens.";
          } else {
            while ($row = mysqli_fetch_assoc($mensagens)) {
              if ($_SESSION["idPessoa"] == $row["idPessoa"]) { ?>
                <div>
                  <p style="background: #669bcb8a;text-align: right;margin-left: 30%!important;padding: 10px;border-radius: 10px;width: 73%; margin-bottom: 0;"><?php echo $row["msg"]; ?></p>
                  <p style="text-align: right;margin-left: 30%!important;border-radius: 10px;width: 73%;font-size: 9px; margin-bottom: 10px"><?php echo $row["dataEnvio"]; ?></p>
                </div>
              <?php
              } else {
              ?>
                <div>
                  <p style="background: #669bcb8a;text-align: left;padding: 10px;border-radius: 10px;width: 73%; margin-bottom: 0;"><?php echo $row["msg"]; ?></p>
                  <p style="text-align: left; border-radius: 10px;width: 73%;font-size: 9px; margin-bottom: 10px"><?php echo $row["dataEnvio"]; ?></p>
                </div>
        <?php
              }
            }
          }
        }
        ?>
      </div>
      <form class="typing-area">
        <input type="text" class="incoming_id" name="id_usuario" id="userId" value="<?php echo $id_usuario; ?>" hidden>
        <input type="text" name="message" class="input-field" id="msg" placeholder="Escreve a mensagem aqui..." autocomplete="off">
        <div onclick="enviar()" style="width: 16%; background: #a7c4de; border-radius: 1px; margin: 5px 0; cursor: pointer;"><i class="fab fa-telegram-plane" style="font-size: 24px; text-align: center;
    display: flex; justify-content: center; align-content: center; align-items: center; flex-wrap: nowrap; margin-top: 10px;
"></i></div>
      </form>
    </section>
  </div>
  <script>
    if (document.location.search.includes("id")) {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("chat-box").scroll({
        top: document.getElementById("chat-box").scrollHeight
      })
    };

    function openForm() {
      document.getElementById("myForm").style.display = "block";
      document.getElementById("chat-box").scroll({
        top: document.getElementById("chat-box").scrollHeight
      })
    }

    function enviar() {
      const id_usuario = document.getElementById("userId").value;
      const message = document.getElementById("msg").value;
      if (!message) {
        return;
      } else {
        location.search += "&id_usuario=" + id_usuario + "&message=" + message;
      }
    }
    // if (document.location.search.includes("message")) {
    //   const id_usuario = document.getElementById("userId").value;
    //   location.search += "&id_usuario=" + id_usuario;
    // };
  </script>
</div>