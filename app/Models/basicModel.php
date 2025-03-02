<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Files\File;

class basicModel extends Model {
    public $tabla = '';
    public $campos = '*';
    public $join = [];
    public $condicion = '';
    public $like = [];
    public $o = '';
    public $order = '';
    public $group = '';
    public $dir = '';
    public $limit = '';
    public $start = '';
    
    public function genericSelect($db = ''){
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        
        if($this->tabla == ''){ return false; }
        
        $q = $conectDB->table($this->tabla);
        
        if($this->campos != '*')
            $q->select($this->campos);
        if(!empty($this->join))
            $q->join($this->join[0], $this->join[1]);
        if(!empty($this->like))
            $q->like($this->like);
        if($this->condicion != '')
            $q->where($this->condicion);
        if($this->o != '')
            $q->orWhere($this->condicion);
        if($this->order != '')
            $q->orderBy($this->order, $this->dir);
        if(!empty($this->group))
            $q->groupBy($this->group);
        if($this->limit != '' && $this->start == '')
            $q->limit($this->limit);
        if($this->limit != '' && $this->start != '')
            $q->limit($this->limit, $this->start);
        
        $result = $q->get()->getResult();
        
        return $result;
    }
    
    public function genericInsert($db, $valores){
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        
        $conectDB->table($this->tabla)->insert($valores);
        $insert_id = $conectDB->insertID();
        return ($insert_id != 0) ? $insert_id : 'error';
    }
    
    public function genericUpdate($db, $valores){
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        
        $conectDB->table($this->tabla)->where($this->condicion[0], $this->condicion[1])->update($valores);
        return $conectDB->affectedRows();
    }
    
    public function genericDelete($db, $valores){
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        
        $conectDB->table($this->tabla)->where($valores)->delete();
        return $conectDB->affectedRows();
    }
    
    public function loadFile($f, $n, $d, $post, $config) {
        $file = $this->request->getFile($f);
        if ($file->isValid() && !$file->hasMoved()) {
            $sel = $post[$f . '_select'] ?? '';
            $newName = $post["userRFC"] . "-" . $n . $sel;
            $file->move($config['upload_path'], $newName);
    
            $valores = [
                'id_lead' => session('id_lead'),
                'archivo_nombre' => $file->getName(),
                'archivo_formato' => $d,
                'archivo_extencion' => $file->getExtension(),
                'archivo_peso' => $file->getSizeByUnit('kb'),
                'archivo_ruta' => 'assets/documentos/',
                'archivo_status' => 'cargado'
            ];
    
            $this->clean();
            $this->tabla = 'archivos';
            $insertProceso = $this->genericInsert('', $valores);
            return $insertProceso !== 'error';
        }
        return false;
    }
    
    public function clean(){
        $this->tabla = '';
        $this->campos = '*';
        $this->join = [];
        $this->like = [];
        $this->condicion = '';
        $this->o = '';
        $this->order = '';
        $this->group = '';
        $this->dir = '';
        $this->limit = '';
        $this->start = '';
    }
}