<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/dao/tarefaDAO.php');
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php');
    require_once('../partials/_verifica_login.php');

    $id = $_GET['id'];
    $stmt_tar = TarefaDao::getById($id);


    $tarefa = $stmt_tar->fetch(PDO::FETCH_OBJ);

    $stmt_status = TarefaDao::getStatusName($id);
    $status_tarefa = $stmt_status->fetch(PDO::FETCH_OBJ);

    //Converter data do padrão americano para o BR
    $data = strtotime($tarefa->data_real);
    $format_data = date("d/m/Y",$data);
   
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include("../partials/_head.php") ?>
    <title>To do it - Ver tarefa</title>
</head>

<body>
    <!-- código html da aplicação vai aqui -->
    <?php include("../partials/_header.php") ?>
    <!-- Content -->
    <section id="content">
        <div class="container">
            <div class="row">
                <?php include("../partials/_sidebar.php") ?>
                <div class="col-md-9 show-tarefas">
                    <h2 class="pt-5"><?= $tarefa->titulo ?>
                        <a href="/tarefas/marcarcomofeita.php?id=<?=$tarefa->id ?>" class="btn btn-success btn-sm float-right">
                        <img src="/img/verificado.png"  class="d-inline-block align-top" onclick="return confirm('Realmente deseja marcar como concluida?')" title="Marcar como concluida!" alt="Marcar como concluido">
                        </a>
                    </h2>

                    <dl>

                        <dt>Data</dt>
                        <dd><?= $format_data ?></dd>

                        <dt>Status</dt>
                        <dd><?= $status_tarefa->status ?></dd>

                        <dt>Descrição</dt>
                        <dd>
                            <?php if ($tarefa->descricao) : ?>
                                <dd class="card-text"><?= $tarefa->descricao ?></dd>
                            <?php else : ?>
                                <dd class="card-text  pt-3">Descrição não adicionada nesta tarefa</dd>
                            <?php endif ?>
                        </dd>
                    </dl>
                    <a href="/tarefas/edit.php?id=<?= $tarefa->id ?>" class="btn btn-warning ">Editar</a>
                    <a href="/tarefas/destroy.php?id=<?= $tarefa->id ?>" class="btn btn-danger " onclick="return confirm('Realmente deseja exlcuir a tarefa: <?= $tarefa->titulo ?>')" >Excluir</a>
                </div>
    </section><!-- End Content -->

    <!-- incluindo scripts js -->
    <?php include("../partials/_javascript_import.php") ?>
</body>

</html>