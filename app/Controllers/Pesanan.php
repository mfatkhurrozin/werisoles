<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;
use App\Models\KeranjangModel;

class Pesanan extends BaseController
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
            $tugas = $this->PesananModel->search($keyword);
        } else {
            $tugas = $this->PesananModel;
        }
        $data = [
            'title' => 'Daftar Tugas',
            'pesanusr' => $this->PesananModel->getPesananusr(user_id()),
            'pesananusr' => $this->PesananModel->getPesanan(user_id()),
            'pesanan'  => $this->PesananModel->paginate(4, 'pesanan'),
            'pager' => $this->PesananModel->pager,
            'currentPage' => $currentPage
        ];

        return view('produk/pesanan/index', $data);
    }

    // public function getData()
    // {
    //     $pesan = new PesananModel();
    //     $dataPesan = $pesan->find(2);
    // }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail tugas',
            'pesanan' => $this->PesananModel->getPesanan($id)
        ];

        // jika data tugas tidak di temukan
        if (empty($data['pesanan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul tugas' . $id . 'Tidak Ditemukan');
        }

        return view('produk/pesanan/detail', $data);
    }

    public function tambah($id)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data Tugas',
            'validation' => \Config\Services::validation(),
            'id_produk' => $this->ProdukModel->find($id),
            'user' => $this->PesananModel->getPesanan($id)
        ];


        return view('produk/pesanan/tambah', $data);
    }


    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi'
                ]
            ],
        ])) {

            // menampilkan pesan kesalahan
            // $validation = \Config\Services::validation();
            session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->to('/produk/pesanan/tambah')->withInput()->with('validation', $validation);
            // return redirect()->to('/tugasjawab/tambah')->withInput();
            return redirect()->back()->withInput();
        }


        $this->PesananModel->save([
            'jumlah' => $this->request->getVar('jumlah'),
            'total' => $this->request->getVar('total'),
            'id_menu' => $this->request->getVar('id_produk'),
            'id_user' => $this->request->getVar('id_user')
        ]);

        $this->KeranjangModel->save([
            'jumlah' => $this->request->getVar('jumlah'),
            'total' => $this->request->getVar('total'),
            'id_menu' => $this->request->getVar('id_produk'),
            'id_user' => $this->request->getVar('id_user')
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Berhasil di Tambahkan di Keranjang');

        return redirect()->to('/produk');
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


        return view('/produk/pesanan/ubah', $data);
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
            return redirect()->to('produk/pesanan/ubah/' . $id)->withInput();
        }


        $this->PesananModel->update($id, [
            'status' => $this->request->getVar('status'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data materi Sudah Di Rubah Ya!');

        return redirect()->to('/pesananadm');
    }
    public function hapus($id)
    {
        //cari gambar berdasarkan id
        $pesanan = $this->PesananModel->find($id);
        $this->PesananModel->delete($id);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/pesanan');
    }
}
