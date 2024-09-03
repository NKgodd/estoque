<?php
session_start();
include '../db.php'; // Inclui o arquivo de conexão com o banco de dados

// Define o idioma padrão como português
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'pt';

// Atualiza o idioma com base na seleção do usuário
if (isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang'];
    $lang = $_POST['lang'];
}

// Carrega o arquivo de tradução com base no idioma
include "../lang/$lang.php"; // Carrega o arquivo de tradução

// Verifica se há uma pesquisa
$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
}

// Verifica se há uma opção de ordenação selecionada
$orderBy = 'nome'; // Valor padrão
if (isset($_POST['order_by'])) {
    $orderBy = $_POST['order_by'];
}

// Consulta os produtos com base na pesquisa e na ordenação
$sql = "SELECT * FROM produtos WHERE nome LIKE ? ORDER BY $orderBy";
$stmt = $pdo->prepare($sql);
$stmt->execute(["%$searchTerm%"]);
$produtos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferências - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/setings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Link para Font Awesome -->
</head>
<body>

<button id="close-button" class="close-button" onclick="window.location.href='../pages/index.php'">
    <i class="fas fa-times"></i>
</button>


    <div class="preferences-container">
        <!-- Formulário de Idioma -->
        <form method="post" action="">
            <label for="lang"><?php echo $translations['language']; ?>:</label>
            <select id="lang" name="lang">
                <option value="pt" <?php echo $lang == 'pt' ? 'selected' : ''; ?>>Português</option>
                <option value="en" <?php echo $lang == 'en' ? 'selected' : ''; ?>>Inglês</option>
            </select>
            <input type="submit" value="<?php echo $translations['change_language']; ?>">
        </form>

        <!-- Formulário de Pesquisa -->
        <form method="post" action="">
            <label for="search"><i class="fas fa-search"></i> <?php echo $translations['search_products']; ?>:</label>
            <input type="text" id="search" name="search" placeholder="<?php echo htmlspecialchars($translations['search_placeholder']); ?>" value="<?php echo htmlspecialchars($searchTerm); ?>">
            <input type="submit" value="Buscar">
        </form>

        <!-- Formulário de Ordenação -->
        <form method="post" action="">
            <label for="order_by"><?php echo $translations['order_by']; ?></label>
            <select id="order_by" name="order_by">
                <option value="nome" <?php echo $orderBy == 'nome' ? 'selected' : ''; ?>><?php echo $translations['alphabetical']; ?></option>
                <option value="data_entrada" <?php echo $orderBy == 'data_entrada' ? 'selected' : ''; ?>><?php echo $translations['entry_date']; ?></option>
                <option value="data_validade" <?php echo $orderBy == 'data_validade' ? 'selected' : ''; ?>><?php echo $translations['expiry_date']; ?></option>
            </select>
            <input type="submit" value="Ordenar">
        </form>

        <!-- Botão de Impressão -->
        <button onclick="window.print()"><i class="fas fa-print"></i> <?php echo $translations['print_table']; ?></button>

        <!-- Tabela de Produtos -->
        <?php if ($produtos): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Data de Validade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($produtos as $produto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                            <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                            <td><?php echo htmlspecialchars($produto['preco']); ?></td>
                            <td><?php echo htmlspecialchars($produto['data_validade']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p><?php echo $translations['no_products_found']; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
