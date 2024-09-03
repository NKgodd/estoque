<?php
        include '../db.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $quantidade = $_POST['quantidade'];
            $preco = $_POST['preco'];
            $data_validade = $_POST['data_validade'];
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];

            $sql = 'INSERT INTO produtos (nome, quantidade, preco, data_validade, descricao, categoria) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nome, $quantidade, $preco, $data_validade, $descricao, $categoria]);

            $produto_id = $pdo->lastInsertId();

            // Inserir no histórico
            $sql = 'INSERT INTO historico (acao, produto_id, produto_nome, quantidade) VALUES (?, ?, ?, ?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['Adicionado', $produto_id, $nome, $quantidade]);

            header('Location: index.php');
            exit;
        }
?>

        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/retry.css">

        <div class="container_adicionar">
            <h2 class="adicionar_novo_produto">Adicionar Novo Produto</h2>
            <button id="close-button" class="close-button" onclick="window.location.href='index.php'">
                <i class="fas fa-times"></i>
            </button>
        </div>  
                    <form method="post">
                        <label for="nome">Nome do produto:</label>
                        <input type="text" id="nome" name="nome" required><br>

                        <label for="quantidade">Quantidade:</label>
                        <input type="number" id="quantidade" name="quantidade" required><br>

                        <label for="preco">Preço:</label>
                        <input type="text" id="preco" name="preco" required><br>

                        <label for="data_validade">Data de Validade:</label>
                        <input type="date" id="data_validade" name="data_validade"><br>

                        <label for="descricao">Descrição do Produto:</label>
                        <textarea id="descricao" name="descricao" rows="4" required></textarea><br> 

                        <label for="categoria">Categoria:</label>
                        <select id="categoria" name="categoria" required>
                            <option value="alimentos">Alimentos</option>
                            <option value="moveis">Móveis</option>
                            <option value="utensilios">Utensílios</option>
                            <option value="objetos">Objetos</option>
                        </select><br>
                        
                        <input type="submit" value="Adicionar">
                    </form>
