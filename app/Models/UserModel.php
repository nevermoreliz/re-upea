<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Stmt\Return_;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sic_usuario';
    protected $primaryKey       = 'id_usuario';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_persona',
        'usuario',
        'password',
        'fecha_registro',
        'estado',
        'actualizado'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // obtener datos de tabla usuario
    public function getUserBy(string $column, string $value)
    {
        return $this->where($column, $value)->first();
    }

    // obtener informacion del usuario logeado
    public function getUserInfo(string $column, string $value)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('vista_sessiones')->where($column, $value)->get();
        return $builder->getFirstRow();
    }

    // obtener todo de usuario
    public function getVistaPersonalUsuarios(string $column, string $value)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('vista_personal_usuarios')->where($column, $value)->get();
        return $builder->getFirstRow();
    }

}
