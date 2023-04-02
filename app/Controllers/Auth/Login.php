<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\VistaSessiones;
use PHPUnit\Framework\Constraint\IsEqualWithDelta;

class Login extends BaseController
{

    public function index()
    {
        if (!session()->is_logged) {
            return view('auth/login');
        }

        return redirect()->route('dashboard');
    }

    public function signin()
    {


        // dd($this->request->getPost());
        if (!$this->validate([
            'username' => 'required|alpha',
            'contrasenia' => 'required'
        ])) {
            return redirect()
                ->back()
                ->with('errors', $this->validator->getErrors())
                ->withInput();
        }



        $username = trim($this->request->getVar('username'));
        $password = trim($this->request->getVar('contrasenia'));

        $userModel = new UserModel();


        if (!$user = $userModel->getUserInfo('usuario', $username)) {
            return redirect()->back()->with('msg', [
                'type' => 'danger',
                'body' => 'El usuario no se encuentra registrado'
            ])->withInput();
        }

        if (!(sha1($password) == $user->password)) {
            return redirect()->back()->with('msg', [
                'type' => 'danger',
                'body' => 'Credenciales Invalidas'
            ])->withInput();
        }

        $fullName = $user->nombre . ' ' . $user->paterno;

        session()->set([
            'id_usuario' => $user->id_usuario,
            'id_persona' => $user->id_persona,
            'nombre' => $user->nombre,
            'paterno' => $user->paterno,
            'materno' => $user->materno,
            'usuario' => $user->usuario,
            'cargo' => $user->cargo,
            'email' => $user->email,
            'is_logged' => true
        ]);

        return redirect()->route('dashboard')->with('msg', [
            'type' => 'success',
            'body' => 'Bienvenido al Sistema de administración $user->nombre ' . $fullName
        ]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->route('login');
    }
}
