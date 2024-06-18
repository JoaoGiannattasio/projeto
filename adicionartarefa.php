<?php

include 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $descricao = $_POST["descricao"];
    $dia = $_POST["dia"];
    $quantidade = $_POST["quantidade"];

   
    $sql = "INSERT INTO tarefas_dia (descricao, dia, quantidade) VALUES ('$descricao', '$dia', '$quantidade')";

    if ($mysqli->query($sql) === TRUE) {
       
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao adicionar a tarefa: " . $mysqli->error;
    }
}


$mysqli->close();
?>
