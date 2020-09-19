<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../src/utils/FlashMessages.php');

    unset($_SESSION['usuario']);
    session_unset();
    session_destroy();
    
    FlashMessage::setMessage("Desconectado com sucesso!",FlashMessage::OK);
    header("location: /index.php");

?>