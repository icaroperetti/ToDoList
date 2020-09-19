<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../src/utils/FlashMessages.php');

    if($_SESSION['logado'] == false){
        FlashMessage::setMessage("Você precisa estar logado",FlashMessage::ERROR);
        header('location: /index.php');
        exit(0);
    }

?>