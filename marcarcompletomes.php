<?php
include 'conexao.php';

$id = $_POST['id'];


$sql = "SELECT completo FROM tarefas_mes WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($completo);
$stmt->fetch();
$stmt->close();

$novo_status = $completo ? 0 : 1;

$sql = "UPDATE tarefas_mes SET completo=? WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $novo_status, $id);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Erro ao atualizar a tarefa: " . $mysqli->error;
}

$stmt->close();
$mysqli->close();
?>
