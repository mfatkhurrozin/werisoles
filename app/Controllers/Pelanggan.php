<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\KeranjangModel;
use App\Models\PesananModel;

class Pelanggan extends BaseController
{
    public function __construct()
    {
        $this->PelangganModel = new PelangganModel();
        $this->KeranjangModel = new KeranjangModel();
        $this->PesananModel = new PesananModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_materi') ? $this->request->getVar('page_materi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $materi = $this->PelangganModel->search($keyword);
        } else {
            $materi = $this->PelangganModel;
        }
        $data = [
            'title' => 'Daftar Materi',
            // 'materi' => $this->PelangganModel->getMateri()
            'pelanggan'  => $this->PelangganModel->getPelanggan(),
            'pager' => $this->PelangganModel->pager,
            'currentPage' => $currentPage
        ];

        return view('pelanggan/index', $data);
    }
    public function tambah()
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data materi',
            'validation' => \Config\Services::validation(),
            'pesananusr' => $this->PesananModel->getPesanan(user_id()),
        ];

        return view('produk/pelanggan/tambah', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} materi wajib di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} materi wajib di isi',

                ]
            ]

        ])) {

            //menampilkan pesan kesalahan
            //$validation = \Config\Services::validation();
            //return redirect()->to('/materi/tambah')->withInput()->with('validation', $validation);
            // return redirect()->to('/pemilik/tambah')->withInput();
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }


        $this->PelangganModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'hp' => $this->request->getVar('hp'),
        ]);
        // $this->NotaModel->save([
        //     'tgl' => $this->request->getVar('tgl'),
        //     'totalbayar' => $this->request->getVar('totalbayar'),
        //     'status' => $this->request->getVar('status'),
        //     'id_user' => $this->request->getVar('id_user'),
        //     'id_pelanggan' => $this->request->getVar('id_pelanggan')
        // ]);
        $this->KeranjangModel->truncate();

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');

        return redirect()->to('/nota/tambah');
    }
}
