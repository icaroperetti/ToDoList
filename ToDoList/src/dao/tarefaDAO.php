<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;
    class TarefaDao{
        
        public static function create($userid,$titulo,$data_real,$descricao){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("INSERT INTO tarefas (titulo,data_real,descricao,userid) VALUES (:titulo,:data_real,:descricao,:userid)");
            $stmt->bindParam(':titulo',$titulo,PDO::PARAM_STR);
            $stmt->bindParam(':data_real',$data_real);
            $stmt->bindParam(':descricao',$descricao,PDO::PARAM_STR);
            $stmt->bindParam(':userid',$userid,PDO::PARAM_INT);
            return $stmt->execute();
        }

        public static function getAll($userid){
            $con = ConnectionFactory::getConnection($userid);
            $stmt = $con->prepare("SELECT tarefas.id,tarefas.id_status,tarefas.titulo,tarefas.data_real,
            tarefas.descricao FROM tarefas INNER JOIN usuarios WHERE usuarios.id = tarefas.userid AND tarefas.userid = $userid");
            $stmt->bindParam(':userid',$userid,PDO::PARAM_INT);
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

        public static function getDoneTasks($userid){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT tarefas.id,tarefas.id_status,tarefas.titulo,tarefas.data_real,
            tarefas.descricao FROM tarefas INNER JOIN usuarios WHERE usuarios.id = tarefas.userid AND tarefas.userid = $userid AND tarefas.id_status = 2");
            $stmt->bindParam(':userid',$userid,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function getPendentTasks($userid){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT tarefas.id,tarefas.id_status,tarefas.titulo,tarefas.data_real,
            tarefas.descricao FROM tarefas INNER JOIN usuarios WHERE usuarios.id = tarefas.userid AND tarefas.userid = $userid AND tarefas.id_status = 1");
            $stmt->bindParam(':userid',$userid,PDO::PARAM_INT);
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