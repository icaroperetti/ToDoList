<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/dao/tarefaDAO.php');

    $id = $_GET['id'];

    $stmt_tar = TarefaDao::getById($id);

    $return = TarefaDao::delete($id);

    header('location: /tarefas/listartarefas.php')

?>