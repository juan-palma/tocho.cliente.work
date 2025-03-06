<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Traits\PanelTrait;
use App\Models\BasicModel;

class HombresSudadera extends BaseController
{
    use PanelTrait;

    public $mainPage = 'hombres_sudadera';
    public $mainPageName = 'Hombres_sudadera';
    public $nombrePrenda = 'sudadera';
    public $sexo = 'hombres';
    public $seccionesInternas = ['base', 'color', 'estampados', 'lateral_color', 'lateral_estampados', 'espalda_color', 'espalda_estampados'];
    public $status = [];
    public $valores = [];
    public $errores = [];

    public function __construct()
    {
        $this->initPanel();
    }

    public function index()
    {
        if ($redir = isNoLogged()) {
            return redirect()->to(base_url($redir));
        }

        $moduleName = $this->getModuleName();
        $data = $this->getPanelData($moduleName);

        $dataComp = array_map(fn($section) => [$section . 'DB' => $this->getSectionData($this->mainPage, $section)], $this->seccionesInternas);
        $dataComp = array_merge(...$dataComp);

        $fusionado = array_merge($data, $dataComp, [
            'nombrePrenda' => $this->nombrePrenda,
            'sexo' => $this->sexo
        ]);

        return $this->renderPanelView('admin/' . $this->mainPage, $fusionado);
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

    public function do_upload()
    {
        $this->status = 'ok';
        $pageMain = $this->request->getPost('pagina');
        $this->valores['sectores'] = count($this->request->getPost('sectores') ?? []);

        foreach ($this->request->getPost('sectores') ?? [] as $sector) {
            $this->valores[$sector['baseName']] = [];
            $obj = isset($sector['txts']) ? (object) $sector['txts'] : new \stdClass();
            if (isset($obj->url)) {
                $obj->url = url_title($obj->url);
            }

            $obj->imgs = (object)[];
            if (isset($sector['imgIndex'])) {
                $imgIndex_value = explode(',', $sector['imgIndex']);
                foreach ($imgIndex_value as $imgIndex) {
                    $carga = $this->loadFilesAuto($sector['imgs'][trim($imgIndex)] ?? [], $pageMain, $sector['baseName'], trim($imgIndex));
                    $obj->imgs->{trim($imgIndex)} = $carga;
                }
            }

            $query = json_encode($obj);
            $model = new BasicModel();
            $exists = $model->table('contenido')
                ->select('id_contenido')
                ->where(['contenido_pagina' => $pageMain, 'contenido_seccion' => $sector['baseName']])
                ->findAll();

            $model->table('contenido');
            if (!empty($exists)) {
                $model->update($exists[0]->id_contenido, ['contenido_info' => $query]);
            } else {
                $model->insert([
                    'contenido_info' => $query,
                    'contenido_pagina' => $pageMain,
                    'contenido_seccion' => $sector['baseName'],
                    'contenido_user' => $this->request->getPost('userID') ?? ''
                ]);
            }
        }

        return $this->response->setJSON([
            'status' => $this->status,
            'valores' => $this->valores,
            'errores' => $this->errores
        ]);
    }

    private function loadFilesAuto($c, $m, $s, $n)
    {
        $folder = $c['folder'] ?? '';
        $config = [
            'upload_path' => FCPATH . 'assets/public/img' . $folder,
            'allowed_types' => $c['type'] ?? 'gif|jpg|jpeg|png|svg|svg+xml',
            'max_size' => $c['max'] ?? 1024,
            'overwrite' => ($c['overwrite'] ?? 'false') === 'true'
        ];

        $todasCargaron = true;
        $rutaImagenes = [];
        $this->valores[$s][$n] = [];
        $f = "sectores_{$s}_imgs_{$n}";

        if (isset($c['clone'])) {
            foreach ($c['clone'] as $i => $cim) {
                $fc = "{$f}_clone{$i}";
                $file = $this->request->getFile($fc);

                if (!isset($cim['name'])) {
                    if ($file && $file->isValid() && !$file->hasMoved()) {
                        $allowedTypes = explode('|', $config['allowed_types']);
                        $maxSize = $config['max_size'] * 1024;

                        if (!in_array($file->getExtension(), $allowedTypes)) {
                            $todasCargaron = false;
                            $this->status = 'error';
                            $this->errores[] = "El tipo de archivo '{$file->getName()}' no está permitido.";
                            $rutaImagenes[$i] = '';
                            $this->valores[$s]['imgs'][$n][$i] = '';
                        } elseif ($file->getSize() > $maxSize) {
                            $todasCargaron = false;
                            $this->status = 'error';
                            $this->errores[] = "El archivo '{$file->getName()}' excede el tamaño máximo.";
                            $rutaImagenes[$i] = '';
                            $this->valores[$s]['imgs'][$n][$i] = '';
                        } else {
                            $file->move($config['upload_path'], $file->getName(), $config['overwrite']);
                            $rutaImagenes[$i] = $file->getName();
                            $this->valores[$s]['imgs'][$n][$i] = $file->getName();
                            $this->valores[$s][$n][$i] = $file->getName();
                        }
                    }
                } else {
                    $rutaImagenes[$i] = $cim['name'];
                    $this->valores[$s]['imgs'][$n][$i] = $cim['name'];
                }
            }
        } else {
            $file = $this->request->getFile($f);
            if (!isset($c['name'])) {
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $allowedTypes = explode('|', $config['allowed_types']);
                    $maxSize = $config['max_size'] * 1024;

                    if (!in_array($file->getExtension(), $allowedTypes)) {
                        $todasCargaron = false;
                        $this->status = 'error';
                        $this->errores[] = "El tipo de archivo '{$file->getName()}' no está permitido.";
                        $rutaImagenes = '';
                        $this->valores[$s]['imgs'][$n] = '';
                    } elseif ($file->getSize() > $maxSize) {
                        $todasCargaron = false;
                        $this->status = 'error';
                        $this->errores[] = "El archivo '{$file->getName()}' excede el tamaño máximo.";
                        $rutaImagenes = '';
                        $this->valores[$s]['imgs'][$n] = '';
                    } else {
                        $file->move($config['upload_path'], $file->getName(), $config['overwrite']);
                        $rutaImagenes = $file->getName();
                        $this->valores[$s]['imgs'][$n] = $file->getName();
                        $this->valores[$s][$n][] = $file->getName();
                    }
                }
            } else {
                $rutaImagenes = $c['name'];
                $this->valores[$s]['imgs'][$n] = $c['name'];
            }
        }

        return $todasCargaron ? $rutaImagenes : false;
    }

    private function clean()
    {
        session()->remove('formData');
        return redirect()->to(base_url('admin/' . $this->mainPage));
    }
}