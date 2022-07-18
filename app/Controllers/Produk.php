<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
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
            $materi = $this->ProdukModel->search($keyword);
        } else {
            $materi = $this->ProdukModel;
        }
        $data = [
            'title' => 'Daftar Materi',
            // 'materi' => $this->ProdukModel->getMateri()
            'produk'  => $this->ProdukModel->getProduk(),
            'pager' => $this->ProdukModel->pager,
            'currentPage' => $currentPage
        ];

        return view('produk/index', $data);
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

        return view('produk/detail', $data);
    }

    // public function tambah()
    // {
    //     //mengambil data input saat melakukan validasi
    //     session();
    //     $data = [
    //         'title' => 'Tambah Data materi',
    //         'validation' => \Config\Services::validation()
    //     ];

    //     return view('materi/tambah', $data);
    // }

    // public function simpan()
    // {
    //     //validasi input data
    //     if (!$this->validate([
    //         'judul' => [
    //             'rules' => 'required|is_unique[materi.judul]',
    //             'errors' => [
    //                 'required' => '{field} materi wajib di isi',
    //                 'is_unique' => '{field} materi sudah ada'
    //             ]
    //         ]
    //     ])) {

    //         //menampilkan pesan kesalahan
    //         //$validation = \Config\Services::validation();
    //         //return redirect()->to('/materi/tambah')->withInput()->with('validation', $validation);
    //         return redirect()->to('/materi/tambah')->withInput();
    //     }

    //     //mengambil gambar sampul
    //     $fileSampul = $this->request->getFile('file');

    //     //generate nama sampul random
    //     $namaSampul = $fileSampul->getName();

    //     //meminddahkan file sampul ke folder mtr
    //     $fileSampul->move('mtr', $namaSampul);

    //     $this->ProdukModel->save([
    //         'judul' => $this->request->getVar('judul'),
    //         'deskripsi' => $this->request->getVar('deskripsi'),
    //         'file' => $namaSampul
    //     ]);

    //     //flashdata pesan disimpan
    //     session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');

    //     return redirect()->to('/materi');
    // }

    // public function hapus($id_produk)
    // {
    //     //cari gambar berdasarkan id
    //     $materi = $this->ProdukModel->find($id_produk);

    //     //cek gambar default (tidak boleh dihapus)
    //     if ($materi['file'] != 'default.jpg') {

    //         //hapus gambar di folder mtr
    //         unlink('mtr/' . $materi['file']);
    //     }

    //     $this->ProdukModel->delete($id_produk);

    //     //flashdata pesan dihapus
    //     session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

    //     return redirect()->to('/materi');
    // }

    // public function ubah($id_produk)
    // {
    //     //mengambil data input saat melakukan validasi
    //     session();
    //     $data = [
    //         'title' => 'Ubah Data materi',
    //         'validation' => \Config\Services::validation(),
    //         'materi' => $this->ProdukModel->getMateri($id_produk)
    //     ];

    //     return view('/materi/ubah', $data);
    // }

    // public function update($id_produk)
    // {
    //     // validasi update
    //     if (!$this->validate([
    //         'judul' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} materi wajib di isi',
    //             ]
    //         ],
    //     ])) {

    //         //menampilkan pesan kesalahan
    //         //$validation = \Config\Services::validation();

    //         //return redirect()->to('materi/ubah/' . $id_produk)->withInput()->with('validation', $validation);
    //         return redirect()->to('materi/ubah/' . $id_produk)->withInput();
    //     }

    //     $fileSampul = $this->request->getFile('file');

    //     //cek gambar, tetap atau update
    //     if ($fileSampul->getError() == 4) {
    //         $namaSampul = $this->request->getVar('sampulLama');
    //     } else {
    //         //generate nama sampul
    //         $namaSampul = $fileSampul->getName();

    //         //memindahkan gambar
    //         $fileSampul->move('mtr', $namaSampul);

    //         //hapus gambar lama
    //         unlink('mtr/' . $this->request->getVar('sampulLama'));
    //     }

    //     $this->ProdukModel->update($id_produk, [
    //         'judul' => $this->request->getVar('judul'),
    //         'deskripsi' => $this->request->getVar('deskripsi'),
    //         'file' => $namaSampul
    //     ]);

    //     //flashdata pesan disimpan
    //     session()->setFlashdata('pesan', 'Data materi Sudah Di Rubah Ya!');

    //     return redirect()->to('/materi');
    // }
}
