<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Traits\PanelTrait;
use App\Models\BasicModel;
use CodeIgniter\Files\File;

class General extends BaseController
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
        $moduleName = $this->getModuleName();
        $data = $this->getPanelData($moduleName);
        $data['controlador'] = strtolower($moduleName);

        $encontrar = ["\r\n", "\n", "\r"];
        $remplazar = '';

        // Consulta - GENERAL
        $generalModel = new BasicModel();
        $respuesta = $generalModel->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'general'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $data['generalDB'] = json_decode($clean) ?: new \stdClass();

        // Consulta - FOOTER-ALIANZAS
        $alianzasModel = new BasicModel();
        $respuesta = $alianzasModel->table('contenido')
            ->select('contenido_info')
            ->where(['contenido_pagina' => 'footer', 'contenido_seccion' => 'alianzas'])
            ->findAll();
        $consulta = (!empty($respuesta)) ? $respuesta[0] : null;
        $clean = ($consulta && property_exists($consulta, 'contenido_info')) ? str_replace($encontrar, $remplazar, $consulta->contenido_info) : '';
        $data['alianzasDB'] = json_decode($clean) ?: new \stdClass();

        return $this->renderPanelView('admin/' . $data["controlador"], $data);
    }

    public function do_upload()
    {
        $this->status = 'ok';

        $configGeneral = [
            'upload_path' => FCPATH . 'assets/public/img/general',
            'allowed_types' => 'gif|jpg|jpeg|png|svg|svg+xml',
            'max_size' => 1024,
            'overwrite' => true
        ];

        $configAlianzas = [
            'upload_path' => FCPATH . 'assets/public/img/alianzas',
            'allowed_types' => 'gif|jpg|jpeg|png|svg|svg+xml',
            'max_size' => 1024,
            'overwrite' => true
        ];

        // GENERAL
        $this->valores['general'] = [];
        if (isset($_FILES['general0_fondo'])) {
            $loadBodyFondo = $this->loadFiles('general', 'fondo', ['null'], $configGeneral);
        } else {
            $loadBodyFondo = [];
        }

        if ($loadBodyFondo !== false) {
            $generalPost = $this->request->getPost('general') ?? [];
            $generalData = [
                'desc_global' => $generalPost['desc_global'] ?? '',
                'mapa' => $generalPost['mapa'] ?? '',
                'direccion' => $generalPost['direccion'] ?? '',
                'facebook' => $generalPost['facebook'] ?? '',
                'instagram' => $generalPost['instagram'] ?? '',
                'linkedin' => $generalPost['linkedin'] ?? '',
                'behance' => $generalPost['behance'] ?? '',
                'vimeo' => $generalPost['vimeo'] ?? '',
                'telefono' => $generalPost['telefono'] ?? '',
                'correo' => $generalPost['correo'] ?? '',
                'correo_pass' => $generalPost['correo_pass'] ?? '',
                'correo_form' => $generalPost['correo_form'] ?? '',
                'servicios' => $generalPost['servicios'] ?? '',
                'color_fondo' => $generalPost['color_fondo'] ?? '',
                'color_principal' => $generalPost['color_principal'] ?? '',
                'color_contraste' => $generalPost['color_contraste'] ?? '',
                'fondo' => [['img' => $loadBodyFondo[0]['file_name'] ?? '']]
            ];

            $linea = json_encode($generalData);

            if (empty($linea) || $linea === '[]' || $linea === '{}') {
                $this->errores[] = 'No hay datos válidos para actualizar en la sección general.';
                $this->status = 'error';
            } else {
                $model = new BasicModel();
                $respuesta = $model->table('contenido')
                    ->where(['contenido_pagina' => 'general'])
                    ->findAll();

                try {
                    if (!empty($respuesta)) {
                        $model->table('contenido')
                            ->update($respuesta[0]->id_contenido, ['contenido_info' => $linea]);
                    } else {
                        $model->table('contenido')
                            ->insert([
                                'contenido_info' => $linea,
                                'contenido_pagina' => 'general',
                                'contenido_seccion' => '',
                                'contenido_user' => $this->request->getPost('userID') ?? ''
                            ]);
                    }
                } catch (\Exception $e) {
                    $this->errores[] = 'Error en la base de datos (general): ' . $e->getMessage();
                    $this->status = 'error';
                }
            }
        } else {
            $this->errores[] = 'No se cargaron todas las imágenes de la sección de general.';
        }

        // ALIANZAS
        $this->valores['alianza'] = [];
        $alianzasPost = $this->request->getPost('alianzas') ?? [];
        $logos = $alianzasPost['logos'] ?? [];
        $loadAlianza = !empty($logos) ? $this->loadFiles('alianza', 'logo', $logos, $configAlianzas) : [];

        if ($loadAlianza !== false) {
            $alianzaData = [
                'titulo_general' => $alianzasPost['titulo'] ?? '',
                'logos' => array_map(fn($i, $v) => ['logo' => $loadAlianza[$i]['file_name'] ?? ''], array_keys($logos), $logos)
            ];

            $linea = json_encode($alianzaData);

            if (empty($linea) || $linea === '[]' || $linea === '{}') {
                $this->errores[] = 'No hay datos válidos para actualizar en la sección de alianzas.';
                $this->status = 'error';
            } else {
                $model = new BasicModel();
                $respuesta = $model->table('contenido')
                    ->where(['contenido_pagina' => 'footer', 'contenido_seccion' => 'alianzas'])
                    ->findAll();

                try {
                    if (!empty($respuesta)) {
                        $model->table('contenido')
                            ->update($respuesta[0]->id_contenido, ['contenido_info' => $linea]);
                    } else {
                        $model->table('contenido')
                            ->insert([
                                'contenido_info' => $linea,
                                'contenido_pagina' => 'footer',
                                'contenido_seccion' => 'alianzas',
                                'contenido_user' => $this->request->getPost('userID') ?? ''
                            ]);
                    }
                } catch (\Exception $e) {
                    $this->errores[] = 'Error en la base de datos (alianzas): ' . $e->getMessage();
                    $this->status = 'error';
                }
            }
        } else {
            $this->errores[] = 'No se cargaron todas las imágenes de alianzas.';
        }


        // Restauramos la respuesta JSON como en CI3
        return $this->response->setJSON([
            'status' => $this->status,
            'valores' => $this->valores,
            'errores' => $this->errores
        ]);
    }

    private function loadFiles($s, $it, $a, $c)
    {
        $todasCargaron = true;
        $rutaImagenes = [];
        $count = count($a);
        $this->valores[$s][$it] = [];

        for ($i = 0; $i < $count; $i++) {
            $field = $s . $i . '_' . $it;

            if (isset($_POST[$field])) {
                $rutaImagenes[] = ['file_name' => $_POST[$field]];
                $this->valores[$s][$it][$i] = 'nop';
                continue;
            }

            $file = $this->request->getFile($field);
            if (!$file) {
                $this->errores[] = "No se encontró el archivo para el campo '$field'.";
                $todasCargaron = false;
                $rutaImagenes[] = ['file_name' => ''];
                $this->valores[$s][$it][$i] = '';
                continue;
            }

            if ($file->isValid() && !$file->hasMoved()) {
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
                $this->errores[] = "El archivo '$field' no es válido o ya fue movido.";
                $todasCargaron = false;
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