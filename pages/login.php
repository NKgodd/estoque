<?php
session_start();
include '../db.php'; // Certifique-se de que este caminho está correto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $senha = $_POST['senha'] ?? '';

    try {
        // Buscar o usuário pelo nome de usuário e verificar se está verificado
        $sql = 'SELECT id, senha FROM usuarios WHERE username = :username AND is_verified = 1';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar a senha
        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['authenticated'] = true;
            header('Location: index.php');
            exit;
        } else {
            $error = 'Nome de usuário ou senha inválidos.';
        }
    } catch (PDOException $e) {
        $error = 'Erro ao fazer login: ' . htmlspecialchars($e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Nome de Usuário:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Esqueceu sua senha? <a href="recover-password.php">Recupere sua senha aqui</a></p>
        <p class="mt-3">Não tem uma conta? <a href="register.php">Registre-se aqui</a></p>
    </div>
</body>
</html>
