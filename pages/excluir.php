<?php
    include '../db.php';

    // Verifica se o ID foi passado na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            // Inicia a transação
            $pdo->beginTransaction();

            // Primeiro, exclui os registros associados na tabela 'historico'
            $stmt = $pdo->prepare('DELETE FROM historico WHERE produto_id = ?');
            $stmt->execute([$id]);

            // Agora, exclui o produto da tabela 'produtos'
            $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = ?');
            $stmt->execute([$id]);

            // Confirma a transação
            $pdo->commit();

            // Redireciona para a página inicial
            header('Location: index.php');
            exit;
        } catch (Exception $e) {
            // Desfaz a transação em caso de erro
            $pdo->rollBack();
            echo 'Erro ao excluir o produto: ' . $e->getMessage();
        }
    } else {
        echo 'ID do produto não especificado.';
    }
?>
