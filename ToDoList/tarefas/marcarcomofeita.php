<?php
     use App\dao\tarefaDAO;
     require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
     
     $id = $_GET['id'];

     $stmt = TarefaDao::setTaskAsDone($id);
    
     header('location: /tarefas/tarefaspendentes.php');
?>