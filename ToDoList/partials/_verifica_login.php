<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    use App\utils\FlashMessage;

     if($_SESSION['logado'] == false){
        FlashMessage::setMessage("Você precisa estar logado",FlashMessage::ERROR);
        header('location: /index.php');
        exit(0);
    }
?>
