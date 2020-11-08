<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Phpexcel extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data = $this->Admin_model->get('user');
        $data = array('data' => $data);
        $this->load->view('admin/laporan/excel', $data);
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // MEMBUAT HEADER KOLOM
        $sheet->setCellValue('A1', 'Nama Produk');
        $sheet->setCellValue('B1', 'Qty');
        $sheet->setCellValue('C1', 'Harga');
        $sheet->setCellValue('D1', 'Tanggal');
        $sheet->setCellValue('E1', 'Nama Pembeli');

        // MEMBUAT ISI KOLOM
        $where = date('Y-m-d');
        $user = $this->Admin_model->cetakLaporanHarian($where);
        $i = 2;
        foreach($user as $row):
        $sheet->setCellValue('A'.$i, $row->nama_produk);
        $sheet->setCellValue('B'.$i, $row->qty);
        $sheet->setCellValue('C'.$i, $row->total_harga);
        $sheet->setCellValue('D'.$i, $row->tanggal);
        $sheet->setCellValue('E'.$i, $row->nama_pembeli);
        $i++;
        endforeach;

        $awal = date('Y-m-d');
        $today = date('d-m-Y', strtotime($awal));
        $filename = 'Penjualan per '.$today;
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');    
        
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        
        // MENCETAK FILE
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function lihat()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
 
        $filename = 'napabos.xlsx';
 
        $writer->save($filename); // will create and save the file in the root of the project
    }
 
    public function download()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        
        $writer = new Xlsx($spreadsheet);
        $awal = date('Y-m-d');
        $today = date('d-m-Y', strtotime($awal));
        $filename = 'Penjualan per '.$today;
 
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output'); // download file 
    }
}
