<?php 
	class Pdflmb extends CI_Controller{
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
			$pdf->Cell(190,7, 'DATA LOMBA PESERTA ASTY STAR MANAGEMENT',0,1,'C'); 
			$pdf->setFont('Arial', 'B',12); 
			$pdf->Cell(190,7, 'PERIODE 2021 KOTA MALANG',0,1,'C');
			
			// Memberikan space kebawah agar tidak terlalu rapat 
			$pdf->Cell(10,7,'',0,1, 'C');

			$pdf->setFont('Arial', 'B',10); 
			$pdf->Cell(30,6, 'Kode Lomba',1,0);
			$pdf->Cell(70,6, 'Nama Lomba',1,0); 
			$pdf->Cell(20,6, 'Harga',1,1);

			$pdf->setFont('Arial','', 10);
			
			$lomba = $this->db->get('lomba')->result(); 
			foreach ($lomba as $row){
				$pdf->Cell(30,6, $row->kode_lomba,1,0);
				$pdf->Cell(70,6, $row->nama_lomba,1,0);
				$pdf->Cell(20,6, $row->harga,1,1); 
			}

			$pdf->Output();
		}
	}
 ?>