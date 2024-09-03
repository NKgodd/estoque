
</main>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <img src="../img/pobre.png"  alt="Logo da Empresa" />
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

<style>
    /* Estilo do Footer */
.footer {
    background-color: #000000; /* Preto */
    color: #ffffff; /* Branco */
    padding: 30px 10px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.footer-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    max-width: 1200px;
    margin: auto;
    padding: 0 10px;
}

.footer-logo {
    margin-bottom: 20px;
    animation: fadeIn 1s ease-out;
}

.footer-logo img {
    width: 120px;
    transition: transform 0.3s, filter 0.3s;
}

.footer-logo img:hover {
    transform: scale(1.1); /* Efeito de zoom no logo ao passar o mouse */
    filter: brightness(1.2); /* Aumenta o brilho ao passar o mouse */
}

.footer-links {
    margin: 20px 0;
}

.footer-links h3 {
    margin-bottom: 10px;
    font-size: 1.3rem;
    color: #00bcd4; /* Ciano */
    position: relative;
    display: inline-block;
    padding-bottom: 5px;
}

.footer-links h3::after {
    content: '';
    display: block;
    width: 40px;
    height: 2px;
    background: #00bcd4; /* Ciano */
    margin: 5px auto;
    transition: width 0.3s ease;
}

.footer-links h3:hover::after {
    width: 80px; /* Efeito de expansão na linha ao passar o mouse */
}

.footer-links ul {
    list-style-type: none;
    padding: 0;
}

.footer-links li {
    margin: 8px 0;
}

.footer-links a {
    color: #ffffff; /* Branco */
    text-decoration: none;
    transition: color 0.3s, transform 0.3s;
    font-size: 0.9rem;
}

.footer-links a:hover {
    color: #00bcd4; /* Ciano */
    transform: translateY(-2px); /* Levanta o link ao passar o mouse */
}

.footer-social {
    margin-top: 20px;
}

.footer-social h3 {
    margin-bottom: 10px;
    font-size: 1.3rem;
    color: #00bcd4; /* Ciano */
}

.social-icon {
    margin: 0 10px;
    display: inline-block;
    transition: transform 0.3s, opacity 0.3s;
}

.social-icon img {
    width: 30px;
    height: 30px;
    opacity: 0.9;
}

.social-icon:hover {
    transform: scale(1.2); /* Aumenta o tamanho do ícone ao passar o mouse */
    opacity: 1; /* Aumenta a opacidade do ícone ao passar o mouse */
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsividade */
@media (max-width: 768px) {
    .footer-content {
        padding: 0 5px;
    }

    .footer-logo img {
        width: 100px;
    }

    .footer-links h3 {
        font-size: 1.2rem;
    }

    .footer-links a {
        font-size: 0.8rem;
    }

    .social-icon img {
        width: 25px;
        height: 25px;
    }
}

@media (max-width: 480px) {
    .footer-logo img {
        width: 80px;
    }

    .footer-links h3 {
        font-size: 1.1rem;
    }

    .footer-links a {
        font-size: 0.7rem;
    }

    .social-icon img {
        width: 20px;
        height: 20px;
    }
}

</style>
    

</body>
</html>