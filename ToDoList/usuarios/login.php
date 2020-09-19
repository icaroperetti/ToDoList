<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../src/dao/usuarioDAO.php');
    require_once('../src/utils/FlashMessages.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

     $stmt = usuarioDAO::validation($email);
     $user = $stmt->fetch(PDO::FETCH_OBJ);

    if($user){
        if(password_verify($senha, $user->senha)){
            $_SESSION['usuario'] = serialize($user);
            $_SESSION['logado'] = true;
            FlashMessage::setMessage('Usuário Logado com sucesso',FlashMessage::OK);
            header("location: /tarefas/listartarefas.php");
        } else{
            FlashMessage::setMessage('Senha incorreta',FlashMessage::ERROR);
            header("location: /index.php");
        }
    } else{
        FlashMessage::setMessage('Email incorreto ou inexistente',FlashMessage::ERROR);
        header("location: /index.php");
    }
    
?>