<?php
            session_start();
            include '../db.php'; // Certifique-se de que este arquivo contém a conexão com o banco de dados
            include '../templates/header.php';

            // Inicialize mensagens
            $successMessage = '';
            $errorMessage = '';

            // Processar o formulário se enviado
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $message = $_POST['message'];
                $rating = $_POST['rating'];

                // Validação e processamento da mensagem
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
                    // Preparar a instrução SQL para inserção
                    $sql = "INSERT INTO feedback (email, message, rating) VALUES (?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    
                    // Executar a instrução
                    if ($stmt->execute([$email, $message, $rating])) {
                        $successMessage = 'Mensagem enviada com sucesso!';
                    } else {
                        $errorMessage = 'Erro ao enviar a mensagem. Tente novamente mais tarde.';
                    }
                } else {
                    $errorMessage = 'Por favor, preencha todos os campos corretamente.';
             }
        }
?>

                        <!DOCTYPE html>
                        <html lang="pt-br">
                        <head>
                            <meta charset="UTF-8">
                            <title>Contato</title>
                            <link rel="stylesheet" href="../css/contato.css">
                            <link rel="icon" href="../assets/favicon.ico">
                        </head>
                        <body>
                            <header>
                                <h1><i class="fas fa-envelope"></i> Contato</h1>
                                <a href="../pages/index.php" class="nav-button"><i class="fas fa-home"></i> Voltar para Home</a>
                            </header>
                            <main>
                                <div class="container">
                                    <div class="contact-background">
                                        <section class="contact-form">
                                            <h2><i class="fas fa-pencil-alt"></i> Entre em Contato</h2>
                                            <?php if ($successMessage): ?>
                                                <p class="success-message"><?php echo htmlspecialchars($successMessage); ?></p>
                                            <?php endif; ?>
                                            <?php if ($errorMessage): ?>
                                                <p class="error-message"><?php echo htmlspecialchars($errorMessage); ?></p>
                                            <?php endif; ?>
                                            <form action="contato.php" method="post">
                                                <label for="email">Seu Email:</label>
                                                <input type="email" id="email" name="email" required>
                                                <label for="message">Sua Mensagem:</label>
                                                <textarea id="message" name="message" required></textarea>
                                                <label for="rating">Avaliação:</label>
                                                <select id="rating" name="rating" required>
                                                    <option value="1">1 Estrela</option>
                                                    <option value="2">2 Estrelas</option>
                                                    <option value="3">3 Estrelas</option>
                                                    <option value="4">4 Estrelas</option>
                                                    <option value="5">5 Estrelas</option>
                                                </select>
                                                <button type="submit"><i class="fas fa-paper-plane"></i> Enviar</button>
                                            </form>
                                        </section>
                                    </div>
                                    <section class="parallax">
                                        <h3><i class="fas fa-tags"></i> Planos de Assinatura</h3>
                                        <div class="subscription-cards">
                                            <div class="subscription-card">
                                                <h4>Mensal</h4>
                                                <p class="price">R$ 150</p>
                                                <p><br>Tenha acesso ao nosso sistema por um mês.</p>
                                            </div>
                                            <div class="subscription-card">
                                                <h4>Semestral</h4>
                                                <p class="price">R$ 250 <br>25% off</p>
                                                <p>Desconto para acesso por seis meses.</p>
                                            </div>
                                            <div class="subscription-card">
                                                <h4>Anual</h4>
                                                <p class="price">R$ 450 <br>30% off</p>
                                                <p>Assinatura anual com o maior desconto.</p>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </main>
                            <footer>
                                <p>&copy; 2024 Gestão Estoque ADM. Todos os direitos reservados.</p>
                            </footer>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" integrity="sha512-Fo2y68rI3G2F4XW3Q7VVtYmUNlfmyNHO0AKb8zRY4h0xtIsUp7KK5UgP6oWV7Rp7+1c/Lu8SHkpV/9eXGE9Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
