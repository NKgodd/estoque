<?php
        include '../db.php';

        $nome_produto = isset($_GET['nome']) ? $_GET['nome'] : '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome_produto = $_POST['nome_produto'];
            $quantidade_adicionada = $_POST['quantidade'];

            try {
                $pdo->beginTransaction();

                $stmt = $pdo->prepare('SELECT id, quantidade FROM produtos WHERE nome = ?');
                $stmt->execute([$nome_produto]);
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($produto) {
                    $nova_quantidade = $produto['quantidade'] + $quantidade_adicionada;
                    $stmt = $pdo->prepare('UPDATE produtos SET quantidade = ? WHERE nome = ?');
                    $stmt->execute([$nova_quantidade, $nome_produto]);

                                                                                                            // Inserir no histórico
                    $stmt = $pdo->prepare('INSERT INTO historico (acao, produto_id, produto_nome, quantidade) VALUES (?, ?, ?, ?)');
                    $stmt->execute(['Adicionado', $produto['id'], $nome_produto, $quantidade_adicionada]);

                    $pdo->commit();

                    header('Location: index.php');
                    exit;
                } else {
                    echo 'Produto não encontrado.';
                }
            } catch (Exception $e) {
                $pdo->rollBack();
                echo 'Erro ao adicionar quantidade ao estoque: ' . $e->getMessage();
            }
        }
?>

                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
                    <link rel="stylesheet" type="text/css" href="../css/retry.css">

                    <button id="close-button" class="close-button" onclick="window.location.href='../pages/index.php'">
                        <i class="fas fa-times"></i>
                    </button>

                    <form method="post" action="adicionar_estoque.php">
                        <label for="nome_produto">Nome do Produto:</label>
                        <input type="text" id="nome_produto" name="nome_produto" value="<?php echo htmlspecialchars($nome_produto); ?>" required><br>
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" id="quantidade" name="quantidade" required><br>
                        <input type="submit" value="Adicionar ao Estoque">
                    </form>


