<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\TableLib;
use App\Libraries\TableLibNormal;
use App\Models\ConvenioModel;

class ConvenioNacional extends BaseController
{
    public function index()
    {
        $titleHeadPage = $data['titleHeadContent'] = 'Convenios - Nacionales';

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/convenios/nacional/index', $data);
        }

        $html = $this->templater->viewAdmin('admin/convenios/nacional/index', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => $titleHeadPage
        ]);
    }

    public function list()
    {
        $order = $this->request->getVar('order');
        $order = array_shift($order);

        $model = new ConvenioModel();

        $column_map = [
            'id_convenios',
//            'id_detalle_grupo',
//            'id_tipo_convenio',
//            'nombre_convenio',
//            'objetivo_convenio',
//            'img_convenio',
//            'pdf_convenio',
//            'tiempo_duracion',
//            'fecha_firma',
//            'fecha_finalizacion',
//            'fecha_publicacion',
//            'direccion',
//            'entidad',
//            'telefono',
//            'email',
//            'estado',
            'tiempo'
        ];

        $vistaModel = $model->vistaConveniosNacionales();
//        return $this->response->setJSON($vistaModel);

        // $lib = new TableLib($model, 'gp2', $column_map);
        $lib = new TableLibNormal('vista_convenios_nacionales', $column_map);

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

}
