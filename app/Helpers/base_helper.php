<?php

use App\Models\Querys;

// if (!function_exists('authenticated')) {
//     function authenticated()
//     {
//         $idUser = (\Config\Services::session())->get('id_persona');
//         $nameGroup = (\Config\Services::session())->get('nombre_grupo');
//         $user = (new Querys())->verifyUser(['id_persona' => $idUser, 'nombre_grupo' => $nameGroup])->getRowArray();
//         return (is_null($user) ? FALSE : $user);
//     }
// }

// if (!function_exists('is')) {
//     function is($nameGroup = [])
//     {
//         $roles = (new Querys())->verifyUser(['id_persona' => (\Config\Services::session())->get('id_persona'), 'nombre_grupo' => (\Config\Services::session())->get('nombre_grupo')])->getRowArray();
//         if ($roles != null) {
//             if (is_array($nameGroup)) {
//                 return in_array($roles['nombre_grupo'], $nameGroup);
//             } else {
//                 // return in_array($nombre_grupo, explode(',', preg_replace('/\s+/', '', $CI->load->get_var('usuario')['nombre_grupo'])));
//                 return ($roles['nombre_grupo'] === $nameGroup);
//             }
//         } else return false;
//     }
// }

if (!function_exists('css_tag')) {
    function css_tag($src = '', $type = 'text/css')
    {
        $css = '<st' . 'yle type="' . $type . '">';
        if (is_file(FCPATH . 'assets/css/' . $src . '.css')) {
            if (strpos($src, '://') === FALSE) {
                ob_start();
                require(FCPATH . 'assets/css/' . $src . '.' . 'css');
                $css .= ob_get_clean();
            }
        }
        $css .= '</st' . 'yle>';
        return $css;
    }
}

if (!function_exists('script_tag')) {
    function script_tag($src = '', $flashdata = NULL, $type = 'text/javascript')
    {
        $script = '<scr' . 'ipt type="' . $type . '">';
        if (is_file(FCPATH . 'assets/js/' . $src . '.js')) {
            if (strpos($src, '://') === FALSE) {
                ob_start();
                require(FCPATH . 'assets/js/' . $src . '.' . 'js');
                $script .= ob_get_clean();
            }
        }
        if (is_array($flashdata)) {
            foreach ($flashdata as $kmsg => $msg) {
                $script .= "$.toast({
                                icon: `<?php echo ((is_numeric({$kmsg}) || empty({$kmsg})) ? 'error' : {$kmsg}); ?>`,
                                heading: `<?php echo ((is_numeric({$kmsg}) || empty({$kmsg})) ? 'ERROR [' . {$kmsg} . ']' : 'INFORMACIÓN'); ?>`,
                                text: `<?php echo {$msg} ?>`,
                                position: `top-center`,
                                showHideTransition: `plain`,
                                allowToastClose: true,
                                loaderBg: `#FFF`,
                                hideAfter: 5000,
                                stack: 5 });";
            }
        }
        $script .= '</scr' . 'ipt>';
        return $script;
    }
}


if (!function_exists('createDirectory')) {
    function createDirectory(string $directorio)
    {
        if (!is_dir($directorio)) {
            // Si la carpeta no existe, crea la carpeta con los permisos 0777
            mkdir($directorio, 0777, true);
        }
    }
}

if (!function_exists('cargarArchivo')) {
    function cargarArchivo($archivo, string $directorio, string $nameFile)
    {
        if (!is_dir($directorio)) {
            // Si la carpeta no existe, crea la carpeta con los permisos 0777
            mkdir($directorio, 0777, true);
        }
        $archivo->move($directorio, $nameFile);

        return true;
    }


}

if (!function_exists('borrarArchivo')) {
    function borrarArchivo($nameFile)
    {
        $imgLogoRuta = 'uploads/' . $nameFile;
        unlink($imgLogoRuta);
        return true;
    }

}

