<?php
    session_start();
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        header('Location: login.php');
        exit;
    }

        include '../db.php';

                             // Função para calcular UEPS
        function calcularUEPS($pdo) {
                            // Seleciona produtos ordenados pela data de validade mais recente (UEPS)
            $sql = 'SELECT * FROM produtos ORDER BY data_validade DESC, id DESC';
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

                            // Verifica se há uma requisição de retirada
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $quantidade_retirar = $_POST['quantidade'];

                            // Atualiza a quantidade no banco de dados
            $sql = 'UPDATE produtos SET quantidade = quantidade - :quantidade WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['quantidade' => $quantidade_retirar, 'id' => $id]);

                            // Redireciona para evitar reenvio de formulário
            header('Location: ueps.php');
            exit;
        }

        $produtos = calcularUEPS($pdo);
?>

<?php include '../templates/header.php';?>

        <h2>Método UEPS - Retirada de Produtos</h2>
        <form method="post">
            <label for="produto">Selecione o Produto:</label>
            <select name="id" id="produto">
                <?php foreach ($produtos as $produto): ?>
                    <option value="<?php echo $produto['id']; ?>">
                        <?php echo htmlspecialchars($produto['nome']) . ' - Quantidade: ' . $produto['quantidade']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="quantidade">Quantidade a Retirar:</label>
            <input type="number" name="quantidade" id="quantidade" required>

            <button type="submit">Retirar</button>
        </form>

<?php include '../templates/footer.php'; ?>
