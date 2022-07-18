<?php

namespace App\Controllers;

use App\Models\NotaModel;
use App\Models\PesananModel;
use App\Models\PelangganModel;

class Notaadm extends BaseController
{
    public function __construct()
    {
        $this->NotaModel = new NotaModel();
        $this->PesananModel = new PesananModel();
        $this->PelangganModel = new PelangganModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_materi') ? $this->request->getVar('page_materi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $materi = $this->NotaModel->search($keyword);
        } else {
            $materi = $this->NotaModel;
        }
        $data = [
            'title' => 'Daftar Materi',
            // 'materi' => $this->NotaModel->getMateri()
            'nota'  => $this->NotaModel->getNota(),
            'pager' => $this->NotaModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pemilik/notaadm/index', $data);
    }


    public function ubah($id)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data Tugas',
            'validation' => \Config\Services::validation(),
            'id_produk' => $this->NotaModel->find($id),
            'pesanan' => $this->NotaModel->getPesananadm($id)
        ];


        return view('/pemilik/notaadm/ubah', $data);
    }

    public function update($id)
    {
        // validasi update
        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} materi wajib di isi',
                ]
            ],
        ])) {

            //menampilkan pesan kesalahan
            //$validation = \Config\Services::validation();

            //return redirect()->to('materi/ubah/' . $id_produk)->withInput()->with('validation', $validation);
            return redirect()->to('pemilik/notaadm/ubah/' . $id)->withInput();
        }


        $this->NotaModel->update($id, [
            'status' => $this->request->getVar('status'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data materi Sudah Di Rubah Ya!');

        return redirect()->to('/notaadm');
    }

    public function hapus($id)
    {
        //cari gambar berdasarkan id
        $pesanan = $this->NotaModel->find($id);
        $this->NotaModel->delete($id);

        //flashdata pesan dihapus
        session()->setFlashdata('pesanan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/nota');
    }
}
