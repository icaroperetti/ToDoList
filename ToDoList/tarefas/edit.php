<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/dao/tarefaDAO.php');
    
    $id = $_GET['id'];
    
    $stmt = TarefaDao::getById($id);

    $tarefa = $stmt->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>To do it - Cadastrar tarefa</title>
    <?php include('../partials/_head.php') ?>
</head>

<body>
 <?php require('../partials/_header.php')?>
    <div class="container">
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3 class="pt-5">Atualizar tarefa</h3>
                            <hr/>
                            <form action="/tarefas/update.php" method="POST">
                                <input type="hidden" name="id" value="<?= $tarefa->id ?>">
                                <div class="form-group row">
                                    <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $tarefa->titulo ?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="data" class="col-sm-2 col-form-label">Data</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="data" name="data_real" value="<?= $tarefa->data_real ?>"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                                    <div class="col-sm-10">
                                        <textarea name="descricao" id="descricao" rows="8"><?= $tarefa->descricao ?></textarea>
                                    </div>
                                </div>
                                <p><input type="submit" value="Atualizar" class="btn btn-success float-right"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../partials/_javascript_import.php') ?>
</body>
</html>