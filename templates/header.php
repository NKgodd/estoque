<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/report.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/nav-bar.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gestão de Estoque</title>
    <script src="../js/app.js" defer></script>

</head>
    <body>
            <nav class="navbar">
                <img src="../img/adm.png" width="80" height="80" alt="Logo">
                <div class="navbar-container">
                    <a href="index.php" class="navbar-logo">
                        <i class="fas fa-store"></i> Gestão de Estoque
                    </a>
                    <ul class="navbar-menu">
                        <li><a href="../pages/home.php"><i class="fas fa-home"></i>Home</a></li>
                        <li><a href="../pages/adicionar.php" title="Adicionar novo produto ao controle de estoque."><i class="fas fa-plus"></i>Adicionar</a></li>
                        <li><a href="../pages/contato.php"><i class="fas fa-envelope"></i>Contato</a></li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-ellipsis-h"></i>Mais</a>
                            <div class="dropdown-content">
                                <a href="../pages/ueps.php"><i class="fas fa-user"></i>UEPS</a>
                                <a href="#"><i class="fas fa-cogs"></i>PEPS</a>
                                <a href="../pages/logout.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-th-list"></i>Categorias</a>
                            <div class="dropdown-content">
                                <a href="../subpages/alimentos.php"><i class="fas fa-apple-alt"></i>Alimentos</a>
                                <a href="../subpages/moveis.php"><i class="fas fa-couch"></i>Móveis</a>
                                <a href="../subpages/utensilios.php"><i class="fas fa-utensils"></i>Utensílios</a>
                                <a href="../subpages/objetos.php"><i class="fas fa-box"></i>Objetos</a>
                                <a href="../subpages/historico.php"><i class="fas fa-box"></i>Histórico</a>
                            </div>
                        </li>
                    </ul>
                    <div class="navbar-toggle" id="mobile-menu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
            </nav>
</body>
</html>
