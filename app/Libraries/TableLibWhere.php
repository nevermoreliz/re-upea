<?php

namespace App\Libraries;

use CodeIgniter\Model;

class TableLibWhere
{
    private $model;
    private $group;
    private $columns;
    private $arrayWhere;

    public function __construct(Model $model, string $group, array $columns, array $arrayWhere = [])
    {
        $this->model = $model;
        $this->group = $group;
        $this->columns = $columns;
        $this->arrayWhere = $arrayWhere;
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
            ->where($this->arrayWhere)
            ->orderBy($this->getColumn($order), $direction)
            ->paginate($length, $this->group, $page);

        /**********************************
         * RETORNA EL UN ARREGLO DE ARRAY *
         **********************************/
        return [
            "draw" => $draw,
            "recordsTotal" => $this->model->countAll(),
            "recordsFiltered" => $this->model->pager->getTotal($this->group),
            "data" => $data,
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
            $this->model->where($this->arrayWhere);
        }

    }

    public function applyWhere(array $match)
    {
        $this->model->where($match);
    }


}

/* estructura para consultar modelos datatable */

//        $model = new EnlaceModel();
//
//        $column_map = [
//            'id_enlace',
//            'orden',
//            'url_enlace',
//            'links_enlace',
//            'nombre_enlace',
//            'tipo_enlace',
//            'telefono',
//            'fax',
//            'fecha',
//            'estado'
//        ];
//
//        $lib = new TableLib($model, 'gp1', $column_map);
