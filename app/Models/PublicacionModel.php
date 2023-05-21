<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicacionModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'publicaciones';
    protected $primaryKey = 'id_publicaciones';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'titulo',
        'descripcion',
        'correlativo',
        'subtitulo',
        'url',
        'links',
        'tipo_publicaciones',
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

    public function getPublicacion(string $tipoPubliacacion)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('publicaciones')
            ->where('tipo_publicaciones', $tipoPubliacacion)
            ->where('estado', 1)
            ->limit(3)
            ->orderBy('id_publicaciones', 'desc')
            ->get();
        return $builder->getResultObject();
    }
}
