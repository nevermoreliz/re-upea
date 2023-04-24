<?php

namespace App\Libraries;

use CodeIgniter\Model;

class TableLibNormal
{

    private $table;
    // private $group;
    private $columns;
    private $db;


    public function __construct(string $table, array $columns)
    {

        $this->db = \Config\Database::connect();
        $this->table = $this->db->table($table);
        // $this->group = $group;
        $this->columns = $columns;
    }

    public function getResponseNormal(array $filters)
    {

        /**********************************
         * DESESTRUCTURAR EL ARRAY FILTER *
         **********************************/
        [
            'draw' => $draw,
            'length' => $length,
            'start' => $start,
            'order' => $order,
            'direction' => $direction,
            'search' => $search
        ] = $filters;


        /********************************************************
         * SACAMOS LA CANTIDAD DE PAGINAS CON LOS DATOS GET QUE *
         *          ENVIA LOS PARAMETROS DEL DATATABLE          *
         ********************************************************/
        $page = ceil(($start - 1) / $length + 1);


        if (!empty($search)) {
            /*************************************************
             * AGREGA A LA CONSULTA BUILDER EL FINTRO ORLIKE *
             *************************************************/
            $this->applyFilters($search);
        }
        $totalRegistro = $this->table->get()->getNumRows();

        /*********************************************************
         * RETORNA LOS DATOS DE LA CONSULTA SQL DE BASE DE DATOS *
         *               CON LA PROPIEDAD PAGINATE               *
         *********************************************************/
        $data = $this->table
            ->orderBy($this->getColumn($order), $direction)
            // ->paginate($length, $this->group, $page);
            ->limit($length, $page);

        return [
            "draw" => $draw,
//            "hola2" => $this->table->get()->getResultObject(),
//            "hola1" => $data->get()->getNumRows(),
            "hola1" => $totalRegistro,
//            "data" => $data->get()->getResultObject()
        ];
        /**********************************
         * RETORNA EL UN ARREGLO DE ARRAY *
         **********************************/
        return [
            "draw" => $draw,
            "recordsTotal" => $this->table->get()->getNumRows(),
            "recordsFiltered" => $data->get()->getNumRows(),
            "data" => $data->get()->getResultObject()
        ];
    }

    /**************************************
     * RETORNA EL INDICE DEL ARRAY COLUMS *
     **************************************/
    private function getColumn($index)
    {
        return $this->columns[$index];
    }

    /******************************************************
     * FUNCION DE PARA BUSCAR EL VALOR DE SEARCH SEGUN EL *
     *                  MAPEO DE COLUMNA                  *
     ******************************************************/
    public function applyFilters(string $match)
    {
        foreach ($this->columns as $column) {
            $this->table->orLike($column, $match);
        }
    }
}
