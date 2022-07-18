<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;

class Keranjang extends BaseController
{
    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        $this->ProdukModel = new ProdukModel();
        $this->KeranjangModel = new KeranjangModel();
    }


    public function index()
    {
        $currentPage = $this->request->getVar('page_tugas') ? $this->request->getVar('page_tugas') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tugas = $this->KeranjangModel->search($keyword);
        } else {
            $tugas = $this->KeranjangModel;
        }
        $data = [
            'title' => 'Daftar Tugas',
            'pesanusr' => $this->KeranjangModel->getPesananusr(user_id()),
            'pesananusr' => $this->KeranjangModel->getPesanan(user_id()),
            'pesanan'  => $this->KeranjangModel->paginate(4, 'pesanan'),
            'pager' => $this->KeranjangModel->pager,
            'currentPage' => $currentPage
        ];

        return view('produk/pesanan/index', $data);
    }
}
