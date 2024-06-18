<?php

include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<header class="bg-dark text-white text-center py-4">
    <h1>Gerenciador de Tarefas</h1>
</header>

<main class="container my-4">
    <section class="buscar-tarefa mb-4">
        <h2 class="mb-3">Buscar Tarefa</h2>
        <form action="buscartarefa.php" method="get">
            <div class="form-row">
                <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="query" name="query" placeholder="Digite uma palavra-chave para tarefas da semana" required>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                </div>
            </div>
        </form>
    </section>

    <section class="buscar-tarefa-mes mb-4">
        <h2 class="mb-3">Buscar Tarefa do Mês</h2>
        <form action="buscartarefames.php" method="get">
            <div class="form-row">
                <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="query" name="query" placeholder="Digite uma palavra-chave para tarefas do mês" required>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                </div>
            </div>
        </form>
    </section>

    <section class="tarefas">
    <h2 class="mb-3">Tarefas para a semana</h2>
    <ul class="list-group">
        <?php if ($result_tarefas_semana->num_rows > 0) {
            while ($row = $result_tarefas_semana->fetch_assoc()) { ?>
                <li class="list-group-item">
                    <strong>Descrição:</strong> <?php echo htmlspecialchars($row["descricao"]); ?> - 
                    <strong>Dia:</strong> <?php echo htmlspecialchars($row["dia"]); ?> - 
                    <strong>Quantidade:</strong> <?php echo htmlspecialchars($row["quantidade"]); ?> vez(es) ao dia
                    <form action="marcarcompleto.php" method="post" class="float-right ml-2">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>">
                        <button type="submit" class="btn btn-<?php echo $row["completo"] ? 'secondary' : 'success'; ?>">
                            <?php echo $row["completo"] ? 'Não Realizada' : 'Realizada'; ?>
                        </button>
                    </form>
                    <form action="removertarefa.php" method="post" class="float-right ml-2">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                    <a href="editartarefa.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-warning float-right">Editar</a>
                </li>
            <?php }
        } else { ?>
            <li class="list-group-item">Nenhuma tarefa encontrada.</li>
        <?php } ?>
    </ul>
</section>




<section class="tarefas-mes">
    <h2 class="mb-3">Tarefas do Mês</h2>
    <ul class="list-group">
        <?php if ($result_tarefas_mes->num_rows > 0) {
            while ($row = $result_tarefas_mes->fetch_assoc()) { ?>
                <li class="list-group-item">
                    <strong>Descrição:</strong> <?php echo htmlspecialchars($row["descricao"]); ?> - 
                    <strong>Data de Entrega:</strong> <?php echo htmlspecialchars($row["data_entrega"]); ?>
                    <form action="marcarcompletomes.php" method="post" class="float-right ml-2">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>">
                        <button type="submit" class="btn btn-<?php echo $row["completo"] ? 'secondary' : 'success'; ?>">
                            <?php echo $row["completo"] ? 'Não Realizada' : 'Realizada'; ?>
                        </button>
                    </form>
                    <form action="removertarefames.php" method="post" class="float-right ml-2">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($row["id"]); ?>">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                    <a href="editartarefames.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-warning float-right">Editar</a>
                </li>
            <?php }
        } else { ?>
            <li class="list-group-item">Nenhuma tarefa encontrada.</li>
        <?php } ?>
    </ul>
</section>



    <section class="adicionar-tarefa">
        <h2 class="mb-3">Adicionar Nova Tarefa da Semana</h2>
        <form action="adicionartarefa.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                </div>
                <div class="form-group col-md-3">
        <select class="form-control" id="dia" name="dia" required>
        <option value="Segunda-feira">Segunda-feira</option>
        <option value="Terça-feira">Terça-feira</option>
        <option value="Quarta-feira">Quarta-feira</option>
        <option value="Quinta-feira">Quinta-feira</option>
        <option value="Sexta-feira">Sexta-feira</option>
        <option value="Sábado">Sábado</option>
        <option value="Domingo">Domingo</option>
        <option value="Todos os dias">Todos os dias</option>
        </select>
                </div>
                </div>
                <div class="form-group col-md-3">
                    <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Adicionar Tarefa</button>
        </form>
    </section>

    <section class="adicionar-tarefa-mes">
    <h2 class="mb-3">Adicionar Nova Tarefa do Mês</h2>
    <form action="adicionartarefames.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="descricao_mes" name="descricao" placeholder="Descrição" required>
            </div>
            <div class="form-group col-md-6">
                <input type="date" class="form-control" id="data_entrega" name="data_entrega" placeholder="Data de Entrega" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Adicionar Tarefa do Mês</button>
    </form>
</section>
