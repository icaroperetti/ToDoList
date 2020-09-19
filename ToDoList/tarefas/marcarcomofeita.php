<?php
     require_once($_SERVER['DOCUMENT_ROOT'] . '/src/dao/tarefaDAO.php');

     $id = $_GET['id'];

     $stmt = TarefaDao::setTaskAsDone($id);
    
     header('location: /tarefas/tarefaspendentes.php');
?>