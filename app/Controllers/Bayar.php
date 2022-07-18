<?php

namespace App\Controllers;

use App\Models\NotaModel;
// use App\Models\ProdukModel;
use App\Models\BayarModel;

class Bayar extends BaseController
{
    public function __construct()
    {
        $this->BayarModel = new BayarModel();
        $this->NotaModel = new NotaModel();
    }


    public function index()
    {
        $currentPage = $this->request->getVar('page_tugas') ? $this->request->getVar('page_tugas') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $tugas = $this->NotaModel->search($keyword);
        } else {
            $tugas = $this->NotaModel;
        }
        $data = [
            'title' => 'Daftar Tugas',
            'pesanusr' => $this->NotaModel->getPesananusr(user_id()),
            'nota'  => $this->NotaModel->paginate(4, 'nota'),
            'pager' => $this->NotaModel->pager,
            'currentPage' => $currentPage
        ];

        return view('produk/nota/index', $data);
    }

    // public function getData()
    // {
    //     $pesan = new NotaModel();
    //     $dataPesan = $pesan->find(2);
    // }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail tugas',
            'pesanan' => $this->NotaModel->getPesanan($id)
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
            'id_nota' => $this->NotaModel->find($id),
            // 'id_pesanan' => $this->NotaModel->getPesanan($id)
        ];


        return view('produk/bayar/tambah', $data);
    }


    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            // 'jumlah' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib di isi'
            //     ]
            // ],
            // 'nama' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib di isi'
            //     ]
            // ],
            // 'alamat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib di isi'
            //     ]
            // ],
            'file' => [
                'rules' => 'uploaded[file]',
                'errors' => [
                    'uploaded' => 'Isi bukti pembayaran',

                ]
            ]
        ])) {

            // menampilkan pesan kesalahan
            // $validation = \Config\Services::validation();
            session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->to('/produk/pesanan/tambah')->withInput()->with('validation', $validation);
            // return redirect()->to('/tugasjawab/tambah')->withInput();
            return redirect()->back()->withInput();
        }


        //mengambil gambar sampul
        $fileSampul = $this->request->getFile('file');

        //generate nama sampul random
        $namaSampul = $fileSampul->getRandomName();

        //meminddahkan file sampul ke folder img
        $fileSampul->move('jwb', $namaSampul);

        $this->BayarModel->save([
            // 'nama' => $this->request->getVar('nama'),
            // 'nama_menu' => $this->request->getVar('nama_produk'),
            // 'alamat' => $this->request->getVar('alamat'),
            // 'hp' => $this->request->getVar('hp'),
            // 'jumlah' => $this->request->getVar('jumlah'),
            // 'total' => $this->request->getVar('total'),
            // 'tanggal' => $this->request->getVar('tanggal'),
            'file' => $namaSampul,
            'id_nota' => $this->request->getVar('id_nota'),
            // 'id_user' => $this->request->getVar('id_user')
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Pembayaran Berhasil Dikirim');

        return redirect()->to('/nota');
    }
    public function hapus($id)
    {
        //cari gambar berdasarkan id
        $produk = $this->BayarModel->find($id);

        //cek gambar default (tidak boleh dihapus)
        if ($produk['gambar'] != 'default.jpg') {

            //hapus gambar di folder mtr
            unlink('jwb/' . $produk['gambar']);
        }

        $this->BayarModel->delete($id);

        //flashdata pesan dihapus
        session()->setFlashdata('pesan', 'Data Anda Sudah Hilang!');

        return redirect()->to('/nota');
    }
}
