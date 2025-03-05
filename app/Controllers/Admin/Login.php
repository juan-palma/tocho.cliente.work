<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\BasicModel;
use App\Libraries\IdaProtect;

class Login extends BaseController
{
    protected $admin_model;
    protected $basic_model;
    protected $session;
    protected $ida_protect;
    protected $validation;
    public $varFlash = 'flashLogin';
    public $success = [];
    public $error = [];

    public function __construct()
    {
        $this->admin_model = new AdminModel();
        $this->basic_model = new BasicModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->ida_protect = new IdaProtect();
    }

    public function index()
    {
        // Verificar si es una solicitud POST
        if ($this->request->getMethod() === 'POST') {
            // Reglas de validación de form_validation.php en CI3
            $rules = [
                'username' => [
                    'label' => 'Usuario',
                    'rules' => 'required|alpha_numeric'
                ],
                'password' => [
                    'label' => 'Contraseña',
                    'rules' => 'required'
                ]
            ];

            // Ejecutar la validación
            if ($this->validate($rules)) {
                $redir = '';
                $post = $this->request->getPost(null, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if ($post['username'] !== '' && $post['password'] !== '') {
                    $result = $this->admin_model->loginValid($post['username'], $post['password']);
                    if (isset($result) && !empty($result)) {
                        $decrypted_pass = $this->ida_protect->decrypt($result[0]->user_pass);
                        if ($post['username'] === $result[0]->user_user && $post['password'] === $decrypted_pass) {
                            $userData = [
                                'userID' => $result[0]->id_user,
                                'nombre' => $result[0]->user_nombre,
                                'apaterno' => $result[0]->user_apaterno,
                                'amaterno' => $result[0]->user_amaterno,
                                'level' => $result[0]->user_level,
                                'finger' => $result[0]->fingerprint,
                                'user_code' => $result[0]->user_code
                            ];
                            $this->session->set($userData);

                            // Consulta de permisos
                            $this->admin_model->table('usuarios')
                                ->select('permisos.*')
                                ->join('permisos', 'permisos.permiso_user = usuarios.id_user')
                                ->where([
                                    'usuarios.id_user' => $result[0]->id_user,
                                    'usuarios.fingerprint' => $result[0]->fingerprint
                                ])
                                ->orderBy('permiso_orden');
                            $result = $this->admin_model->findAll();

                            $this->session->set('modulos', $result);
                            $redir = base_url('admin/panel');
                        } else {
                            $this->error[] = 'No son válidos los datos que proporcionó, verifique su usuario y contraseña y trate de nuevo.';
                            $redir = current_url();
                        }
                    } else {
                        $this->error[] = 'No son válidos los datos que proporcionó, verifique su usuario y contraseña y trate de nuevo.';
                        $redir = current_url();
                    }
                } else {
                    $this->error[] = 'Está vacío el campo de usuario o contraseña';
                    $redir = current_url();
                }

                $this->session->setFlashdata($this->varFlash . 'Success', $this->success);
                $this->session->setFlashdata($this->varFlash . 'Error', $this->error);
                return redirect()->to($redir);
            } else {
                // Validación fallida, pasar errores a la vista
                $data['validation'] = $this->validator;
                print_r("primer else");
            }
        }

        // Mostrar la vista si no es POST o si la validación falla
        isLogged(); // Asegúrate de que esta función esté definida en CI4

        $fondos = get_filenames(FCPATH . 'assets/admin/img/loginBackground/');
        if ($fondos === false) {
            log_message('error', 'No se pudo leer el directorio de fondos: ' . FCPATH . 'assets/admin/img/loginBackground/');
        }
        $data['fondo'] = (!empty($fondos)) ? esc($fondos[array_rand($fondos)]) : '';
        $data['titulo'] = "Login";
        $data['varFlash'] = $this->varFlash;

        return view('admin/head', $data) .
               view('admin/login', $data) .
               view('admin/footer', $data);
    }
}