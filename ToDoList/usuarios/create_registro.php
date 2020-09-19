<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../src/dao/usuarioDAO.php');
    require_once('../src/utils/FlashMessages.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    $stmtEmail = usuarioDAO::validation($email);

    if($stmtEmail->rowCount() > 0){
        FlashMessage::setMessage("Email já está sendo utilizado",FlashMessage::ERROR);
        header("Location: /usuarios/registrar_front.php");
        exit(0);
    }else{
        usuarioDAO::create($nome,$email,$hashed_password);
        FlashMessage::setMessage("Usuario cadastrado com sucesso!",FlashMessage::OK);
        header("Location: /index.php");
    }
    
?>