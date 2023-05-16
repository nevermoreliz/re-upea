<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Libraries\TableLibNormal;
use App\Libraries\TableLibNormalWhere;
use App\Models\ConvenioModel;

class ConvenioNacional extends BaseController
{
    public function index()
    {
        return $this->templater->viewWeb('web/convenios/nacional/index');
    }

    public function list()
    {
        $order = $this->request->getVar('order');
        $order = array_shift($order);

        $arrayWhere = [
            'estado_convenio !=' => 'Inactivo'
        ];

        $column_map = [
            'id_convenios',
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
            'direccion_convenio',
            'entidad',
            'telefono_convenio',
            'email',
            'estado_convenio',
            'id_enlace',
            'orden',
            'url_enlace',
            'links_enlace',
            'nombre_enlace',
            'tipo_enlace',
            'telefono',
            'fax',
            'fecha',
            'id_dato_enlace',
            'direccion',
            'correo',
            'inicio_convenio_enlace',
            'fin_convenio_enlace',
            'id_pais',
            'pais',
            'capital',
            'continente',
            'codigo_pais',
            'iso',
            'estado'
        ];

        $lib = new TableLibNormalWhere('re_vista_convenio_nacional', $column_map, $arrayWhere);

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

        $model = new ConvenioModel();

        $registro = $model->getFindVistaConvenioNacionalActive($id);

        if (date('Y-m-d') > $registro->fecha_finalizacion) {
            $model->update($id, ['estado' => 'Concluido']);
            $registro = $model->getFindVistaConvenioNacionalActive($id);
        }


        $data = [
            'convenioNacional' => $registro
        ];

        return $this->templater->viewWeb('web/convenios/nacional/showSingle', $data);
    }
}
