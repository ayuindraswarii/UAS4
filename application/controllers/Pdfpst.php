<?php 
	class Pdfpst extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('Pdf');
		}

		function index(){
			$pdf = new FPDF('p', 'mm', 'A4'); 
			// membuat halaman baru
			$pdf->AddPage();
			
			// setting jenis font yang akan digunakan 
			$pdf->setFont('Arial', 'B',16); 
			$pdf->Cell(190,7, 'DATA PESERTA ASTY STAR MANAGEMENT',0,1,'C'); 
			$pdf->setFont('Arial', 'B',12); 
			$pdf->Cell(190,7, 'PERIODE 2021 KOTA MALANG',0,1,'C');
			
			// Memberikan space kebawah agar tidak terlalu rapat 
			$pdf->Cell(10,7,'',0,1, 'C');

			$pdf->setFont('Arial', 'B',10); 
			$pdf->Cell(30,6, 'Kode Peserta',1,0);
			$pdf->Cell(50,6, 'Nama',1,0); 
			$pdf->Cell(15,6, 'Kelas',1,0);
			$pdf->Cell(50,6, 'Sekolah',1,0);
			$pdf->Cell(40,6, 'Asal Kota',1,1);

			$pdf->setFont('Arial','', 10);
			
			$peserta = $this->db->get('peserta')->result(); 
			foreach ($peserta as $row){
				$pdf->Cell(30,6, $row->kode_peserta,1,0);
				$pdf->Cell(50,6,$row->nama,1,0);
				$pdf->Cell(15,6, $row->kelas,1,0); 
				$pdf->Cell(50,6, $row->sekolah,1,0);
				$pdf->Cell(40,6, $row->asal_kota,1,1);
			}

			$pdf->Output();
		}
	}
 ?>