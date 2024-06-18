<?php
include 'conexao.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM tarefas_mes WHERE descricao LIKE ?";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    echo "Erro na preparação da consulta: " . $mysqli->error;
    exit();
}

$search = "%" . $query . "%";
$stmt->bind_param("s", $search);
$stmt->execute();

if ($stmt->error) {
    echo "Erro na execução da consulta: " . $stmt->error;
    exit();
}

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Busca - Gerenciador de Tarefas do Mês</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header class="bg-dark text-white text-center py-4">
    <h1>Resultados da Busca</h1>
</header>

<main class="container my-4">
    <section class="resultados-busca">
        <h2 class="mb-3">Resultados para "<?php echo htmlspecialchars($query); ?>"</h2>
        <ul class="list-group">
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>
                    <li class="list-group-item">
                        <strong>Descrição:</strong> <?php echo htmlspecialchars($row["descricao"]); ?>
                    </li>
                <?php }
            } else { ?>
                <li class="list-group-item">Nenhuma tarefa encontrada.</li>
            <?php } ?>
        </ul>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </section>
</main>

<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Gerenciador de Tarefas Diárias. Todos os direitos reservados.</p>
</footer>
                
</body>
</html>

<?php
$stmt->close();
$mysqli->close();
?>
