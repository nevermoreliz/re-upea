<?php

namespace App\Models;

use CodeIgniter\Model;

class ConvenioModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'sic_convenio';
    protected $primaryKey = 'id_convenios';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_detalle_grupo',
        'id_tipo_convenio',
        'nombre_convenio',
        'objetivo_convenio',
        'img_convenio',
        'pdf_convenio',
        'fecha_firma',
        'fecha_finalizacion',
        'tiempo_duracion',
        'fecha_publicacion',
        'direccion',
        'entidad',
        'telefono',
        'email',
        'estado',
        'tiempo'
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

    public function getFindVistaConvenioNacional($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_convenio_nacional')->where('id_convenios', $id)->get();
        return $builder->getFirstRow();
    }

    public function getFindVistaConvenioNacionalActive($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_convenio_nacional')
            ->where(['id_convenios' => $id, 'estado_convenio !=' => 'Inactivo'])
            ->get();
        return $builder->getFirstRow();
    }

    public function getFindVistaConvenioInternacional($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_convenio_internacional')->where('id_convenios', $id)->get();
        return $builder->getFirstRow();
    }

    public function getFindVistaConvenioInternacionalActive($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('re_vista_convenio_internacional')
            ->where(['id_convenios' => $id, 'estado_convenio !=' => 'Inactivo'])
            ->get();
        return $builder->getFirstRow();
    }

}
