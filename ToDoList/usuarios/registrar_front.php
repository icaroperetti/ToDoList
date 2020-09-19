<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../src/utils/FlashMessages.php');

  

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>To do it - Cadastrar usuario</title>
    <?php include('../partials/_head.php') ?>
</head>

<body>
<header>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/tarefas/listartarefas.php">
                <img src="/img/logo.png" class="logo" class="d-inline-block align-top" alt="Logo">
                To do it!
            </a>
        </div>
    </nav>
</header>
    <div class="container">
        <?= FlashMessage::getMessage() ?>
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="pt-5">Registrar usuário</h3>
                            <hr/>
                            <form action="/usuarios/create_registro.php" method="POST">
                                <input type="hidden">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="nome" name="nome" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="email" name="email" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descricao" class="col-sm-2 col-form-label">Senha</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="senha">
                                    </div>
                                </div>
                                <p><input type="submit" value="Cadastrar" class="btn btn-success btn-md float-right"></p>
                                
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