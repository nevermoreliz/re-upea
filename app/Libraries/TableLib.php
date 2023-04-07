<?php

namespace App\Libraries;

use App\Controllers\BaseController;
use CodeIgniter\Model;

class TableLib
{

    private $model;
    private $group;
    private $columns;

    public function __construct(Model $model, string $group, array $columns)
    {
        $this->model = $model;
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
        $data = $this->model
            ->orderBy($this->getColumn($order), $direction)
            ->paginate($length, $this->group, $page);

        /**********************************
         * RETORNA EL UN ARREGLO DE ARRAY *
         **********************************/
        return [
            "draw" => $draw,
            "recordsTotal" => $this->model->countAll(),
            "recordsFiltered" => $this->model->pager->getTotal($this->group),
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
            $this->model->orLike($column, $match);
        }
    }
}
