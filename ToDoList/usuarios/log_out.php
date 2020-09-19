<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    use App\utils\FlashMessage;

    unset($_SESSION['usuario']);
    session_unset();
    session_destroy();
    
    FlashMessage::setMessage("Desconectado com sucesso!",FlashMessage::OK);
    header("location: /index.php");

?>