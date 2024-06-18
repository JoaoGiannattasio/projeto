<?php
include 'conexao.php';

if (isset($_POST['id']) && isset($_POST['descricao']) && isset($_POST['data_entrega'])) {
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];
    $data_entrega = $_POST['data_entrega'];

    $sql = "UPDATE tarefas_mes SET descricao=?, data_entrega=? WHERE id=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('ssi', $descricao, $data_entrega, $id);
        
        if ($stmt->execute()) {
            header("Location: index.php?success=1");
        } else {
            echo "Erro ao atualizar a tarefa.";
        }
    } else {
        echo "Erro ao preparar a consulta.";
    }
} else {
    echo "Dados incompletos.";
}
?>
