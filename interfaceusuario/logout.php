<?php
    session_start();
    if(isset($_SESSION['idPessoa'])){
        include '../../conexao.php';
        if(isset($_GET['logout_id'])){
            session_unset();
            session_destroy();
            header("location: ../index.php");
        }else{
            echo "Error: " . mysqli_error($mysqli);
        }
    }else{  
        header("location: ../index.php");
    }
?>