<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $stmt = $mysqli->prepare("DELETE FROM tarefas_mes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Tarefa removida com sucesso!";
    } else {
        echo "Erro ao remover tarefa: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
header("Location: index.php");
exit;
?>
