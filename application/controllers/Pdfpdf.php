<?php 
	class Pdfpdf extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('Pdf');
		}

		function index(){
			$pdf = new FPDF('l', 'mm', 'A4'); 
			// membuat halaman baru
			$pdf->AddPage();
			
			// setting jenis font yang akan digunakan 
			$pdf->setFont('Arial', 'B',16); 
			$pdf->Cell(280,7, 'DATA PENDAFTARAN PESERTA ASTY STAR MANAGEMENT',0,1,'C'); 
			$pdf->setFont('Arial', 'B',12); 
			$pdf->Cell(280,7, 'PERIODE 2021 KOTA MALANG',0,1,'C');
			
			// Memberikan space kebawah agar tidak terlalu rapat 
			$pdf->Cell(10,7,'',0,1, 'C');

			$pdf->setFont('Arial', 'B',10); 
			$pdf->Cell(35,6, 'Kode Pendaftaran',1,0);
			$pdf->Cell(50,6, 'Nama',1,0); 
			$pdf->Cell(50,6, 'Sekolah',1,0);
			$pdf->Cell(70,6, 'Lomba',1,0);
			$pdf->Cell(40,6, 'Harga',1,1);

			$pdf->setFont('Arial','', 10);
			
			$this->db->select('*');
	 		$this->db->from('pendaftaran');
			$this->db->join('peserta','peserta.kode_peserta = pendaftaran.kode_peserta');
	      	$this->db->join('lomba','lomba.kode_lomba = pendaftaran.kode_lomba');      
			$pendaftaran = $this->db->get()->result(); 
			
			foreach ($pendaftaran as $row){
				$pdf->Cell(35,6, $row->kode_pendaftaran,1,0);
				$pdf->Cell(50,6, $row->nama,1,0);
				$pdf->Cell(50,6, $row->sekolah,1,0);
				$pdf->Cell(70,6, $row->nama_lomba,1,0);
				$pdf->Cell(40,6, $row->harga,1,1); 
			}

			$pdf->Output();
		}
	}
 ?>