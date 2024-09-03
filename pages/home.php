<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/home.css"> <!-- Link para o CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Link para Font Awesome -->
</head>
<body>
    
    <button 
        style="position: absolute; top: 10px; right: 10px; background-color: transparent; border: none; cursor: pointer; font-size: 1.5em; color: #007bff; transition: color 0.3s;" 
        onclick="window.location.href='index.php'">
        <i class="fas fa-times"></i> 
    </button>

    <header>
        <h1>Bem-vindo ao Controle de Estoque</h1>
        <p>Explore as funcionalidades do nosso sistema</p>
    </header>
    
    <main>
        <div class="card-container">
            <div class="card">
                <h2>Gerenciar Produtos</h2>
                <p>Adicione, edite ou exclua produtos do seu estoque.</p>
                <a href="../pages/index.php" class="btn">Explorar</a>
            </div>
            <div class="card">
                <h2>Relatórios</h2>
                <p>Visualize relatórios detalhados sobre o seu estoque.</p>
                <a href="../pages/relatorios.php" class="btn">Ver Relatórios</a>
            </div>
            <div class="card">
                <h2>Configurações</h2>
                <p>Ajuste as preferências do sistema de acordo com suas necessidades.</p>
                <a href="../pages/preferencias.php" class="btn">Acessar Configurações</a>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="../img/pobre.png" alt="Logo da Empresa" />
                <p>&copy; Copyright 2024 CINK SANO. Gestão de Estoque.</p>
            </div>
            <div class="footer-links">
                <h3>Links Úteis</h3>
                <ul>
                    <li><a href="../pages/index.php">Início</a></li>
                    <li><a href="../pages/sobre.php">Sobre Nós</a></li>
                    <li><a href="../pages/contato.php">Contato</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Redes Sociais</h3>
                <a href="##########" target="_blank" class="social-icon">
                    <img src="../img/in.png" alt="Instagram" />
                </a>
                <a href="##########" target="_blank" class="social-icon">
                    <img src="../img/face.png" alt="Facebook" />
                </a>
                <a href="##########" target="_blank" class="social-icon">
                    <img src="../img/tiw.png" alt="Twitter" />
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
