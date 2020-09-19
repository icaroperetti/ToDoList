<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/src/utils/ConnectionFactory.php');

    class TarefaDao{
        
        public static function create($titulo,$data_real,$descricao){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("INSERT INTO tarefas (titulo,data_real,descricao) VALUES (:titulo,:data_real,:descricao)");
            $stmt->bindParam(':titulo',$titulo,PDO::PARAM_STR);
            $stmt->bindParam(':data_real',$data_real);
            $stmt->bindParam(':descricao',$descricao,PDO::PARAM_STR);
            return $stmt->execute();
        }

        public static function getAll(){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT * FROM tarefas");
            $stmt->execute();
            return $stmt;
        }

        public static function getStatusName($id){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT tarefas.id,tarefas.id_status, tarefas.titulo,tarefas.data_real,tarefas.descricao,status.status FROM tarefas INNER JOIN status WHERE tarefas.id_status = status.id AND tarefas.id = :id;");
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function getById($id){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT * FROM tarefas WHERE id = :id");
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function setTaskAsDone($id){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("UPDATE tarefas SET id_status = 2 WHERE id_status = 1 AND id = :id");
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function getDoneTasks(){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT * FROM tarefas WHERE id_status = 2");
            $stmt->execute();
            return $stmt;
        }

        public static function getPendentTasks(){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT * FROM tarefas WHERE id_status = 1");
            $stmt->execute();
            return $stmt;
        }

        public static function update($id,$titulo,$data_real,$descricao){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("UPDATE tarefas SET titulo = :titulo,data_real = :data_real,descricao = 
            :descricao WHERE id = :id");
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->bindParam(':titulo',$titulo,PDO::PARAM_STR);
            $stmt->bindParam(':data_real',$data_real);
            $stmt->bindParam(':descricao',$descricao,PDO::PARAM_STR);
            return $stmt->execute();
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("DELETE FROM tarefas WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }  
    }

?>