<?php
session_start();
include '../db.php'; // Certifique-se de que este caminho está correto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $whatsapp = $_POST['whatsapp'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $username = $_POST['username'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Gerar o hash da senha
    $hashedPassword = password_hash($senha, PASSWORD_BCRYPT);

    try {
        // Verificar se o e-mail já está registrado
        $sql = 'SELECT COUNT(*) FROM usuarios WHERE email = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $email_exists = $stmt->fetchColumn();
        
        if ($email_exists) {
            throw new Exception('Este e-mail já está registrado.');
        }

        // Inserir o novo usuário
        $sql = 'INSERT INTO usuarios (nome, email, whatsapp, cpf, username, senha, is_verified) VALUES (:nome, :email, :whatsapp, :cpf, :username, :senha, 1)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nome' => $nome,
            'email' => $email,
            'whatsapp' => $whatsapp,
            'cpf' => $cpf,
            'username' => $username,
            'senha' => $hashedPassword
        ]);

        // Redirecionar para a página de login
        header('Location: login.php');
        exit;
        
    } catch (PDOException $e) {
        echo 'Erro ao registrar o usuário: ' . htmlspecialchars($e->getMessage());
    } catch (Exception $e) {
        echo 'Erro: ' . htmlspecialchars($e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Experimente Grátis por 7 Dias</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="form-label">WhatsApp:</label>
                <input type="text" id="whatsapp" name="whatsapp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Nome de Usuário:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <p class="mt-3">Já possui uma conta? <a href="login.php">Faça login aqui</a></p>
    </div>
</body>
</html>
