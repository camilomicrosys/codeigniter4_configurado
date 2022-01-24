<?php
namespace App\Models;

use CodeIgniter\Model;

class Loginmodel extends Model
{

    public function obtenerUsuario($data)
    {

        $usuario = $this->db->table('t_usuarios');
        $usuario->where($data);
        //si encuentra el usuario me traiga un arreglo con todos sus datos
        return $usuario->get()->getResultArray();
    }
}
