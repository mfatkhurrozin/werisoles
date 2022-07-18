<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model

{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['nama', 'alamat', 'hp'];

    public function search($keyword)
    {
        return $this->table('nama')->like('nama', $keyword);
    }

    public function getPelanggan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pelanggan' => $id])->first();
    }
    public function getPelangganall()
    {
        return $this->db->table('nota')
            ->join('pelanggan', 'nota.id_pelanggan=pelanggan.id_pelanggan')
            ->get()->getResultArray();
    }
}
