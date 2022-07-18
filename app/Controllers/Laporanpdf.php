<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\ProdukModel;
use TCPDF;

class Laporanpdf extends BaseController
{
    public function __construct()
    {
        $this->PesananModel = new PesananModel();
        $this->ProdukModel = new ProdukModel();
    }

    // public function invoice($id)
    // {


    //     $data = [
    //         'pesananadm' => $this->PesananModel->getPesananadm($id)
    //     ];
    //     return view('pemilik/pesananadm/invoice', $data);

    //     $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

    //     $pdf->SetCreator(PDF_CREATOR);
    //     $pdf->SetAuthor('Dea Venditama');
    //     $pdf->SetTitle('Invoice');
    //     $pdf->SetSubject('Invoice');

    //     $pdf->setPrintHeader(false);
    //     $pdf->setPrintFooter(false);

    //     $pdf->addPage();

    //     // output the HTML content
    //     $pdf->writeHTML($data, true, false, true, false, '');
    //     //line ini penting
    //     $this->response->setContentType('application/pdf');
    //     //Close and output PDF document
    //     $pdf->Output('invoice.pdf', 'I');
    // }

    public function invoice()
    {
        $id = $this->request->uri->getSegment(3);


        $html = view('pemilik/pesananadm/invoice', [
            'pesananadm' => $this->PesananModel->getPesananadm($id)
        ]);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('WE Risoles');
        $pdf->SetTitle('detailpesanan');
        $pdf->SetSubject('detailpesanan');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('detailpesanan.pdf', 'I');
    }

    public function lapproduk()
    {
        $id = $this->request->uri->getSegment(3);


        $html = view('pemilik/lapproduk', [
            'produk'  => $this->ProdukModel->getProduk()
        ]);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('WE Risoles');
        $pdf->SetTitle('produk');
        $pdf->SetSubject('produk');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('produk.pdf', 'I');
    }

    public function lappesanan()
    {
        $id = $this->request->uri->getSegment(3);


        $html = view('pemilik/pesananadm/lappesanan', [
            'pesananadm' => $this->PesananModel->getPesananadm()
        ]);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('WE Risoles');
        $pdf->SetTitle('pesanan');
        $pdf->SetSubject('pesanan');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('pesanan.pdf', 'I');
    }
    public function lappembayaran()
    {
        $id = $this->request->uri->getSegment(3);


        $html = view('pemilik/pesananadm/lappembayaran', [
            'pesananadm' => $this->PesananModel->getPesananadm()
        ]);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('WE Risoles');
        $pdf->SetTitle('pmbayaran');
        $pdf->SetSubject('pembayaran');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('pembayaran.pdf', 'I');
    }

    public function lappenjualan()
    {
        $id = $this->request->uri->getSegment(3);


        $html = view('pemilik/pesananadm/lappenjualan', [
            'pesananusr' => $this->PesananModel->getPesanan(user_id()),
            'pesanan' => $this->PesananModel->getPesananall(),
        ]);

        $pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('WE Risoles');
        $pdf->SetTitle('penjualan');
        $pdf->SetSubject('penjualan');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('penjualan.pdf', 'I');
    }
}
