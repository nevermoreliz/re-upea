<?php

namespace App\Models;

use CodeIgniter\Model;

class EnlaceModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'enlace';
    protected $primaryKey = 'id_enlace';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'orden',
        'url_enlace',
        'links_enlace',
        'nombre_enlace',
        'tipo_enlace',
        'telefono',
        'fax',
        'fecha',
        'estado'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];


    public function getFindVistaEnlace($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_enlace')->where('id_enlace', $id)->get();
        return $builder->getFirstRow();
    }

    public function getFindAllVistaEnlace()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_enlace')->get();
        return $builder->getResultObject();
    }

    public function search($searchTerm, $perPage, $offset)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_enlace');
        $builder->like('nombre_enlace', $searchTerm);
        $builder->limit($perPage, $offset);

        return $builder->get()->getResult();
    }
}
