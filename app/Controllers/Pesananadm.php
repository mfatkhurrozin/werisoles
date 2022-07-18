<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;
use App\Models\BayarModel;
use App\Models\PelangganModel;

class Pesananadm extends BaseController
{
    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        $this->ProdukModel = new ProdukModel();
        $this->BayarModel = new BayarModel();
        $this->PelangganModel = new PelangganModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_tugas') ? $this->request->getVar('page_tugas') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tugas = $this->PesananModel->search($keyword);
        } else {
            $tugas = $this->PesananModel;
        }
        $data = [
            'title' => 'Daftar Tugas',
            'pesananadm' => $this->PesananModel->getPesananall(),
            // 'pesananadm' => $this->PesananModel->getPesananadm($id),
            'pesananusr' => $this->PesananModel->getPesanan(user_id()),
            'pesanan'  => $this->PesananModel->paginate(4, 'pesanan'),
            'pager' => $this->PesananModel->pager,
            'pelanggan' => $this->PelangganModel->getPelangganall(),
            'currentPage' => $currentPage
        ];

        return view('pemilik/pesananadm/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Pesanan',
            'pesananadm' => $this->PesananModel->getPesananusr($id),
            'bayar' => $this->BayarModel->getBayaradm($id)
        ];

        // jika data tugas tidak di temukan
        if (empty($data['pesananadm'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul tugas' . $id . 'Tidak Ditemukan');
        }

        return view('pemilik/pesananadm/detail', $data);
    }

    public function hapus($id)
    {
        //cari gambar berdasarkan id
        $pesanan = $this->PesananModel->find($id);

        //cek gambar default (tidak boleh dihapus)
        if ($pesanan['file'] != 'default.jpg') {

            //hapus gambar di folder mtr
            unlink('jwb/' . $pesanan['file']);
        }

        $this->PesananModel->delete($id);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/pesananadm');
    }


    public function ubah($id)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data Tugas',
            'validation' => \Config\Services::validation(),
            'id_produk' => $this->ProdukModel->find($id),
            'pesanan' => $this->PesananModel->getPesananadm($id)
        ];


        return view('/pemilik/pesananadm/ubah', $data);
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
            return redirect()->to('pemilik/pesananadm/ubah/' . $id)->withInput();
        }


        $this->PesananModel->update($id, [
            // 'nama' => $this->request->getVar('nama'),
            // 'nama_menu' => $this->request->getVar('nama_produk'),
            // 'alamat' => $this->request->getVar('alamat'),
            // 'hp' => $this->request->getVar('hp'),
            // 'jumlah' => $this->request->getVar('jumlah'),
            // 'total' => $this->request->getVar('total'),
            // 'tanggal' => $this->request->getVar('tanggal'),
            'status' => $this->request->getVar('status'),
            // 'file' => $namaSampul,
            // 'id_menu' => $this->request->getVar('id_produk'),
            // 'id_user' => $this->request->getVar('id_user')
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data materi Sudah Di Rubah Ya!');

        return redirect()->to('/pesananadm');
    }
}
