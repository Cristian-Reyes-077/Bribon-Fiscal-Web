<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    //protected $table = 'users';

    public function verificarUsuario($username, $password)
    {

        $applicationId = "1";
        
        $db = \Config\Database::connect();

        $query = $db->query("CALL auth_systems.verificar_usuario_login(?, ?, ?)", [$username, $password, $applicationId]);

        $result = $query->getRow(); // Obtener la primera fila del resultado


        if(isset($result->error)){
            return ['error'=>$result->error];
        }


        //return $result ? $result->resultado : 0; // Devolver el valor de la consulta// Retorna el usuario si existe
        return 
        [
            'user_id' => $result->usuario_id,
            'correo'=>$result->correo,
            'nombre'=>$result->nombre,
            'token'=>$result->token
        ]; // Devuelve 1 si existe, 0 si no
    }
}
