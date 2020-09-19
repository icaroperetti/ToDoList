<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/dao/tarefaDAO.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../partials/_verifica_login.php');

    $stmt = TarefaDao::getPendentTasks();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>To do it - Tarefas Pendetes</title>
    <?php include('../partials/_head.php') ?>
</head>

<body>
    <?php require('../partials/_header.php')?>
    <div class="container">
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <h2 class="pt-4">Tarefas Pendentes</h2>
                <div class="row">
                    <?php while ($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                        <div class="col-md-6 tarefas">
                            <div class="card">
                                <div class="card-body rounded">
                                
                                    <?php if ($row->titulo) : ?>
                                        <h5 class="card-title"><?= $row->titulo ?></h5>
                                    <?php else : ?>
                                        <h5 class="card-title">Lembrete sem titulo</h5>
                                    <?php endif ?>

                                    <?php if ($row->descricao) : ?>
                                        <p class="card-text"><?= substr($row->descricao, 0, 70) . "..." ?></p>
                                    <?php else : ?>
                                        <p class="card-text pt-3">Descrição não adicionada nesta tarefa</p>
                                    <?php endif ?>
                                    
                                    <p class="card-text">Data:<?= date("d/m/Y",strtotime($row->data_real)) ?></p>
                                    <a href="show.php?id=<?= $row->id ?>" class="card-link btn btn-primary btn-md">Ver tarefa</a>
                                </div>

                            </div>
                        </div>

                    <?php endwhile ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>