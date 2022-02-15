<?php
    if(isset($_SESSION["idPessoa"])){
      $outgoing_id = $_SESSION["idPessoa"];
      if(!empty($message)){
          $sql = mysqli_query($mysqli, "INSERT INTO mensagens (idPessoa, idPessoa1, msg, dataEnvio)
                                      VALUES ({$id_usuario}, {$outgoing_id},'" . trim($_POST["message"]) . "', date('Y-m-d'))") or die();
      }
    } ?>
<button class="open-button" onclick="openForm()">
  <i class="fab fa-whatsapp"></i>
</button>

<div class="form-popup" id="myForm">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="" class="back-icon"><i class="fas fa-times"></i></a>
        <!--img src="php/images/<?php //imagem?>" alt=""-->
        <div class="details">
          <span><?php echo $row['nome']; ?></span>
          <!--p><?php //estado ou profissão ?></p-->
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id_usuario; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escreve a mensagem aqui..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script>
    function openForm() {
    document.getElementById("myForm").style.display = "block";
    }
  </script>
  <script src="../js/chat.js"></script>
</div>
