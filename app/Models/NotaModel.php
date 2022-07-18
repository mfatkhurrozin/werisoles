<?php

namespace App\Models;

use CodeIgniter\Model;

class NotaModel extends Model

{
    protected $table = 'nota';
    protected $primaryKey = 'id_nota';
    protected $allowedFields = ['tgl', 'nama', 'totalbayar', 'status', 'id_user', 'id_pelanggan',];

    // public function search($keyword)
    // {
    //     return $this->table('harga')->like('nama_menu', $keyword);
    // }

    public function getNota($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_nota' => $id])->first();
    }
    public function getNotaall()
    {
        return $this->db->table('pelanggan')
            ->join('nota', 'nota.id_pelanggan=pelanggan.id_pelanggan')
            // ->orderBy('nota.id_nota')
            ->get()->getResultArray();
    }
}
