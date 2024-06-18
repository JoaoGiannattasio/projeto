<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tarefas_mes WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa do Mês</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<main class="container my-4">
    <h2 class="mb-3">Editar Tarefa do Mês</h2>
    <form action="atualizartarefames.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        <div class="form-group">
            <label for="descricao_mes">Descrição</label>
            <input type="text" class="form-control" id="descricao_mes" name="descricao" value="<?php echo htmlspecialchars($row['descricao']); ?>" required>
        </div>
        <div class="form-group">
            <label for="data_entrega">Data de Entrega</label>
            <input type="date" class="form-control" id="data_entrega" name="data_entrega" value="<?php echo htmlspecialchars($row['data_entrega']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</main>
</body>
</html>
