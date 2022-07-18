<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Pemilik extends BaseController
{
    public function __construct()
    {
        $this->ProdukModel = new ProdukModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_materi') ? $this->request->getVar('page_materi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $produk = $this->ProdukModel->search($keyword);
        } else {
            $produk = $this->ProdukModel;
        }
        $data = [
            'title' => 'Daftar Materi',
            // 'materi' => $this->ProdukModel->getMateri()
            'produk'  => $this->ProdukModel->getProduk(),
            'pager' => $this->ProdukModel->pager,
            'currentPage' => $currentPage
        ];

        return view('/pemilik/index', $data);
    }

    public function detail($id_produk)
    {
        $data = [
            'title' => 'Detail materi',
            'produk' => $this->ProdukModel->getProduk($id_produk)
        ];

        // jika data materi tidak di temukan
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul materi' . $id_produk . 'Tidak Ditemukan');
        }

        return view('/pemilik/detail', $data);
    }

    public function tambah()
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data materi',
            'validation' => \Config\Services::validation()
        ];

        return view('pemilik/tambah', $data);
    }

    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'nama_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} materi wajib di isi',
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]',
                'errors' => [
                    'uploaded' => 'Pilihlah Gambar Produk',

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

        //mengambil gambar sampul
        $fileSampul = $this->request->getFile('gambar');

        //generate nama sampul random
        $namaSampul = $fileSampul->getName();

        //meminddahkan file sampul ke folder mtr
        $fileSampul->move('upload', $namaSampul);

        $this->ProdukModel->save([
            'nama_menu' => $this->request->getVar('nama_menu'),
            'detail' => $this->request->getVar('detail'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaSampul
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');

        return redirect()->to('/pemilik');
    }

    public function hapus($id_produk)
    {
        //cari gambar berdasarkan id
        $produk = $this->ProdukModel->find($id_produk);

        //cek gambar default (tidak boleh dihapus)
        if ($produk['gambar'] != 'default.jpg') {

            //hapus gambar di folder mtr
            unlink('upload/' . $produk['gambar']);
        }

        $this->ProdukModel->delete($id_produk);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/pemilik');
    }

    public function ubah($id_produk)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Ubah Data materi',
            'validation' => \Config\Services::validation(),
            'produk' => $this->ProdukModel->getProduk($id_produk)
        ];

        return view('/pemilik/ubah', $data);
    }

    public function update($id_produk)
    {
        // validasi update
        if (!$this->validate([
            'nama_menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} materi wajib di isi',
                ]
            ],
        ])) {

            //menampilkan pesan kesalahan
            //$validation = \Config\Services::validation();

            //return redirect()->to('materi/ubah/' . $id_produk)->withInput()->with('validation', $validation);
            return redirect()->to('pemilik/ubah/' . $id_produk)->withInput();
        }

        $fileSampul = $this->request->getFile('gambar');

        //cek gambar, tetap atau update
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama sampul
            $namaSampul = $fileSampul->getName();

            //memindahkan gambar
            $fileSampul->move('upload', $namaSampul);

            //hapus gambar lama
            unlink('upload/' . $this->request->getVar('sampulLama'));
        }

        $this->ProdukModel->update($id_produk, [
            'nama_menu' => $this->request->getVar('nama_menu'),
            'detail' => $this->request->getVar('detail'),
            'harga' => $this->request->getVar('harga'),
            'gambar' => $namaSampul
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data materi Sudah Di Rubah Ya!');

        return redirect()->to('/pemilik');
    }
}
