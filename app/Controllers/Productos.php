<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BasicModel;
use CodeIgniter\HTTP\RedirectResponse;

class Productos extends Controller
{
    protected $basicModel;
    protected $session;

    protected const MAIN_PAGE = 'home';
    protected const MAIN_PAGE_NAME = 'Home';
    protected const SECCIONES_INTERNAS = [
        'base', 'color', 'estampados', 'lateral_color', 
        'lateral_estampados', 'espalda_color', 'espalda_estampados'
    ];
    protected const FLASH_VAR = 'flashCultura';

    public function __construct()
    {
        $this->basicModel = new BasicModel();
        $this->session = \Config\Services::session();
        helper(['url', 'form']);
    }

    private function getContent(string $pagina, string $seccion = null): \stdClass
    {
        $conditions = ['contenido_pagina' => $pagina];
        if ($seccion) {
            $conditions['contenido_seccion'] = $seccion;
        }
    
        $result = $this->basicModel->table('contenido')
            ->select('contenido_info')
            ->where($conditions)
            ->findAll();
    
        $info = $result[0]->contenido_info ?? '';
        $clean = str_replace(["\r\n", "\n", "\r"], '', $info);
        return json_decode($clean) ?: new \stdClass();
    }

    public function index(): void
    {
        $data = [
            'generalDB' => $this->getContent('general'),
            'inicioDB' => $this->getContent('home', 'inicio'),
            'titulo' => self::MAIN_PAGE_NAME,
            'actual' => self::MAIN_PAGE,
            'varFlash' => self::FLASH_VAR,
            'desc' => 'Productos | Uniformes Deportivos'
        ];

        echo view('templates/header', $data);
        echo view('public/home', $data);
        echo view('templates/footer', $data);
    }

    public function hombres(): mixed
    {
        //dd($this->request->getUri()->getSegment(1, ''));

        $data = [
            'generalDB' => $this->getContent('general'),
            'inicioDB' => $this->getContent('home', 'inicio'),
            'genero' => $this->request->getUri()->getSegment(2, ''),
            'area' => $this->request->getUri()->getSegment(3, ''),
            'valorA' => $this->request->getUri()->getSegment(4, '') ?? "",
            'titulo' => 'Productos',
            'actual' => 'productos',
            'desc' => 'Productos | Uniformes Deportivos',
            'varFlash' => self::FLASH_VAR
        ];

        $actualMainPage = "hombres_{$data['valorA']}";
        foreach (self::SECCIONES_INTERNAS as $seccion) {
            $data["{$seccion}DB"] = $this->getContent($actualMainPage, $seccion);
        }

        $view = $this->determineView($data['area'], $data['valorA'], $data['genero']);
        if ($view instanceof RedirectResponse) {
            return $view;
        }

        echo view('templates/header', $data);
        echo view($view, $data);
        echo view('templates/footer', $data);
        return null;
    }

    private function determineView(string $area, string $valorA, string $genero): string|RedirectResponse
    {
        if ($area && $valorA) {
            if ($area !== 'basico' && (isNoLoggedCustom() || isLoggedNoDataCustom())) {
                $this->session->set('urlPeticion', $this->request->getPath());
                return redirect()->to(base_url('productos/login'));
            }
            return "public/productos_{$area}_hombres_{$valorA}";
        }

        if ($area) {
            if ($area === 'basico') {
                return "public/productos_{$area}";
            }
            if (isNoLoggedCustom() || isLoggedNoDataCustom()) {
                return "public/productos_{$area}_login";
            }
            return "public/productos_{$area}_elegir";
        }

        return 'public/productos';
    }

    public function mujeres(): void
    {
        $data = [
            'generalDB' => $this->getContent('general'),
            'inicioDB' => $this->getContent('home', 'inicio'),
            'genero' => 'mujeres',
            'area' => $this->request->getSegment(3, ''),
            'valorA' => $this->request->getSegment(4, ''),
            'titulo' => self::MAIN_PAGE_NAME,
            'actual' => self::MAIN_PAGE,
            'desc' => 'Productos | Uniformes Deportivos',
            'varFlash' => self::FLASH_VAR
        ];

        $actualMainPage = "mujeres_{$data['valorA']}";
        foreach (self::SECCIONES_INTERNAS as $seccion) {
            $data["{$seccion}DB"] = $this->getContent($actualMainPage, $seccion);
        }

        echo view('templates/header', $data);
        echo view('public/productos', $data);
        echo view('templates/footer', $data);
    }

    public function ninos(): void
    {
        $data = [
            'generalDB' => $this->getContent('general'),
            'productosDB' => $this->getContent('productos', 'inicio'),
            'genero' => 'ninos',
            'area' => $this->request->getSegment(3, ''),
            'valorA' => $this->request->getSegment(4, ''),
            'titulo' => 'Productos',
            'actual' => 'productos',
            'desc' => 'Productos | Uniformes Deportivos'
        ];

        echo view('templates/header', $data);
        echo view('public/productos', $data);
        echo view('templates/footer', $data);
    }

    public function login(): RedirectResponse
    {
        $this->session->set('urlPeticion', $this->request->getPath());
        $validation = \Config\Services::validation();
        $validation->setRules([
            'correo' => 'required|valid_email',
            'equipo' => 'required|alpha_numeric_space',
            'liga' => 'required|alpha_numeric_space'
        ]);

        if (!$this->validate($validation->getRules())) {
            $this->session->set('userAlerts', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $userMail = $this->request->getPost('correo');
        $userEquipo = $this->request->getPost('equipo');
        $userLiga = $this->request->getPost('liga');

        $usuarioDB = $this->basicModel->table('usuarios')
            ->select('id_user')
            ->where('u_mail', $userMail)
            ->findAll();

        if (!empty($usuarioDB)) {
            $this->session->set([
                'idUser' => $usuarioDB[0]->id_user,
                'userMail' => $userMail,
                'userEquipo' => $userEquipo,
                'userLiga' => $userLiga
            ]);
        } else {
            $insertId = $this->basicModel->table('usuarios')
                ->insert(['u_mail' => $userMail]);
            if ($insertId) {
                $this->session->set([
                    'idUser' => $insertId,
                    'userMail' => $userMail,
                    'userEquipo' => $userEquipo,
                    'userLiga' => $userLiga
                ]);
            }
        }

        $this->session->remove(['userMailTemp', 'userEquipoTemp', 'userLigaTemp']);
        $this->session->set('userAlerts', '');
        return redirect()->to($this->session->get('urlPeticion') ?? base_url('productos'));
    }

    public function clean(): RedirectResponse
    {
        $this->session->remove('formData');
        return redirect()->to(base_url('inicio'));
    }
}