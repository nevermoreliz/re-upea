<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Libraries\TableLibWhere;
use App\Models\PublicacionArchivoModel;
use App\Models\PublicacionModel;

class PrensaPublicacion extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/prensa/publicacion/index');
    }

    public function list()
    {
        $order = $this->request->getVar('order');
        $order = array_shift($order);

        $model = new PublicacionModel();

        $arrayWhere = [
            'tipo_publicaciones =' => 'Publicaciones',
            'estado' => 1
        ];

        $column_map = [
            'id_publicaciones',
            'titulo',
            'descripcion',
            'correlativo',
            'subtitulo',
            'url',
            'links',
            'tipo_publicaciones',
            'fecha',
            'estado',
        ];

        $lib = new TableLibWhere($model, 'gp1', $column_map, $arrayWhere);

        $response = $lib->getResponse([
            'draw' => $this->request->getVar('draw'),
            'length' => $this->request->getVar('length'),
            'start' => $this->request->getVar('start'),
            'order' => $order['column'],
            'direction' => $order['dir'],
            'search' => $this->request->getVar('search')['value']
        ]);

        return $this->response->setJSON($response);

    }

    public function show($id)
    {

        $model = new PublicacionModel();

        $registroPublicacion = $model->find($id);

        $modelPublicacionArchivo = new PublicacionArchivoModel();
        $archivosPublicacion = $modelPublicacionArchivo
            ->where('id_publicaciones', $id)
            ->findAll();

        $data = [
            'publicacion' => $registroPublicacion,
            'archivosPublicacion' => $archivosPublicacion
        ];

        return $this->templater->viewWeb('web/prensa/publicacion/showSingle', $data);
    }
}
