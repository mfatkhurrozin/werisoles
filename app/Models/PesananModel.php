<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model

{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['jumlah', 'total', 'id_menu', 'id_user'];

    public function getPesananadm($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_pesanan' => $id])->first();
    }
    public function getPesananandmall($id = false)
    {

        return $this->db->table('nota')
            ->join('pesanan', 'nota.id_user=pesanan.id_menu')
            ->orderBy('pesanan.id_pesanan')
            ->get()->getResultArray();

        return $this->where(['id_user' => $id])->first();
    }

    public function getPesanan($id)
    {
        return $this->db->table('produk')
            ->join('pesanan', 'produk.id_menu=pesanan.id_menu')
            ->where('pesanan.id_user', $id)
            ->get()->getResultArray();
    }

    public function getPesananall()
    {
        return $this->db->table('produk')
            ->join('pesanan', 'produk.id_menu=pesanan.id_menu')
            // ->where('pesanan.id_user')
            ->get()->getResultArray();
    }



    public function getPesananusr($id)
    {
        return $this->db->table('users')
            ->join('pesanan', 'users.id=pesanan.id_user')
            ->where('users.id', $id)
            ->get()->getResultArray();
    }
}
