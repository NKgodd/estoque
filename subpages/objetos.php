<?php
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php');
    exit;
}

include '../db.php';
include '../templates/header.php';

// Obter produtos da categoria 'objetos'
$sql = 'SELECT * FROM produtos WHERE categoria = :categoria';
$stmt = $pdo->prepare($sql);
$stmt->execute(['categoria' => 'objetos']);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Obter totais
$totals = getTotals($pdo, 'objetos');

// Determinar o comprimento do ID com base no maior ID no banco de dados
$max_id_length = 3; // Número de dígitos desejado
?>

<h2 class="lista-produtos">Lista de Objetos</h2>
<table>
    <thead>
        <tr>
            <th class="ides-table">ID</th>
            <th class="ides-table">Nome</th>
            <th class="ides-table">Quantidade</th>
            <th class="ides-table">Preço</th>
            <th class="ides-table">Valor Total</th>
            <th class="ides-table">Data de Validade</th>
            <th class="ides-table">Ações</th> 
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <?php
                $id = $produto['id'];
                $id_formatado = str_pad($id, $max_id_length, '0', STR_PAD_LEFT);
                $quantidade = $produto['quantidade'];
                $preco = $produto['preco'];
                $valor_unitario = $quantidade > 0 ? $preco * $quantidade : 0;
                ?>
                <td><?php echo htmlspecialchars($id_formatado); ?></td>
                <td>
                    <a href="../pages/relatorios.php?id=<?php echo htmlspecialchars($id); ?>" title="Ver relatório deste produto">
                        <?php echo htmlspecialchars($produto['nome']); ?>
                    </a>
                </td>
                <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                <td><?php echo htmlspecialchars(number_format($preco, 2, ',', '.')); ?></td>
                <td><?php echo htmlspecialchars(number_format($valor_unitario, 2, ',', '.')); ?></td>
                <td><?php echo htmlspecialchars($produto['data_validade']); ?></td>
                <td class="container-modficadores">
                    <a href="editar.php?id=<?php echo htmlspecialchars($produto['id']); ?>" title="Editar este produto">Editar</a>
                    <a href="excluir.php?id=<?php echo htmlspecialchars($produto['id']); ?>" title="Excluir este produto do estoque">Excluir</a>
                    <a href="adicionar_estoque.php?nome=<?php echo htmlspecialchars($produto['nome']); ?>" title="Adicionar mais produtos a este estoque">Adicionar ao Estoque</a>
                    <a class="text-total" href="../pages/comprar.php" title="Retirar determinada quantidade do produto">Retirar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="container-totais">
    <h4>Totais</h4>
    <p class="text-total">Quantidade Total: <?php echo htmlspecialchars($totals['total_quantidade']); ?></p>
    <p class="text-total">Valor Total: R$ <?php echo number_format($totals['total_valor'], 2, ',', '.'); ?></p>
</div>
<?php include '../templates/footer.php'; ?>
