<?php

class Laporan extends CI_Controller{

	public function __construct()
	{
        parent::__construct();
		$this->load->model("AdminMd");
		$this->load->model("AnggotaMd");
		$this->load->model("KategoriMd");
		$this->load->model("SimpanMd");
		$this->load->model("PinjamMd");
		$this->load->model("WithdrawMd");
		$this->load->model("PerusahaanMd");
		$this->load->library('pdf');
		$this->load->helper('koperasi');

		date_default_timezone_set('asia/jakarta');
	}

	public function laporan_anggota()
	{
		global $title;
		$anggota = $this->AnggotaMd->get_anggota();
	    $pdf = new PDF('L');
	    $title = 'Laporan Anggota ';
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();
		$pdf->SetFont('arial','B','9');
		$pdf->SetFillColor(188, 188, 188);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		
		$pdf->Cell(29, 6, 'NIK', 1, '0', 'C', true);
		$pdf->Cell(30, 6, 'NAMA', 1, '0', 'C', true);
		$pdf->Cell(40, 6, 'TTL', 1, '0', 'C', true);
		$pdf->Cell(17, 6, 'AGAMA', 1, '0', 'C', true);
		$pdf->Cell(30, 6, 'PEKERJAAN', 1, '0', 'C', true);
		$pdf->Cell(15, 6, 'JK', 1, '0', 'C', true);
		$pdf->Cell(50, 6, 'EMAIL', 1, '0', 'C', true);
		$pdf->Cell(26, 6, 'NO.TEPL', 1, '0', 'C', true);
		$pdf->Cell(40, 6, 'ALAMAT', 1, '0', 'C', true);

		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($anggota as $baris) {
			$pdf->Cell(29, 6, $baris->nik, 1, '0', 'C',);
			$pdf->Cell(30, 6, $baris->nama_lengkap, 1, '0', 'C',);
			$pdf->Cell(40, 6, tgl_indo($baris->tempat_lahir) .',' .$baris->tgl_lahir, 1, '0', 'L',);
			$pdf->Cell(17, 6, $baris->agama, 1, '0', 'C',);
			$pdf->Cell(30, 6, $baris->pekerjaan, 1, '0', 'C',);
			$pdf->Cell(15, 6, $baris->jenis_kelamin, 1, '0', 'C',);
			$pdf->Cell(50, 6, $baris->email, 1, '0', 'C',);
			$pdf->Cell(26, 6, $baris->nohp, 1, '0', 'C',);
			$pdf->Cell(40, 6, $baris->alamat, 1, '0', 'C',);
			$pdf->Ln();
		}
		

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan, '.tgl_indo(date('Y-m-d')).'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Ketua,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Sukarno", 0, 1);

		$pdf->Output();
	}


	public function laporan_simpanan()
	{
		global $title;
		$simpanan = $this->SimpanMd->get_laporan_simpanan();
	    $pdf = new PDF('L');
	    $title = 'Laporan Penyimpanan ';
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();
		$pdf->SetFont('arial','B','9');
		$pdf->SetFillColor(188, 188, 188);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		
		$pdf->Cell(27, 6, 'ID Penyimpanan', 1, '0', 'C', true);
		$pdf->Cell(60, 6, 'Nama Lengakap', 1, '0', 'C', true);
		$pdf->Cell(70, 6, 'Tanggal Lahir', 1, '0', 'C', true);
		$pdf->Cell(40, 6, 'Jenis Layanan', 1, '0', 'C', true);
		$pdf->Cell(40, 6, 'Tanggal Simpanan', 1, '0', 'C', true);
		$pdf->Cell(40, 6, 'Jumlah Simpanan', 1, '0', 'C', true);

		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($simpanan as $baris) {
			$pdf->Cell(27, 6, $baris->id_penyimpanan, 1, '0', 'C',);
			$pdf->Cell(60, 6, $baris->nama_lengkap, 1, '0', 'C',);
			$pdf->Cell(70, 6, $baris->tempat_lahir.' , '.tgl_indo($baris->tgl_lahir), 1, '0', 'L',);
			$pdf->Cell(40, 6, $baris->nama_kategori, 1, '0', 'C',);
			$pdf->Cell(40, 6, tgl_indo($baris->tanggal_simpanan), 1, '0', 'C',);
			$pdf->Cell(40, 6, number_format($baris->jumlah_simpanan), 1, '0', 'C',);
			$pdf->Ln();
		}
		

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan, '.tgl_indo(date('Y-m-d')).'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Ketua,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Sukarno", 0, 1);

		$pdf->Output();
	}



	public function laporan_Pinjaman()
	{
		global $title;
		$pinjaman = $this->PinjamMd->get_laporan_pinjaman();
	    $pdf = new PDF('L');
	    $title = 'Laporan Peminjaman ';
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();
		$pdf->SetFont('arial','B','9');
		$pdf->SetFillColor(188, 188, 188);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		
		$pdf->Cell(30, 6, 'ID Peminjaman', 1, '0', 'C', true);
		$pdf->Cell(40, 6, 'Nama', 1, '0', 'C', true);
		$pdf->Cell(35, 6, 'Jumlah Pinjaman', 1, '0', 'C', true);
		$pdf->Cell(25, 6, 'Peminjaman', 1, '0', 'C', true);
		$pdf->Cell(35, 6, 'Tanggal Pinjam', 1, '0', 'C', true);
		$pdf->Cell(20, 6, 'Bunga ', 1, '0', 'C', true);
		$pdf->Cell(35, 6, 'Besar Angsuran', 1, '0', 'C', true);
		$pdf->Cell(60, 6, 'keterangan', 1, '0', 'C', true);

		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($pinjaman as $baris) {
			$pdf->Cell(30, 6, $baris->id_peminjaman, 1, '0', 'C',);
			$pdf->Cell(40, 6, $baris->nama_lengkap, 1, '0', 'L',);
			$pdf->Cell(35, 6, 'Rp. '. number_format($baris->jumlah_pinjaman), 1, '0', 'L',);
			$pdf->Cell(25, 6, $baris->lama_pinjaman.' Bulan', 1, '0', 'L',);
			$pdf->Cell(35, 6, tgl_indo($baris->tanggal_pinjam), 1, '0', 'C',);
			$pdf->Cell(20, 6, $baris->bunga_pinjaman. '%', 1, '0', 'C',);
			$pdf->Cell(35, 6, 'Rp. '.number_format($baris->besar_angsuran), 1, '0', 'L',);
			$pdf->Cell(60, 6, $baris->keterangan, 1, '0', 'L',);
			$pdf->Ln();
		}
		

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan, '.tgl_indo(date('Y-m-d')).'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Ketua,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Sukarno", 0, 1);

		$pdf->Output();
	}


	public function laporan_penarikan()
	{
		global $title;
		$penarikan = $this->SimpanMd->get_laporan_penarikan();
	    $pdf = new PDF('L');
	    $title = 'Laporan Penarikan /Withdraw ';
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();
		$pdf->SetFont('arial','B','9');
		$pdf->SetFillColor(188, 188, 188);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		
		$pdf->Cell(27, 6, 'ID Penarikan', 1, '0', 'C', true);
		$pdf->Cell(70, 6, 'Nama Lengakap', 1, '0', 'C', true);
		$pdf->Cell(60, 6, 'Jenis Layanan', 1, '0', 'C', true);
		$pdf->Cell(60, 6, 'Tanggal Penarikan', 1, '0', 'C', true);
		$pdf->Cell(60, 6, 'Jumlah Penarikan', 1, '0', 'C', true);

		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($penarikan as $baris) {
			$pdf->Cell(27, 6, $baris->id_penarikan, 1, '0', 'C',);
			$pdf->Cell(70, 6, $baris->nama_lengkap, 1, '0', 'C',);
			$pdf->Cell(60, 6, $baris->nama_kategori, 1, '0', 'C',);
			$pdf->Cell(60, 6, tgl_indo($baris->tanggal_penarikan), 1, '0', 'C',);
			$pdf->Cell(60, 6, number_format($baris->Jumlah_penarikan), 1, '0', 'C',);
			$pdf->Ln();
		}
		

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan, '.tgl_indo(date('Y-m-d')).'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Ketua,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Sukarno", 0, 1);

		$pdf->Output();
	}


	
}
