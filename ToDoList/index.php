<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    use App\utils\FlashMessage;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>To do it - Entrar</title>
    <?php include('partials/_head.php') ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <!-- código html da aplicação vai aqui -->
    <div id="login">
        <div class="container">
            <?= FlashMessage::getMessage() ?>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6 ">
                    <div id="login-box" class="col-md-12 rounded">
                        <form id="login-form" class="form" action="/usuarios/login.php" method="POST">
                            <h4 class="text-center text-info">Por favor, faça login ou crie uma conta</h4>
                            <p class="text-center">Made by Ícaro</p>
                            <div class="form-group">
                                <label for="username" nameclass="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <a href="usuarios/registrar_front.php" class="btn btn-info float-right btn-sm">Registrar-se</a>
                                <input type="submit" name="submit" class="btn btn-success btn-md" value="Entrar">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('partials/_javascript_import.php') ?>
</body>

</html>