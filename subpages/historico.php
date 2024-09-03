<?php
    session_start();
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        header('Location: ../pages/login.php');
        exit;
    }

    include '../db.php';
    include '../templates/header.php';

    // Obter registros do histórico
    $sql = 'SELECT historico.id, historico.acao, historico.produto_id, historico.produto_nome, historico.quantidade, historico.data 
            FROM historico
            ORDER BY historico.data DESC';
    $stmt = $pdo->query($sql);
    $historico = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

<link rel="stylesheet" type="text/css" href="../css/style.css">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Ação</th>
            <th>Produto ID</th>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($historico as $registro): ?>
            <tr>
                <td><?php echo htmlspecialchars($registro['id']); ?></td>
                <td><?php echo htmlspecialchars($registro['acao']); ?></td>
                <td><?php echo htmlspecialchars($registro['produto_id']); ?></td>
                <td><?php echo htmlspecialchars($registro['produto_nome']); ?></td>
                <td><?php echo htmlspecialchars($registro['quantidade']); ?></td>
                <td><?php echo htmlspecialchars(date('d/m/Y H:i:s', strtotime($registro['data']))); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

