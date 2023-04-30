<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\TableLibNormal;
use App\Models\DatoEnlaceModel;
use App\Models\EnlaceModel;
use App\Models\PaisModel;
use App\Models\TipoEnlaceModel;

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

    public function show()
    {

        if (!$this->request->isAJAX()) {
//            return $this->templater->viewAdmin('admin/enlaces/showEnlaceInfo');

            return redirect()->route('/')->back();
        }

        $id = $this->request->getGet('param');
        $model = new EnlaceModel();

        $data = [
//            'registro' => $model->find($id)
            'registro' => $model->getFindVistaEnlace($id)
        ];
        $html = $this->templater->viewAdmin('admin/enlaces/showEnlaceInfo', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Nuevo ConvenioNacional'
        ]);

    }

    public function list()
    {
        /* optener el ordenamiento y dir de datatble parametros get */
        $order = $this->request->getVar('order');
        $order = array_shift($order);


        $column_map = [
            '0' => 'id_enlace',
            '1' => 'orden',
            '2' => 'url_enlace',
            '3' => 'links_enlace',
            '4' => 'nombre_enlace',
            '5' => 'tipo_enlace',
            '6' => 'id_tipo_enlace',
            '7' => 'nombre_tipo_enlace',
            '8' => 'telefono',
            '9' => 'fax',
            '10' => 'fecha',
            '11' => 'id_dato_enlace',
            '12' => 'direccion',
            '13' => 'correo',
            '14' => 'inicio_convenio_enlace',
            '15' => 'fin_convenio_enlace',
            '16' => 'id_pais',
            '17' => 'pais',
            '18' => 'capital',
            '19' => 'continente',
            '20' => 'codigo_pais',
            '21' => 'iso',
            '22' => 'departamento',
            '23' => 'ciudad',
            '24' => 'estado'
        ];


        /* llamar la libreria de datatable para tabla normal */
        $lib = new TableLibNormal('re_vista_enlace', $column_map);

        /* enviar formato a la libreria */
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

        $tipoEnlaceModel = new TipoEnlaceModel();
        $paisesModel = new PaisModel();

        $data = [
            'tiposEnlace' => $tipoEnlaceModel->findAll(),
            'paises' => $paisesModel->where('estado', 1)->findAll()
        ];

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/enlaces/viewFormEnlace');
        }

        $html = $this->templater->viewAdmin('admin/enlaces/viewFormEnlace', $data);
        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Nuevo ConvenioNacional'
        ]);
    }

    public function store()
    {
        $reglas = [
//            'tipo_enlace' => 'required|in_list[enlace,embajada,consulado,ministerio,org_estado,org_coperacion]',
            'orden' => 'required|is_natural|min_length[1]|max_length[10]',
            'url_enlace' => 'uploaded[url_enlace]|max_size[url_enlace,1024]|mime_in[url_enlace,image/jpg,image/jpeg,image/png]',
            'links_enlace' => 'required',
            'nombre_enlace' => 'required|regex_match[/^[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ\- \s]+$/]',
            'telefono' => 'required|is_natural|is_unique[enlace.telefono]|min_length[8]|max_length[20]',
            'fax' => 'required|is_natural',
            'fecha' => 'required|valid_date[Y-m-d]',
            'estado' => 'required|in_list[0,1]',

            'direccion' => 'required|min_length[1]|max_length[500]',
            'correo' => 'required|valid_email|min_length[1]|max_length[200]',
            'id_pais' => 'required|is_not_unique[sic_paises.id_pais]',
            'departamento' => 'required|min_length[1]|max_length[300]',
            'ciudad' => 'required|min_length[1]|max_length[300]',
            'inicio_convenio_enlace' => 'required|valid_date[Y-m-d]',
            'fin_convenio_enlace' => 'required|valid_date[Y-m-d]',
            'id_tipo_enlace' => 'required|is_not_unique[sic_tipo_enlaces.id_tipo_enlace]'
        ];

        /* validacion de datos para guardar persona */
        if (!$this->validate($reglas)) {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $imgProfile = $this->request->getFile('url_enlace');

        if (!$imgProfile->isValid()) {
            $datos = [
                'orden' => trim($this->request->getPost('orden')),
                'links_enlace' => trim($this->request->getPost('links_enlace')),
                'nombre_enlace' => trim($this->request->getPost('nombre_enlace')),
                'telefono' => trim($this->request->getPost('telefono')),
                'fax' => trim($this->request->getPost('fax')),
                'fecha' => trim($this->request->getPost('fecha')),
                'estado' => trim($this->request->getPost('estado')),

                'direccion' => trim($this->request->getPost('direccion')),
                'correo' => trim($this->request->getPost('correo')),
                'id_pais' => trim($this->request->getPost('id_pais')),
                'departamento' => trim($this->request->getPost('departamento')),
                'ciudad' => trim($this->request->getPost('ciudad')),
                'inicio_convenio_enlace' => trim($this->request->getPost('inicio_convenio_enlace')),
                'fin_convenio_enlace' => trim($this->request->getPost('fin_convenio_enlace')),
                'id_tipo_enlace' => trim($this->request->getPost('id_tipo_enlace')),
            ];

        } else {

            $nameFile = $imgProfile->getRandomName();

            $datos = [
                'orden' => trim($this->request->getPost('orden')),
                'url_enlace' => 'assets/img_enlace/' . $nameFile,
                'links_enlace' => trim($this->request->getPost('links_enlace')),
                'nombre_enlace' => trim($this->request->getPost('nombre_enlace')),
                'telefono' => trim($this->request->getPost('telefono')),
                'fax' => trim($this->request->getPost('fax')),
                'fecha' => trim($this->request->getPost('fecha')),
                'estado' => trim($this->request->getPost('estado')),

                'direccion' => trim($this->request->getPost('direccion')),
                'correo' => trim($this->request->getPost('correo')),
                'id_pais' => trim($this->request->getPost('id_pais')),
                'departamento' => trim($this->request->getPost('departamento')),
                'ciudad' => trim($this->request->getPost('ciudad')),
                'inicio_convenio_enlace' => trim($this->request->getPost('inicio_convenio_enlace')),
                'fin_convenio_enlace' => trim($this->request->getPost('fin_convenio_enlace')),
                'id_tipo_enlace' => trim($this->request->getPost('id_tipo_enlace')),
            ];

            /* directorio */
            $directorio = $this->configs->pathEnlaceImg;

            if (!is_dir($directorio)) {
                // Si la carpeta no existe, crea la carpeta con los permisos 0777
                mkdir($directorio, 0777, true);
            }

            /* mover la imagen al directorio */
            $imgProfile->move($directorio, $nameFile);
        }

        $modelEnlace = new EnlaceModel();
        try {

            $idEnlace = $modelEnlace->insert($datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto al modelo enlace con los datos de $datos',
                'error' => $e
            ]);
        }

        $modelDatoEnlace = new DatoEnlaceModel();

        /* agregar el id_enlace que genero al insertar la tabla enlace */
//        $datosEnlace['id_enlace'] = $idEnlace;
        $datos['id_enlace'] = $idEnlace;

        try {
//            $modelDatoEnlace->insert($datosEnlace);
            $modelDatoEnlace->insert($datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto en la tabla de datos de enlace',
                'error' => $e
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se registro los datos al sistema correctamente.',
        ]);
    }

    public function edit()
    {
        $id = $this->request->getGet('param');
        $model = new EnlaceModel();
//        $dataView = $model->find($id);
        $dataView = $model->getFindVistaEnlace($id);

        $tipoEnlaceModel = new TipoEnlaceModel();
        $paisesModel = new PaisModel();


        $data = [
            'tiposEnlace' => $tipoEnlaceModel->findAll(),
            'paises' => $paisesModel->where('estado', 1)->findAll()
        ];

        if (!$this->request->isAJAX()) {
            return $this->templater->viewAdmin('admin/enlaces/viewFormEnlace', $data);
        }


        $html = $this->templater->viewAdmin('admin/enlaces/viewFormEnlace', $data);

        return $this->response->setJSON([
            'success' => true,
            'html' => $html,
            'title' => 'Modificar ConvenioNacional',
            'data' => $dataView
        ]);

    }

    public function update()
    {
        /* inicialicar el modelo */
        $model = new EnlaceModel();

        $hiddenId = $this->request->getPost('id_enlace');
        $id_enlace = base64_decode($hiddenId);

        $reglas = [
//            'tipo_enlace' => 'required|in_list[enlace,embajada,consulado,ministerio,org_estado,org_coperacion]',
            'orden' => 'required|is_natural|min_length[1]|max_length[10]',
            'url_enlace' => 'max_size[url_enlace,1024]|mime_in[url_enlace,image/jpg,image/jpeg,image/png]',
            'links_enlace' => 'required',
            'nombre_enlace' => 'required|regex_match[/^[\/\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ\- \s]+$/]',
            'telefono' => 'required|is_natural|is_unique[enlace.telefono,id_enlace,' . $id_enlace . ']|min_length[8]|max_length[20]',
            'fax' => 'required|is_natural',
            'fecha' => 'required|valid_date[Y-m-d]',
            'estado' => 'required|in_list[0,1]',

            'direccion' => 'required|min_length[1]|max_length[500]',
            'correo' => 'required|valid_email|min_length[1]|max_length[200]',
            'id_pais' => 'required|is_not_unique[sic_paises.id_pais]',
            'departamento' => 'required|min_length[1]|max_length[300]',
            'ciudad' => 'required|min_length[1]|max_length[300]',
            'inicio_convenio_enlace' => 'required|valid_date[Y-m-d]',
            'fin_convenio_enlace' => 'required|valid_date[Y-m-d]',
            'id_tipo_enlace' => 'required|is_not_unique[sic_tipo_enlaces.id_tipo_enlace]'
        ];

        if (!$this->validate($reglas)) {

            return $this->response->setJSON([
                'success' => false,
                'message' => 'verifique que los datos sean validas.',
                'errors' => $this->validator->getErrors()
            ]);
        }

//        $imgLogoConvenio = $this->request->getFile('url_enlace');
        $imgLogoConvenio = $this->request->getFile('url_enlace');

        if (!$imgLogoConvenio->isValid()) {
            $datos = [
                'orden' => trim($this->request->getPost('orden')),
                'links_enlace' => trim($this->request->getPost('links_enlace')),
                'nombre_enlace' => trim($this->request->getPost('nombre_enlace')),
//                'tipo_enlace' => trim($this->request->getPost('tipo_enlace')),
                'telefono' => trim($this->request->getPost('telefono')),
                'fax' => trim($this->request->getPost('fax')),
                'fecha' => trim($this->request->getPost('fecha')),
                'estado' => trim($this->request->getPost('estado')),

                'direccion' => trim($this->request->getPost('direccion')),
                'correo' => trim($this->request->getPost('correo')),
                'id_pais' => trim($this->request->getPost('id_pais')),
                'departamento' => trim($this->request->getPost('departamento')),
                'ciudad' => trim($this->request->getPost('ciudad')),
                'inicio_convenio_enlace' => trim($this->request->getPost('inicio_convenio_enlace')),
                'fin_convenio_enlace' => trim($this->request->getPost('fin_convenio_enlace')),
                'id_tipo_enlace' => trim($this->request->getPost('id_tipo_enlace')),
            ];
        } else {

            $nameFile = $imgLogoConvenio->getRandomName();

            $datos = [
                'orden' => trim($this->request->getPost('orden')),
                'url_enlace' => 'assets/img_enlace/' . $nameFile,
                'links_enlace' => trim($this->request->getPost('links_enlace')),
                'nombre_enlace' => trim($this->request->getPost('nombre_enlace')),
//                'tipo_enlace' => trim($this->request->getPost('tipo_enlace')),
                'telefono' => trim($this->request->getPost('telefono')),
                'fax' => trim($this->request->getPost('fax')),
                'fecha' => trim($this->request->getPost('fecha')),
                'estado' => trim($this->request->getPost('estado')),

                'direccion' => trim($this->request->getPost('direccion')),
                'correo' => trim($this->request->getPost('correo')),
                'id_pais' => trim($this->request->getPost('id_pais')),
                'departamento' => trim($this->request->getPost('departamento')),
                'ciudad' => trim($this->request->getPost('ciudad')),
                'inicio_convenio_enlace' => trim($this->request->getPost('inicio_convenio_enlace')),
                'fin_convenio_enlace' => trim($this->request->getPost('fin_convenio_enlace')),
                'id_tipo_enlace' => trim($this->request->getPost('id_tipo_enlace')),
            ];

            /* directorio */
            $directorio = $this->configs->pathEnlaceImg;

            /* eliminar la imagen anterior */
            $imgLogo = $model->find($id_enlace);

            if ($imgLogo == null) {
                cargarArchivo($imgLogoConvenio, $directorio, $nameFile);
            } else {
//                $imgLogoRuta = 'uploads/' . $imgLogo->url_enlace;
//                unlink($imgLogoRuta);
                borrarArchivo($imgLogo->url_enlace);
                cargarArchivo($imgLogoConvenio, $directorio, $nameFile);
            }
        }

        try {

            $model->update($id_enlace, $datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se actualizar en la tabla de enlace',
                'error' => $e
            ]);
        }

        /* consultando y trayendo un registro de la vista */
        $viewEnlace = $model->getFindVistaEnlace($id_enlace);

        /* instanciando un modelo dato_enlace */
        $modelDatoEnlace = new DatoEnlaceModel();

        try {

            $modelDatoEnlace->update($viewEnlace->id_dato_enlace, $datos);

        } catch (\ReflectionException $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'no se inserto en la tabla de "dato de enlace"',
                'error' => $e
            ]);
        }


        return $this->response->setJSON([
            'success' => true,
            'message' => 'Se actualizo los datos al sistema correctamente.',
            'a' => $datos
        ]);

    }

    public function delete()
    {
        try {
            // Código que puede generar una excepción
            $id = $this->request->getPost('param');

            $model = new EnlaceModel();
            $registro = $model->find($id);

            if ($registro->estado == 1) {
                $model->update($id, ['estado' => 0]);
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Se Deshabilito el registro correctamente.'
                ]);
            } else {
                $model->update($id, ['estado' => 1]);
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Se Habilito el registro correctamente.'
                ]);
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            // echo "Se produjo una excepción: " . $e->getMessage();
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }


    }

}
