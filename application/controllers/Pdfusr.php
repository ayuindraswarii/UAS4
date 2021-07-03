<?php 
	class Pdfusr extends CI_Controller{
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
			$pdf->Cell(190,7, 'DATA PENGGUNA / USER ASTY STAR MANAGEMENT',0,1,'C'); 
			
			// Memberikan space kebawah agar tidak terlalu rapat 
			$pdf->Cell(10,7,'',0,1, 'C');

			$pdf->setFont('Arial', 'B',10); 
			$pdf->Cell(30,6, 'Kode User',1,0);
			$pdf->Cell(70,6, 'Nama User',1,0); 
			$pdf->Cell(40,6, 'Username',1,0);
			$pdf->Cell(40,6, 'Password',1,1);

			$pdf->setFont('Arial','', 10);
			
			$user = $this->db->get('user')->result(); 
			foreach ($user as $row){
				$pdf->Cell(30,6, $row->kode_user,1,0);
				$pdf->Cell(70,6, $row->nama_user,1,0);
				$pdf->Cell(40,6, $row->username_user,1,0); 
				$pdf->Cell(40,6, $row->password_user,1,1); 
			}

			$pdf->Output();
		}
	}
 ?>