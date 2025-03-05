<?php
namespace App\Models;

use CodeIgniter\Model;

class BasicModel extends Model
{
    protected $DBGroup = 'sistema';
    protected $table = '';
    protected $primaryKey = 'id';
    protected $allowedFields = [];
    protected $returnType = 'object';
    protected $useTimestamps = false;

    public function table($table)
    {
        $this->table = $table;

        switch ($table) {
            case 'contenido':
                $this->primaryKey = 'id_contenido';
                $this->allowedFields = [
                    'contenido_info',
                    'contenido_pagina',
                    'contenido_seccion',
                    'contenido_user',
                    'contenido_time',
                    'contenido_activo'
                ];
                $this->useTimestamps = true;
                $this->createdField = 'contenido_time';
                $this->updatedField = 'contenido_time';
                break;
            case 'archivos':
                $this->primaryKey = 'id_archivo';
                $this->allowedFields = [
                    'id_lead',
                    'archivo_nombre',
                    'archivo_formato',
                    'archivo_extencion',
                    'archivo_peso',
                    'archivo_ruta',
                    'archivo_status'
                ];
                break;
            default:
                $this->allowedFields = [];
        }

        return $this;
    }

    public function select($fields)
    {
        $this->builder()->select($fields);
        return $this;
    }

    public function where($condition)
    {
        $this->builder()->where($condition);
        return $this;
    }

    public function findAll(int $limit = null, int $offset = 0)
    {
        if (empty($this->table)) {
            throw new \RuntimeException('You must set the database table to be used with your query.');
        }

        $builder = $this->builder();
        if ($limit) {
            $builder->limit($limit, $offset);
        }

        $result = $builder->get()->getResult();
        // No limpiamos el builder aquí para mantener el estado si se encadena
        return $result;
    }

    public function update($id = null, $data = null): bool
    {
        if (empty($this->table)) {
            throw new \RuntimeException('You must set the database table to be used with your query.');
        }

        if (empty($data)) {
            throw new \RuntimeException('No data provided for update.');
        }

        $builder = $this->db->table($this->table); // Usamos una nueva instancia del Query Builder

        if ($id !== null) {
            $builder->where($this->primaryKey, $id);
        } else {
            throw new \RuntimeException('An ID or WHERE condition is required for update.');
        }

        return $builder->update($data);
    }

    public function insert($data = null, bool $returnID = true)
    {
        if (empty($this->table)) {
            throw new \RuntimeException('You must set the database table to be used with your query.');
        }

        if (empty($data)) {
            throw new \RuntimeException('No data provided for insert.');
        }

        return parent::insert($data, $returnID);
    }

    public function genericSelect($db = '')
    {
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);

        if (empty($this->table)) {
            throw new \RuntimeException('You must set the database table to be used with your query.');
        }

        $builder = $conectDB->table($this->table);
        return $builder->get()->getResult();
    }

    public function genericInsert($db, $valores)
    {
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        $conectDB->table($this->table)->insert($valores);
        $insertId = $conectDB->insertID();
        return ($insertId != 0) ? $insertId : 'error';
    }

    public function genericUpdate($db, $valores)
    {
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        $builder = $conectDB->table($this->table);

        if (empty($this->condicion)) {
            throw new \RuntimeException('A WHERE condition is required for genericUpdate.');
        }

        $builder->where($this->condicion)->update($valores);
        return $conectDB->affectedRows();
    }

    public function genericDelete($db, $valores)
    {
        $conectDB = ($db === '') ? $this->db : \Config\Database::connect($db);
        $conectDB->table($this->table)->where($valores)->delete();
        return $conectDB->affectedRows();
    }

    public function loadFile($f, $n, $d, $post, $config)
    {
        $file = $this->request->getFile($f);
        if ($file && $file->isValid() && !$file->hasMoved()) {
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

            $this->table('archivos');
            return $this->insert($valores);
        }
        return false;
    }

    public function getAdminSettings()
    {
        return [];
    }
}