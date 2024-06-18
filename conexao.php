<?php

$hostname = "127.0.0.1";
$usuario = "root";
$senha = "joao";
$bancodedados = "proj";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
if ($mysqli->connect_errno) {
    echo "Falha na conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$sql_tarefas_semana = "SELECT * FROM tarefas_dia";
$result_tarefas_semana = $mysqli->query($sql_tarefas_semana);

$sql_tarefas_mes = "SELECT * FROM tarefas_mes";
$result_tarefas_mes = $mysqli->query($sql_tarefas_mes);
?>