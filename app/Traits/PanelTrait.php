<?php
namespace App\Traits;

use App\Models\BasicModel;

trait PanelTrait
{
    protected $basic_model;
    protected $session;
    protected $success = [];
    protected $error = [];

    /**
     * Inicializa propiedades comunes
     */
    public function initPanel()
    {
        $this->session = session();
        $this->basic_model = new BasicModel();
    }

    /**
     * Obtiene datos comunes del panel
     */
    protected function getPanelData(string $moduleName = 'panel'): array
    {
        //$adminData = $this->basic_model->getAdminSettings();
        //$adminLogo = $adminData['adminLogo'] ?? '';
        $adminLogo = "";

        $customModuleIcon = [
            'general' => (object)['label' => 'General', 'icono' => 'fas fa-window-maximize'],
            'home' => (object)['label' => 'Home', 'icono' => 'fa fa-home'],
            'hombres_sudadera' => (object)['label' => 'Hombre - Sudadera', 'icono' => 'fa fa-home', 'url'=>'hombre/sudadera'],
            'portafolios' => (object)['label' => 'Portafolios', 'icono' => 'fas fa-suitcase'],
            'servicios' => (object)['label' => 'Servicios', 'icono' => 'fas fa-briefcase'],
            'vacantes' => (object)['label' => 'Vacantes', 'icono' => 'fas fa-newspaper']
        ];

        return [
            'titulo' => 'Panel - ' . ucfirst($moduleName),
            'actual' => $moduleName,
            'varFlash' => 'flash' . ucfirst($moduleName),
            'controlador' => strtolower($moduleName),
            'userAvatar' => $this->session->get('userAvatar'),
            'userName' => $this->session->get('nombre') . ' ' . $this->session->get('apaterno'),
            'modulos' => $this->session->get('modulos'),
            'adminLogo' => $adminLogo,
            'customModuleIcon' => $customModuleIcon
        ];
    }

    /**
     * Renderiza las vistas del panel
     */
    protected function renderPanelView(string $view, array $data = []): string
    {
        return view('admin/head2', $data)
            . view($view, $data)
            . view('admin/footer2', $data);
    }

    /**
     * Obtiene el nombre del módulo desde el controlador
     */
    protected function getModuleName(): string
    {
        $className = strtolower((new \ReflectionClass($this))->getShortName());
        return $className === 'panel' ? 'panel' : $className;
    }

    public function out()
    {
        $this->session->destroy();
        return redirect()->to(base_url('admin/login'));
    }
}