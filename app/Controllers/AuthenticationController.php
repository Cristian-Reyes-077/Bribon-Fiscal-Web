<?php


namespace App\Controllers;


class AuthenticationController extends BaseController
{
    public function index(): string
    {
        return view('Auth/login');
    }


    public function login()
    {
        $userModel = new UserModel();
        $session = session(); // Iniciar sesión

        $username = $this->request->getPost('username');
        $password = hash('sha256', $this->request->getPost('password')); // Hashear la contraseña

        $is_valid = $userModel->validateUser($username, $password);

        if ($is_valid) {
            $verification_code = rand(100000, 999999);
            $session->set('verification_code', $verification_code);

            // Enviar código por correo
            $this->sendVerificationEmail($username, $verification_code);

            return $this->response->setJSON(['status' => 'ok', 'message' => 'Código enviado']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Usuario o contraseña incorrectos']);
        }
    }
}
