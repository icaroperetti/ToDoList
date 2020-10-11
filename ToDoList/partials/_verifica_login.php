<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    use App\utils\FlashMessage;

     if(isset($_SESSION['logado']) != true){
        FlashMessage::setMessage("Você precisa estar logado",FlashMessage::ERROR);
        header('location: /index.php');
        exit(0);
    }
?>
