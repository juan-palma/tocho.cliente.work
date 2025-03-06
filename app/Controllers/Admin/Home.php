<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Traits\PanelTrait;
use App\Models\BasicModel;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    use PanelTrait;

    public $status = [];
    public $valores = [];
    public $errores = [];

    public function __construct()
    {
        $this->initPanel();
    }

    public function index()
    {
        if($redir = isNoLogged()) {
            return redirect()->to(base_url($redir));
        }

		$moduleName = $this->getModuleName();
        $data = $this->getPanelData($moduleName);
		
        $sections = ['inicio', 'somos', 'servicios', 'portafolio', 'clientes'];
        $dataComp = array_map(fn($section) => [$section . 'DB' => $this->getSectionData('home', $section)], $sections);
        $dataComp = array_merge(...$dataComp);

		$fusionado = array_merge($data, $dataComp);

		return $this->renderPanelView('admin/' . $data["controlador"], $fusionado);
    }

    private function getSectionData($page, $section)
    {
        $model = new BasicModel();
        $result = $model->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => $page, 'contenido_seccion' => $section])
            ->findAll();

        $content = !empty($result) ? str_replace(["\r\n", "\n", "\r"], '', $result[0]->contenido_info) : '';
        return json_decode($content) ?: new \stdClass();
    }

    public function send()
    {
        if (!isLoggedIn()) {
            return redirect()->to('/login');
        }

        // Implementar lógica de envío si es necesario
        return redirect()->to('/admin/home');
    }

    public function do_upload()
    {
        $this->status = 'ok';

        $this->processSection('inicio', [
            'titulo' => $this->request->getPost('inicio')['titulo'] ?? '',
            'subtexto' => $this->request->getPost('inicio')['subtexto'] ?? ''
        ]);

        $this->processSection('somos', [
            'titulo' => $this->request->getPost('somos')['titulo'] ?? '',
            'texto' => $this->request->getPost('somos')['texto'] ?? '',
            'textoBtn' => $this->request->getPost('somos')['textoBtn'] ?? ''
        ]);

        $this->processSectionWithFiles('servicios', 'servicio', 'icono', $this->request->getPost('servicios')['servicio'] ?? [], [
            'titulo_general' => $this->request->getPost('servicios')['titulo'] ?? '',
            'textoBtn' => $this->request->getPost('servicios')['textoBtn'] ?? ''
        ]);

        $this->processSectionWithFiles('portafolios', 'portafolio', 'imagen', $this->request->getPost('portafolios')['portafolio'] ?? [], [
            'titulo' => $this->request->getPost('portafolios')['titulo'] ?? '',
            'textoBtn' => $this->request->getPost('portafolios')['textoBtn'] ?? ''
        ]);

        $this->processSectionWithFiles('clientes', 'cliente', 'logo', $this->request->getPost('clientes')['logos'] ?? [], [
            'titulo_general' => $this->request->getPost('clientes')['titulo'] ?? ''
        ]);

        return $this->response->setJSON([
            'status' => $this->status,
            'valores' => $this->valores,
            'errores' => $this->errores
        ]);
    }

    private function processSection($section, $data)
    {
        $jsonData = json_encode($data);

        $model = new BasicModel();
        $result = $model->table('contenido')
            ->select('id_contenido')
            ->where(['contenido_pagina' => 'home', 'contenido_seccion' => $section])
            ->findAll();

        $model->table('contenido');
        if (!empty($result)) {
            $model->update($result[0]->id_contenido, ['contenido_info' => $jsonData]);
        } else {
            $model->insert([
                'contenido_info' => $jsonData,
                'contenido_pagina' => 'home',
                'contenido_seccion' => $section,
                'contenido_user' => $this->request->getPost('userID') ?? ''
            ]);
        }
    }

    private function processSectionWithFiles($section, $prefix, $field, $items, $data)
    {
        $config = [
            'upload_path' => FCPATH . 'assets/public/img/' . $section,
            'allowed_types' => 'gif|jpg|jpeg|png|svg|svg+xml',
            'max_size' => 1024,
            'overwrite' => true,
        ];

        $files = $this->loadFiles($prefix, $field, $items, $config);

        if ($files !== false) {
            $data[$section] = [];
            foreach ($items as $i => $item) {
                $data[$section][] = array_merge($item, [$field => $files[$i]['file_name'] ?? '']);
            }
            $this->processSection($section, $data);
        } else {
            $this->errores[] = 'No se cargaron todas las imágenes de la sección de ' . $section . '.';
        }
    }

    private function loadFiles($s, $it, $a, $c)
    {
        $todasCargaron = true;
        $rutaImagenes = [];
        $count = count($a);
        $this->valores[$s][$it] = [];

        for ($i = 0; $i < $count; $i++) {
            $field = $s . $i . '_' . $it;
            $file = $this->request->getFile($field);

            if (isset($_POST[$field])) {
                $rutaImagenes[] = ['file_name' => $_POST[$field]];
                $this->valores[$s][$it][$i] = 'nop';
                continue;
            }

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $allowedTypes = explode('|', $c['allowed_types']);
                $maxSize = $c['max_size'] * 1024;

                if (!in_array($file->getExtension(), $allowedTypes)) {
                    $todasCargaron = false;
                    $this->status = 'error';
                    $this->errores[] = "El tipo de archivo '{$file->getName()}' no está permitido.";
                    $rutaImagenes[] = ['file_name' => ''];
                    $this->valores[$s][$it][$i] = '';
                } elseif ($file->getSize() > $maxSize) {
                    $todasCargaron = false;
                    $this->status = 'error';
                    $this->errores[] = "El archivo '{$file->getName()}' excede el tamaño máximo permitido.";
                    $rutaImagenes[] = ['file_name' => ''];
                    $this->valores[$s][$it][$i] = '';
                } else {
                    $file->move($c['upload_path'], $file->getName(), $c['overwrite']);
                    $rutaImagenes[] = ['file_name' => $file->getName()];
                    $this->valores[$s][$it][$i] = $file->getName();
                }
            } else {
                $rutaImagenes[] = ['file_name' => ''];
                $this->valores[$s][$it][$i] = '';
            }
        }

        return $todasCargaron ? $rutaImagenes : false;
    }

    private function cleanVar()
    {
        $this->status = [];
        $this->valores = [];
        $this->errores = [];
    }
}