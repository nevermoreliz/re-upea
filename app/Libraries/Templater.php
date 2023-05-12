<?php

namespace App\Libraries;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;

class Templater extends BaseController
{
    public $request = null;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function login()
    {
        echo view('login');
    }

    public function viewWeb($content, $data = array(), $base = "web/layout/index")
    {
        if ($this->request->isAJAX()) {
            $ajax = view($content, $data);
            return css_tag($content) . $ajax . script_tag($content);
        } else {
            $data['footer'] = view('web/layout/footer', $data);
            // $data['sidebar'] = view('web/layout/sidebar', $data);
            $data['header'] = view('web/layout/header', $data);
            $data['content'] = view($content, $data);

            $najax = view($base, $data);
            return css_tag($content) . $najax . script_tag($content);
//            return view($base, $data);
        }
    }

    public function viewAdmin($content, $data = array(), $base = "admin/layout_admin/index")
    {
        if ($this->request->isAJAX()) {
            $ajax = view($content, $data);
            return css_tag($content) . $ajax . script_tag($content);
        } else {
            $data['sidebar'] = view('admin/layout_admin/sidebar', $data);
            $data['header'] = view('admin/layout_admin/header', $data);
            $data['content'] = view($content, $data);
            $data['footer'] = view('admin/layout_admin/footer', $data);

            return view($base, $data);
        }
    }
}
