<button class="open-button abrirChat" onclick="openForm()">
  <i class="fab fa-whatsapp"></i>
</button>

<div class="form-popup" id="myForm">
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php

        ?>
        <a href="" class="back-icon"><i class="fas fa-times"></i></a>
        <img src="../../imagens/<?php echo $foto; ?>" alt="">
        <div class="details">
          <span><?php //nome ?></span>
          <p><?php //estado ou profissão ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php  ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Escreve a mensagem aqui..." autocomplete="off">
        <button class="abrirChat"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>  <script>
    function openForm() {
    document.getElementById("myForm").style.display = "block";
    }
  </script>
</div>
