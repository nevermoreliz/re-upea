<?php

namespace App\Libraries;

use CodeIgniter\Model;

class TableLibNormal
{

    private $table;
    private $group;
    private $columns;
    private $db;


    public function __construct($table, string $group, array $columns)
    {

        $this->db = \Config\Database::connect();
        $this->table = $this->db->table($table);
        $this->group = $group;
        $this->columns = $columns;
    }

    public function getResponse(array $filters)
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

        /*********************************************************
         * RETORNA LOS DATOS DE LA CONSULTA SQL DE BASE DE DATOS *
         *               CON LA PROPIEDAD PAGINATE               *
         *********************************************************/
        $data = $this->table
            ->orderBy($this->getColumn($order), $direction)
            ->paginate($length, $this->group, $page);

        /**********************************
         * RETORNA EL UN ARREGLO DE ARRAY *
         **********************************/
        return [
            "draw" => $draw,
            "recordsTotal" => $this->table->countAll(),
            "recordsFiltered" => $this->table->pager->getTotal($this->group),
            "data" => $data
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
