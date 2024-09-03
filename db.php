<?php
$host = 'localhost';
$db = 'controle_estoque';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

function getTotals($pdo, $categoria = null) {
    // Prepare a consulta com base na presença da categoria
    if ($categoria) {
        $sql = 'SELECT SUM(quantidade) AS total_quantidade, SUM(preco * quantidade) AS total_valor FROM produtos WHERE categoria = :categoria';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['categoria' => $categoria]);
    } else {
        $sql = 'SELECT SUM(quantidade) AS total_quantidade, SUM(preco * quantidade) AS total_valor FROM produtos';
        $stmt = $pdo->query($sql);
    }
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    
?>

