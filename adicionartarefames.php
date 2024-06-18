<?php
include 'conexao.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST["descricao"];
    $data_entrega = $_POST["data_entrega"];

    $stmt = $mysqli->prepare("INSERT INTO tarefas_mes (descricao, data_entrega) VALUES (?, ?)");
    $stmt->bind_param("ss", $descricao, $data_entrega);

    if ($stmt->execute()) {
        echo "Tarefa adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar tarefa: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
header("Location: index.php");
exit;
?>
