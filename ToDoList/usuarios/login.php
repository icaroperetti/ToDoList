<?php
    use App\dao\usuarioDAO;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    use App\utils\FlashMessage;

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = usuarioDAO::validation($email);
    $user = $stmt->fetch(PDO::FETCH_OBJ);


    if($user){
        if(password_verify($senha, $user->senha)){
            $_SESSION['usuario'] = serialize($user);
            $_SESSION['logado'] = true;
            $_SESSION['userid'] = $user->id;
            FlashMessage::setMessage('Usuário Logado com sucesso',FlashMessage::OK);
            echo $user->id;
            header("location: /tarefas/listartarefas.php");
        } else{
            FlashMessage::setMessage('Credenciais incorretas',FlashMessage::ERROR);
            header("location: /index.php");
        }
    } else{
        FlashMessage::setMessage('Email não cadastrado no nosso sistema',FlashMessage::ERROR);
        header("location: /index.php");
    }
    
?>