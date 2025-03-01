<?php


namespace App\Controllers;

use App\Models\UserModel;

class AuthenticationController extends BaseController
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     helper(['form', 'url']); // Puedes agregar helpers si los necesitas
    // }
    
    public function index(): string
    {
        return view('Auth/login');
    }

    public function verificarLogin()
    {
        $userModel = new UserModel();
        $session = session(); // Iniciar sesión
    
        // Verificar si ya hay una sesión activa
        if ($session->has('user_id')) {
            return $this->response->setJSON([
                'status' => 'ok',
                'message' => 'Sesión ya iniciada',
                'user_id' => $session->get('user_id')
            ]);
        }
    
        // Obtener datos del formulario
        $username = $this->request->getPost('username');
        $password = hash('sha256', $this->request->getPost('password')); // Hashear la contraseña
    
        // Verificar usuario con el Stored Procedure
        $userData = $userModel->verificarUsuario($username, $password);
    
        // Si hay un error en la autenticación
        if (isset($userData['error'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $userData['error']
            ]);
        }
    
        // Si el usuario es válido, guardar los datos en la sesión
        $session->set([
            'user_id' => $userData['user_id'],
            'correo' => $userData['correo'],
            'nombre' => $userData['nombre'],
            'token'=> $userData['token']
        ]);
    
        // Enviamos el código por correo
        $this->send_verification_email($userData['correo'], $userData['token']);

        // Aquí puedes enviar el token por correo si lo deseas
        // mail($userData['correo'], "Tu código de verificación", "Tu token es: " . $userData['token']);
    
        return $this->response->setJSON([
            'status' => 'ok',
            'message' => 'Login exitoso',
            'user_id' => $userData['user_id'],
            'nombre' => $userData['nombre'],
            'correo' => $userData['correo'],
            'token'=> $userData['token']
        ]);
    }
    
    public function verificarLogins()
    {
        $username = $this->request->getPost('username');
        $password = hash('sha256', $this->request->getPost('password')); // Hashear la contraseña

        return $this->response
            ->setHeader('Access-Control-Allow-Origin', '*')
            ->setJSON([
                'status' => 'ok',
                'message' => 'API funcionando',
                'user' => $username,
                'pass' => $password,
            ]);
    }

    public function send_verification_email($email, $code)
{
    $emailService = \Config\Services::email(); // Usa el servicio de email en CI4

    $emailService->setFrom('authentication.arquimedes@renovatiopyme.com', 'Authentication Bribon');
    $emailService->setTo($email);
    $emailService->setSubject('Código de Verificación');
    $emailService->setMessage("Tu código de verificación es: $code");

    if ($emailService->send()) {
        return true;
    } else {
        log_message('error', $emailService->printDebugger(['headers']));
        return false;
    }
}

    public function send_verification_emails($email, $code)
{
    $this->load->library('email');

    $this->email->from('tuemail@example.com', 'Tu Proyecto');
    $this->email->to($email);
    $this->email->subject('Código de Verificación');
    $this->email->message("Tu código de verificación es: $code");

    if ($this->email->send()) {
        return true;
    } else {
        log_message('error', $this->email->print_debugger());
        return false;
    }
}

}
