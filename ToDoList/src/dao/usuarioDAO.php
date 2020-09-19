<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;

    class usuarioDAO{
        public static function create($nome,$email,$hashed_password){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("INSERT INTO usuarios (nome,email,senha) VALUES (:nome,:email,:senha)");
            $stmt->bindParam(':nome',$nome,PDO::PARAM_STR);
            $stmt->bindParam(':email',$email,PDO::PARAM_STR);
            $stmt->bindParam(':senha',$hashed_password);
            return $stmt->execute();
        }

        public static function validation($email){
            $con = ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = :email ");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt;
        }
    }

?>