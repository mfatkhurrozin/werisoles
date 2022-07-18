<?php

namespace App\Models;

use CodeIgniter\Model;

class BayarModel extends Model

{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $allowedFields = ['file', 'id_nota'];

    public function getBayaradm($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pesanan' => $id])->first();
    }

    public function getBayar($id)
    {
        return $this->db->table('nota')
            ->join('pembayaran', 'pembayaran.id_nota=nota.id_nota')
            ->where('pembayaran.id_nota', $id)
            ->get()->getResultArray();
    }

    // public function getPesananusr($id)
    // {
    //     return $this->db->table('users')
    //         ->join('pesanan', 'users.id=pesanan.id_user')
    //         ->where('users.id', $id)
    //         ->get()->getResultArray();
    // }
}
