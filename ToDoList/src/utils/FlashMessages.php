<?php
    class FlashMessage {
         const OK = 'ok';
         const ERROR = 'error';
    
         public static function setMessage($mensagem, $status) {
            $_SESSION['flash_message']['mensagem'] = $mensagem;
            $_SESSION['flash_message']['status'] = $status;
        }


        public static function getMessage() {
            if(isset($_SESSION['flash_message']) && $_SESSION['flash_message']['status'] == 'ok') {
                $mensagem = $_SESSION['flash_message']['mensagem'];

                unset($_SESSION['flash_message']);
                return "<p class='alert alert-success text-center font-weight-bold'>$mensagem</p>";

            } else if (isset($_SESSION['flash_message']) && $_SESSION['flash_message']['status'] == 'error') {
                $mensagem = $_SESSION['flash_message']['mensagem'];
                unset($_SESSION['flash_message']);
                return "<p class='alert alert-danger text-center font-weight-bold'>$mensagem</p>";
            }
        }
    
       
    }
?>