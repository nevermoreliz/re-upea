<?php

namespace App\Libraries;


class TableLibJoinTable
{
    protected $builder;
    protected array $joins;
    protected string $table;
    protected array $columns;
    protected $db;

    public function __construct(string $table, array $joins = [], array $columns = [])
    {
        $this->table = $table;
        $this->joins = $joins;
        $this->columns = $columns;

        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getResponse(
        array $filters
    ): array
    {
        // Obtener parámetros de búsqueda, paginación y ordenamiento
        [
            'draw' => $draw,
            'length' => $length,
            'start' => $start,
            'order' => $orderByColumn,
            'direction' => $orderByDirection,
            'search' => $searchValue
        ] = $filters;

        $totalRecords = $this->builder->countAllResults();


        $filteredRecords = $this->builder->countAllResults(false);

        /* recorrer joins existentes */
        foreach ($this->joins as $join) {
            $this->builder->join($join['table'], $join['on'], $join['type']);
        }

        $this->builder->select($this->columns);
        $this->builder->orderBy($this->getColumn($orderByColumn), $orderByDirection);

        // Realizar búsqueda
        if (!empty($searchValue)) {
            $this->applyFilters($searchValue);
        }

        $this->builder->limit($length, $start);
        $results = $this->builder->get()->getResult();

        return [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $results,
        ];
    }


    /**************************************
     * RETORNA EL INDICE DEL ARRAY COLUMS *
     **************************************/
    private function getColumn($index)
    {

        $array = explode(" ", $this->columns[$index]);

        if (count($array) >= 1) {
            return $array[1];
        } else {
            return $array[0];
        }

    }
//

    /******************************************************
     * FUNCION DE PARA BUSCAR EL VALOR DE SEARCH SEGUN EL *
     *                  MAPEO DE COLUMNA                  *
     ******************************************************/
    public function applyFilters(string $match)
    {
        $this->builder->groupStart();
        foreach ($this->columns as $column) {
            $aul = explode(" ", $column);
            $this->builder->orLike($aul[0], $match);
            //$this->builder->orWhere($column, $searchValue);
        }
        $this->builder->groupEnd();
    }

}


/* listar columnas para select de la tabla */
//$column_map = [
//    '0' => 'e.id_enlace id_enlace',
//    '1' => 'orden',
//    '2' => 'url_enlace',
//    '3' => 'links_enlace',
//    '4' => 'nombre_enlace',
//    '5' => 'tipo_enlace',
//    '6' => 'telefono',
//    '7' => 'fax',
//    '8' => 'fecha',
//    '9' => 'e.estado estado'
//];


//$table = 'enlace e';


//$joins = [
//    [
//        'table' => 'dato_enlace de',
//        'on' => 'e.id_enlace = de.id_enlace',
//        'type' => 'left'
//    ],
//    [
//        'table' => 'sic_paises sp',
//        'on' => 'de.id_pais = sp.id_pais',
//        'type' => 'left'
//    ],
//    [
//        'table' => 'sic_tipo_enlaces ste',
//        'on' => 'de.id_tipo_enlace = ste.id_tipo_enlace',
//        'type' => 'left'
//    ]
//];


//$lib = new TableLibJoinTable($table, $joins, $column_map);