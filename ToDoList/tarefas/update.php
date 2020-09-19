<?php
    use App\dao\TarefaDAO;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $data_real = $_POST['data_real'];
    $descricao = $_POST['descricao'];

    $return = TarefaDao::update($id,$titulo,$data_real,$descricao);

    header('location: /tarefas/listartarefas.php');
?>