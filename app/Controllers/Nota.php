<?php

namespace App\Controllers;

use App\Models\NotaModel;
use App\Models\PesananModel;
use App\Models\PelangganModel;

class Nota extends BaseController
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

        return view('produk/nota/index', $data);
    }

    public function tambah()
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data Tugas',
            'validation' => \Config\Services::validation(),
            'nota' => $this->NotaModel->getNota(),
            'pesananusr' => $this->PesananModel->getPesanan(user_id()),
            'pelangganusr' => $this->PelangganModel->getPelanggan()
            // 'pelangganusr' => $this->NotaModel->getNotaall()
        ];


        return view('produk/nota/tambah', $data);
    }


    public function simpan()
    {
        //validasi input data
        if (!$this->validate([
            'tgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi'
                ]
            ],
            // 'alamat' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} wajib di isi'
            //     ]
            // ],
            // 'file' => [
            //     'rules' => 'uploaded[file]',
            //     'errors' => [
            //         'uploaded' => 'Pilihlah file bukti pembayaran',

            //     ]
            // ]
        ])) {

            // menampilkan pesan kesalahan
            // $validation = \Config\Services::validation();
            session()->setFlashdata('error', $this->validator->listErrors());
            // return redirect()->to('/produk/pesanan/tambah')->withInput()->with('validation', $validation);
            // return redirect()->to('/tugasjawab/tambah')->withInput();
            return redirect()->back()->withInput();
        }


        $this->NotaModel->save([
            'tgl' => $this->request->getVar('tgl'),
            'totalbayar' => $this->request->getVar('totalbayar'),
            'status' => $this->request->getVar('status'),
            'id_user' => $this->request->getVar('id_user'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan')
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Pesanan Berhasil Dikirim');

        return redirect()->to('/nota');
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
    public function ubah($id)
    {
        //mengambil data input saat melakukan validasi
        session();
        $data = [
            'title' => 'Tambah Data',
            'validation' => \Config\Services::validation(),
            'pesanan' => $this->PesananModel->getPesananadm($id),
            'nota' => $this->NotaModel->getNota($id),
        ];


        return view('/produk/nota/ubah', $data);
    }

    public function update($id)
    {
        // validasi update
        if (!$this->validate([
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            //menampilkan pesan kesalahan
            //$validation = \Config\Services::validation();

            //return redirect()->to('materi/ubah/' . $id_produk)->withInput()->with('validation', $validation);
            return redirect()->to('produk/nota/ubah/' . $id)->withInput();
        }


        $this->NotaModel->update($id, [
            'status' => $this->request->getVar('status'),
        ]);

        //flashdata pesan disimpan
        session()->setFlashdata('pesan', 'Data Sudah Di Rubah Ya!');

        return redirect()->to('/notaadm');
    }
}
