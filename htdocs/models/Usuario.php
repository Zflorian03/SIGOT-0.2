<?php

require_once __DIR__."/../config/database.php";

class Usuario{

    public function login($email,$password){

        global $conn;

        $sql="SELECT usuarios.*,roles.nombre as rol 
        FROM usuarios 
        INNER JOIN roles ON usuarios.id_rol = roles.id_rol
        WHERE email=? AND estado=1";

        $stmt=$conn->prepare($sql);
        $stmt->bind_param("s",$email);
        $stmt->execute();

        $result=$stmt->get_result();

        if($result->num_rows>0){

            $user=$result->fetch_assoc();

            if(password_verify($password,$user['password'])){

                return [
                    "success"=>true,
                    "user"=>$user
                ];
            }
        }

        return [
            "success"=>false,
            "message"=>"Credenciales incorrectas"
        ];
    }

}