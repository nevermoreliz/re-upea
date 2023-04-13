<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\TableLib;
use App\Models\EnlaceModel;

class Enlace extends BaseController
{
    protected $configs;

    public function __construct()
    {
        $this->configs = config('Dri');
    }

    public function index()
    {
        $titleHeadPage = $data['titleHeadContent'] = 'Lista Enlaces o Instituciones - Convenios';

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/enlaces/index', $data);
        }

        $html = $this->templater->viewAdmin('admin/enlaces/index', $data);
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

        $model = new EnlaceModel();

        $column_map = [
            'id_enlace',
            'orden',
            'url_enlace',
            'links_enlace',
            'nombre_enlace',
            'tipo_enlace',
            'telefono',
            'fax',
            'fecha',
            'estado'
        ];

        $lib = new TableLib($model, 'gp1', $column_map);
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

    public function create()
    {
        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/enlaces/viewFormEnlace');
        }

        $html = $this->templater->viewAdmin('admin/enlaces/viewFormEnlace');
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Nuevo Convenio'
        ]);
    }

    public function store()
    {
        $reglas = [
            'orden' => 'required|is_natural|min_length[1]|max_length[10]',
            'url_enlace' => 'uploaded[url_enlace]|max_size[url_enlace,1024]|mime_in[url_enlace,image/jpg,image/jpeg,image/png]',
            'links_enlace' => 'required',
            'nombre_enlace' => 'required|alpha_numeric_punct',
            'tipo_enlace' => 'required|in_list[enlace,embajada,consulado,ministerio,org_estado,org_coperacion]',
            'telefono' => 'required|is_natural|is_unique[enlace.telefono]|min_length[8]|max_length[20]',
            'fax' => 'required|is_natural',
            'fecha' => 'required|valid_date[Y-m-d]',
            'estado' => 'required|in_list[0,1]',
        ];

        /* validacion de datos para guardar persona */
        if (!$this->validate($reglas)) {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos de la persona sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $imgProfile = $this->request->getFile('url_enlace');

        if (!$imgProfile->isValid()) {
            $datos = [
                'orden' => trim($this->request->getPost('orden')),
                'links_enlace' => trim($this->request->getPost('links_enlace')),
                'nombre_enlace' => trim($this->request->getPost('nombre_enlace')),
                'tipo_enlace' => trim($this->request->getPost('tipo_enlace')),
                'telefono' => trim($this->request->getPost('telefono')),
                'fax' => trim($this->request->getPost('fax')),
                'fecha' => trim($this->request->getPost('fecha')),
                'estado' => trim($this->request->getPost('estado')),
            ];
        } else {

            $nameFile = $imgProfile->getRandomName();

            $datos = [
                'orden' => trim($this->request->getPost('orden')),
                'url_enlace' => 'assets/img_enlace/' . $nameFile,
                'links_enlace' => trim($this->request->getPost('links_enlace')),
                'nombre_enlace' => trim($this->request->getPost('nombre_enlace')),
                'tipo_enlace' => trim($this->request->getPost('tipo_enlace')),
                'telefono' => trim($this->request->getPost('telefono')),
                'fax' => trim($this->request->getPost('fax')),
                'fecha' => trim($this->request->getPost('fecha')),
                'estado' => trim($this->request->getPost('estado'))
            ];

            /* directorio */
            $directorio = $this->configs->pathEnlaceImg;

            if (!is_dir($directorio)) {
                // Si la carpeta no existe, crea la carpeta con los permisos 0777
                /*mkdir($directorio, 0777, true);*/
                mkdir($directorio, 0700, true);
            }


            /* mover la imagen al directorio */
            $imgProfile->move($directorio, $nameFile);

        }


        $modelEnlace = new EnlaceModel();
        $modelEnlace->insert($datos);


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos de la persona al sistema correctamente.'
        ]);
    }

    public function edit()
    {
        $id = $this->request->getGet('param');
        $model = new EnlaceModel();
        $data = $model->find($id);

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/enlaces/viewFormEnlace');
        }

        $html = $this->templater->viewAdmin('admin/enlaces/viewFormEnlace');
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Modificar Convenio',
            'data' => $data
        ]);
    }

    public function update()
    {

        $datos = $this->request->getGet();

        $html = $this->templater->viewAdmin('admin/enlaces/viewFormEnlace');
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Modificar Convenio'
        ]);

    }

}
