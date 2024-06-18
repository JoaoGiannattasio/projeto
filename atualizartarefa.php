<?php
include 'conexao.php';

$id = $_POST['id'];
$descricao = $_POST['descricao'];
$dia = $_POST['dia'];
$quantidade = $_POST['quantidade'];

$sql = "UPDATE tarefas_dia SET descricao=?, dia=?, quantidade=? WHERE id=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ssii', $descricao, $dia, $quantidade, $id);

if ($stmt->execute()) {
    header("Location: index.php?success=1");
} else {
    header("Location: index.php?error=1");
}
?>
