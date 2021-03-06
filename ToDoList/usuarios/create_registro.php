<?php
    use App\dao\usuarioDAO;
    use App\utils\FlashMessage;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
   

    if(empty($nome) || empty($email)||empty($senha)){
        FlashMessage::setMessage("Por favor, insira todos os dados para cadastro",FlashMessage::ERROR);
        header("Location: /usuarios/registrar_front.php");
        exit(0);
    }

    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmtEmail = usuarioDAO::validation(filter_var($email, FILTER_VALIDATE_EMAIL));


        if ($stmtEmail->rowCount() > 0) {
            FlashMessage::setMessage("Email já está sendo utilizado", FlashMessage::ERROR);
            header("Location: /usuarios/registrar_front.php");
            exit(0);
        } else {
            usuarioDAO::create($nome, $email, $hashed_password);
            FlashMessage::setMessage("Usuario cadastrado com sucesso!", FlashMessage::OK);
            header("Location: /index.php");
        }
    }else{
        FlashMessage::setMessage("Email inválido", FlashMessage::ERROR);
        header("Location: /usuarios/registrar_front.php");
    }
