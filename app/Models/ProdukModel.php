<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model

{
    protected $table = 'produk';
    protected $primaryKey = 'id_menu';
    protected $allowedFields = ['nama_menu', 'detail', 'harga', 'gambar'];

    public function search($keyword)
    {
        return $this->table('harga')->like('nama_menu', $keyword);
    }

    public function getProduk($idproduk = false)
    {
        if ($idproduk == false) {
            return $this->findAll();
        }

        return $this->where(['id_menu' => $idproduk])->first();
    }
}
