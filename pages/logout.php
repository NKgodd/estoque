<?php

session_start();


if (session_status() == PHP_SESSION_ACTIVE) {
 
    session_unset();
    
    
    session_destroy();
    
   
    header('Location: ../pages/login.php');
    exit;
} else {
    
    echo "Nenhuma sessão encontrada para destruir.";
    exit;
}
?>
