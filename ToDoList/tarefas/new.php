<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    require_once('../partials/_verifica_login.php');
    use App\utils\FlashMessage;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>To do it - Cadastrar tarefa</title>
    <?php include('../partials/_head.php') ?>
</head>

<body>
    <?php require('../partials/_header.php') ?>
    <div class="container">
        <?= FlashMessage::getMessage() ?>
        <div class="row">
            <?php include('../partials/_sidebar.php') ?>
            <div class="col-md-9">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3 class="pt-5">Cadastrar nova tarefa</h3>
                            <hr />
                            <form action="/tarefas/create.php" method="POST">
                                <input type="hidden">
                                <div class="form-group row">
                                    <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="titulo" name="titulo" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="data" class="col-sm-2 col-form-label">Data</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="data" name="data_real" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                                    <div class="col-sm-10">
                                        <textarea name="descricao" id="descricao" rows="8" placeholder="Descreva aqui sua tarefa detalhadamente ou insira links, se necessário."></textarea>
                                    </div>
                                </div>
                                <p><input type="submit" value="Cadastrar" class="btn btn-success float-right"></p>
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