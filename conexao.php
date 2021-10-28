<?php

function conectar() {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'prama';
    $db_port = 8889;

    $mysqli = mysqli_connect(
            $db_host,
            $db_user,
            $db_password,
            $db_db
    );
    return $mysqli;
}
