<?php
        session_start();
        if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
            header('Location: login.php');
            exit;
        }

        include '../db.php'; // Certifique-se de que este arquivo está configurado corretamente

        // Obter produtos do banco de dados
        try {
            $sql = 'SELECT * FROM produtos ORDER BY categoria, data_entrada ASC'; // Adiciona a cláusula ORDER BY para ordenar por categoria e data de entrada
            $stmt = $pdo->query($sql);
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Isso deve retornar um array de produtos

            if (!$produtos) {
                $produtos = []; // Garantindo que $produtos seja um array vazio se não houver resultados
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar produtos: " . $e->getMessage();
        }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/report.css">
</head>
<body>
    <div class="container">
        <header class="text-center my-5">
            <h1>Relatório de Produtos</h1>
            <p>Gerencie seus produtos com eficiência e organização.</p>
        </header>

        <?php
        // Agrupando produtos por categoria
        $categorias = [];
        foreach ($produtos as $produto) {
            $categoria = $produto['categoria'];
            if (!isset($categorias[$categoria])) {
                $categorias[$categoria] = [];
            }
            $categorias[$categoria][] = $produto;
        }

        foreach ($categorias as $categoria => $produtosCategoria): ?>
            <h2 class="my-4"><?php echo htmlspecialchars(ucfirst($categoria)); ?></h2>
            <table class="table table-dark table-striped table-hover mb-5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Uso</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Valor Total</th>
                        <th>Data de Validade</th>
                        <th>Data de Entrada</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtosCategoria as $produto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto['id']); ?></td>
                            <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                            <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                            <td><?php echo htmlspecialchars($produto['uso']); ?></td>
                            <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                            <td><?php echo htmlspecialchars(number_format($produto['preco'], 2, ',', '.')); ?></td>
                            <td><?php echo htmlspecialchars(number_format($produto['quantidade'] * $produto['preco'], 2, ',', '.')); ?></td>
                            <td><?php echo htmlspecialchars($produto['data_validade']); ?></td>
                            <td><?php echo htmlspecialchars($produto['data_entrada']); ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>

</body>
</html>
