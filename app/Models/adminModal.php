<?php
namespace App\Models;

use CodeIgniter\Model;

class adminModal extends Model
{
    protected $table = 'usuarios';

    public function loginValid($user, $pass)
    {
        $query = $this->db->table($this->table)
                          ->where('user_user', $user)
                          ->get();
        return $query->getResult();
    }

    public function loadModule($id, $fp)
    {
        $query = $this->db->table($this->table)
                          ->where(['id_user' => $id, 'fingerprint' => $fp])
                          ->get();
        return $query->getResult();
    }

    public function is_logged()
    {
        $name = session()->get('nombreUser');
        if (empty($name)) {
            session()->destroy();
            return redirect()->to(base_url('admin'));
        }
    }

    public function has_permission()
    {
        $idUser = session()->get('idUser');
        if (empty($idUser) || $idUser != 1) {
            return redirect()->to(base_url('admin/home'));
        }
    }
}