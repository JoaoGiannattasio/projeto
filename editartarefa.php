<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tarefas_dia WHERE id=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('i', $id);

        // Executa a consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "Nenhuma tarefa encontrada com o ID fornecido.";
                exit;
            }
        } else {
            echo "Erro ao executar a consulta.";
            exit;
        }
    } else {
        echo "Erro ao preparar a consulta.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<main class="container my-4">
    <h2 class="mb-3">Editar Tarefa</h2>
    <form action="atualizartarefa.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo htmlspecialchars($row['descricao']); ?>" required>
        </div>
        <div class="form-group">
            <label for="dia">Dia</label>
            <select class="form-control" id="dia" name="dia" required>
                <option value="Segunda-feira" <?php if ($row['dia'] == 'Segunda-feira') echo 'selected'; ?>>Segunda-feira</option>
                <option value="Terça-feira" <?php if ($row['dia'] == 'Terça-feira') echo 'selected'; ?>>Terça-feira</option>
                <option value="Quarta-feira" <?php if ($row['dia'] == 'Quarta-feira') echo 'selected'; ?>>Quarta-feira</option>
                <option value="Quinta-feira" <?php if ($row['dia'] == 'Quinta-feira') echo 'selected'; ?>>Quinta-feira</option>
                <option value="Sexta-feira" <?php if ($row['dia'] == 'Sexta-feira') echo 'selected'; ?>>Sexta-feira</option>
                <option value="Sábado" <?php if ($row['dia'] == 'Sábado') echo 'selected'; ?>>Sábado</option>
                <option value="Domingo" <?php if ($row['dia'] == 'Domingo') echo 'selected'; ?>>Domingo</option>
                <option value="Todos os dias" <?php if ($row['dia'] == 'Todos os dias') echo 'selected'; ?>>Todos os dias</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($row['quantidade']); ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</main>
</body>
</html>
