<?php

include 'conexao.php';

$id = $_POST["id"];


$sql = "DELETE FROM tarefas_dia WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
  
    header("Location: index.php");
    exit();
} else {
    echo "Erro ao remover a tarefa: " . $mysqli->error;
}


$mysqli->close();


header("Location: index.php");
exit();

?>