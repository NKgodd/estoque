<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura as preferências do usuário
    $order = $_POST['order'];
    $mode = $_POST['mode'];

    // Armazena as preferências na sessão
    $_SESSION['order'] = $order;
    $_SESSION['mode'] = $mode;

    // Redireciona para uma página de confirmação ou de volta para a página de preferências
    header('Location: preferencias.php'); // ou outra página, se preferir
    exit;
}
