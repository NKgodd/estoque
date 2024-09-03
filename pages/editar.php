<?php
        include '../db.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
            $data_validade = $_POST['data_validade'];

            // Obter dados do produto antes da edição
            $sql = 'SELECT * FROM produtos WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $produto = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = 'UPDATE produtos SET nome = ?, quantidade = ?, preco = ?, data_validade = ? WHERE id = ?';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $quantidade, $preco, $data_validade, $id]);

            // Inserir no histórico
            $sql = 'INSERT INTO historico (acao, produto_id, produto_nome, quantidade) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['Editado', $id, $nome, $quantidade]);

            header('Location: index.php');
            exit;
        }

            $id = isset($_GET['id']) ? $_GET['id'] : null;

            if ($id) {
                $sql = 'SELECT * FROM produtos WHERE id = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$produto) {
                    echo 'Produto não encontrado.';
                    exit;
                }
            } else {
                echo 'ID do produto não especificado.';
                exit;
            }
?>
        <meta charset"utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">  
        <link rel="stylesheet" type="text/css" href="../css/retry.css">

            <button id="close-button" class="close-button" onclick="window.location.href='../pages/index.php'">
                <i class="fas fa-times"></i>
            </button>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($produto['id']); ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($produto['nome']); ?>" required><br>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($produto['quantidade']); ?>" required><br>
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?php echo htmlspecialchars($produto['preco']); ?>" required><br>
            <label for="data_validade">Data de Validade:</label>
            <input type="date" id="data_validade" name="data_validade" value="<?php echo htmlspecialchars($produto['data_validade']); ?>"><br>
            <input type="submit" value="Atualizar">
        </form>
