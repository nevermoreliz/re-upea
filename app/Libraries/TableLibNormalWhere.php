<?php

namespace App\Libraries;


class TableLibNormalWhere
{
    protected $db;
    protected $builder;
    protected $table;
    protected $columns;
    protected $searchable_columns;
    private $arrayWhere;

//    protected $nameTabla;

    public function __construct(string $table, array $array, array $arrayWhere = [])
    {
        // Obtener instancia de la base de datos
        $this->db = \Config\Database::connect();

        // Definir las columnas de la tabla
        $this->columns = $array;

        // Definir las columnas en las que se puede realizar búsqueda
        $this->searchable_columns = $array;

        $this->table = $table;
        $this->arrayWhere = $arrayWhere;
    }

    public function getResponse(array $filters)
    {
        // Obtener parámetros de búsqueda, paginación y ordenamiento
        [
            'draw' => $draw,
            'length' => $limit,
            'start' => $start,
            'order' => $order_col,
            'direction' => $order_dir,
            'search' => $search
        ] = $filters;

        // Definir la tabla y crear un objeto BaseBuilder para realizar la consulta

//        $this->table = $this->nameTabla;
        $this->builder = $this->db->table($this->table);

        // Realizar búsqueda
        if (!empty($search)) {
            /*************************************************
             * AGREGA A LA CONSULTA BUILDER EL FINTRO ORLIKE *
             *************************************************/
            $this->applyFilters($search);
        }


        // Definir límite y offset para paginación
        $this->builder->limit($limit, $start);

        // Definir columna y dirección para ordenamiento
        $this->builder->orderBy($this->getColumn($order_col), $order_dir);
        $this->builder->where($this->arrayWhere);
        // Obtener los datos y contar el total de registros
        $data = $this->builder->get()->getResult();
        $total = $this->db->table($this->table)->where($this->arrayWhere)->countAllResults();

        // Devolver los datos formateados
        return [
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $data
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
//

        foreach ($this->searchable_columns as $column) {
            $this->builder->orLike($column, $match);
            $this->builder->where($this->arrayWhere);
        }
    }
}
