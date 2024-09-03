<?php
session_start();

// Função para enviar email
function sendRecoveryEmail($email, $token) {
    $to = $email;
    $subject = 'Recuperação de Senha';
    $message = "Clique no link abaixo para redefinir sua senha:\n";
    $message .= "http://seusite.com/reset-password.php?token=$token";
    $headers = 'From: no-reply@seusite.com' . "\r\n" .
               'Reply-To: no-reply@seusite.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);
}

// Conectar ao banco de dados
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';

    try {
        // Verificar se o email existe
        $sql = 'SELECT id FROM usuarios WHERE email = :email';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Gerar um token de recuperação
            $token = bin2hex(random_bytes(16));
            $expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); // Token válido por 1 hora

            // Armazenar o token no banco de dados
            $sql = 'UPDATE usuarios SET recovery_token = :token, token_expiry = :expiry WHERE email = :email';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'token' => $token,
                'expiry' => $expiry,
                'email' => $email
            ]);

            // Enviar o email de recuperação
            sendRecoveryEmail($email, $token);

            echo 'Um link de recuperação de senha foi enviado para seu email.';
        } else {
            echo 'Email não encontrado.';
        }
    } catch (PDOException $e) {
        echo 'Erro ao processar a recuperação de senha: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Recuperar Senha</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Link de Recuperação</button>
        </form>
        <p class="mt-3">Já possui uma conta? <a href="login.php">Faça login aqui</a></p>
    </div>
</body>
</html>
