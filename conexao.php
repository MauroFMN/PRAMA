<?php
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'praman';
  $db_port = 3306;

  $mysqli = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );

  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }


  function reabrirConexao() {
      $mysqli->connect($db_host, $db_user, $db_password, $db_db);
  }
  // echo 'Success: A proper connection to MySQL was made.';
  // echo '<br>';
  // echo 'Host information: '.$mysqli->host_info;
  // echo '<br>';
  // echo 'Protocol version: '.$mysqli->protocol_version;
  // $senha = "1234567Prama";
  // $senhaCripto= md5($senha);
  // echo 'senhaCripto'.$senhaCripto;
  // $mysqli->close();
?>
