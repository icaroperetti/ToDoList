<?php
    use App\dao\tarefaDAO;    
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'); 
    use App\utils\FlashMessage;
    
    $userid = $_POST['userid'];
    $titulo = $_POST['titulo'];
    $data_real = $_POST['data_real'];
    $descricao = $_POST['descricao'];

    $return = TarefaDao::create($userid,$titulo,$data_real,$descricao);
    
    if($return !== true){
        FlashMessage::setMessage('Erro ao cadastrar tarefa',FlashMessage::ERROR);
        header('location: /tarefas/new.php');
        exit(0);
    }
    FlashMessage::setMessage('Tarefa cadastrada com sucesso',FlashMessage::OK);
    header('location: /tarefas/listartarefas.php');
?>