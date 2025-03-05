<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BasicModel;
use CodeIgniter\HTTP\Files\UploadedFile;

class Home extends BaseController
{
	protected $basic_model;
	protected $upload;

	public $varFlash = 'flashHome';
	public $success = [];
	public $error = [];

	public $status = [];
	public $valores = [];
	public $errores = [];

	public function __construct()
	{
		$this->basic_model = new BasicModel();
		$this->upload = \Config\Services::upload();
	}

	public function index()
	{
		if (!isLoggedIn()) {
			return redirect()->to('/login');
		}

		$data = [];
		$sections = ['inicio', 'somos', 'servicios', 'portafolio', 'clientes'];
		foreach ($sections as $section) {
			$data[$section . 'DB'] = $this->getSectionData('home', $section);
		}

		$data['titulo'] = "Home";
		$data['actual'] = "home";
		$data['varFlash'] = $this->varFlash;

		echo view('admin/head2', $data);
		echo view('admin/saveControl', $data);
		echo view('admin/home', $data);
		echo view('admin/footer2', $data);
	}

	private function getSectionData($page, $section)
	{
		$this->basic_model->clean();
		$this->basic_model->setTable('contenido');
		$this->basic_model->select('contenido_info');
		$this->basic_model->where(['contenido_pagina' => $page, 'contenido_seccion' => $section]);

		$result = $this->basic_model->first();
		if ($result) {
			$content = str_replace(["\r\n", "\n", "\r"], '', $result->contenido_info);
			return json_decode($content) ?: new \stdClass();
		}

		return new \stdClass();
	}

	public function send()
	{
		if (!isLoggedIn()) {
			return redirect()->to('/login');
		}

		$this->status = 'ok';

		$config = [
			'upload_path' => FCPATH . 'assets/public/img/',
			'allowed_types' => 'gif|jpg|png|svg|svg+xml',
			'max_size' => 1024,
			'overwrite' => true,
		];

		$this->upload->initialize($config);

		$todasCargaron = true;
		$rutaImagenes = [];

		foreach ($_FILES['servicios'] as $i => $v) {
			if (!$this->upload->do_upload('servicio[' . $i . '][icono]')) {
				$todasCargaron = false;
				$error = ['error' => $this->upload->display_errors()];
				print_r($error);
			} else {
				$result = $this->upload->data();
				$rutaImagenes[] = $result;
			}
		}
		print_r($rutaImagenes);

		// echo(json_encode($json));
		// session()->setFlashdata($this->varFlash . 'Success', $this->success);
		// session()->setFlashdata($this->varFlash . 'Error', $this->error);
		// return redirect()->to('/admin/home');
	}

	private function loadFiles($s, $it, $a, $c)
	{
		$this->upload->initialize($c);

		$todasCargaron = true;
		$rutaImagenes = [];
		$count = count($a);
		$this->valores[$s][$it] = [];

		for ($i = 0; $i < $count; $i++) {
			if (!isset($_POST[$s . $i . '_' . $it])) {
				if (isset($_FILES[$s . $i . '_' . $it])) {
					if ($_FILES[$s . $i . '_' . $it]['name'] !== "" && $_FILES[$s . $i . '_' . $it]['error'] == 0) {
						if (!$this->upload->do_upload($s . $i . '_' . $it)) {
							$todasCargaron = false;
							$this->status = 'error';
							$this->errores[] = $this->upload->display_errors();
							$rutaImagenes[]['file_name'] = '';
							$this->valores[$s][$it][$i] = '';
						} else {
							$result = $this->upload->data();
							$rutaImagenes[] = $result;
							$this->valores[$s][$it][$i] = $result['file_name'];
						}
					} else {
						$rutaImagenes[]['file_name'] = '';
						$this->valores[$s][$it][$i] = '';
					}
				} else {
					$rutaImagenes[]['file_name'] = '';
					$this->valores[$s][$it][$i] = '';
				}
			} else {
				$rutaImagenes[]['file_name'] = $_POST[$s . $i . '_' . $it];
				$this->valores[$s][$it][$i] = 'nop';
			}
		}

		return $todasCargaron ? $rutaImagenes : false;
	}

	public function do_upload()
	{
		$this->status = 'ok';

		// Process Inicio section
		$this->processSection('inicio', [
			'titulo' => $_POST['inicio']['titulo'],
			'subtexto' => $_POST['inicio']['subtexto']
		]);

		// Process Somos section
		$this->processSection('somos', [
			'titulo' => $_POST['somos']['titulo'],
			'texto' => $_POST['somos']['texto'],
			'textoBtn' => $_POST['somos']['textoBtn']
		]);

		// Process Servicios section
		$this->processSectionWithFiles('servicios', 'servicio', 'icono', $_POST['servicios']['servicio'], [
			'titulo_general' => $_POST['servicios']['titulo'],
			'textoBtn' => $_POST['servicios']['textoBtn']
		]);

		// Process Portafolios section
		$this->processSectionWithFiles('portafolios', 'portafolio', 'imagen', $_POST['portafolios']['portafolio'], [
			'titulo' => $_POST['portafolios']['titulo'],
			'textoBtn' => $_POST['portafolios']['textoBtn']
		]);

		// Process Clientes section
		$this->processSectionWithFiles('clientes', 'cliente', 'logo', $_POST['clientes']['logos'], [
			'titulo_general' => $_POST['clientes']['titulo']
		]);

		echo json_encode(['status' => $this->status, 'valores' => $this->valores, 'errores' => $this->errores]);
		$this->cleanVar();
	}

	private function processSection($section, $data)
	{
		$jsonData = json_encode($data);

		$this->basic_model->clean();
		$this->basic_model->setTable('contenido');
		$this->basic_model->select('id_contenido');
		$this->basic_model->where(['contenido_pagina' => 'home', 'contenido_seccion' => $section]);

		$result = $this->basic_model->first();

		$this->basic_model->clean();
		$this->basic_model->setTable('contenido');

		if ($result) {
			$this->basic_model->update($result->id_contenido, ['contenido_info' => $jsonData]);
		} else {
			$this->basic_model->insert([
				'contenido_info' => $jsonData,
				'contenido_pagina' => 'home',
				'contenido_seccion' => $section,
				'contenido_user' => $_POST['userID']
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
				$data[$section][] = array_merge($item, [$field => $files[$i]['file_name']]);
			}

			$this->processSection($section, $data);
		} else {
			$this->errores[] = 'No se cargaron todas las imágenes de la sección de ' . $section . '.';
		}
	}

	private function cleanVar()
	{
		$this->status = [];
		$this->valores = [];
		$this->errores = [];
	}
}
