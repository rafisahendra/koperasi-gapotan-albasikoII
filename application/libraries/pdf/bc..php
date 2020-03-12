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

	public function laporan_angota()
	{
		global $title;
		$anggota = $this->AnggotaMd->get_anggota();
	    $pdf = new PDF('L');
	    $title = 'Laporan Anggota ';
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		// $header = array(

		// array("label"=>"NIK", "length"=>40, "align"=>"C"),
		// array("label"=>"NAMA LENGKAP", "length"=>60, "align"=>"C"),
		// array("label"=>"TEMPAT/TTL", "length"=>37, "align"=>"C"),
		// array("label"=>"PEKERJAAN", "length"=>30, "align"=>"C"),
		// array("label"=>"EMAIL", "length"=>30, "align"=>"C"),
		// array("label"=>"NOHP", "length"=>30, "align"=>"C"),
		// array("label"=>"ALAMAT", "length"=>50, "align"=>"C")
		// );

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
			$pdf->Cell(40, 6, $baris->tempat_lahir .',' .$baris->tgl_lahir, 1, '0', 'L',);
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
		$pdf->Cell( 0, 45, "Jakimin", 0, 1);

		$pdf->Output();
	}

	public function laporan_penjualan_hari($hari)
	{
		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualanHari($hari);
	    $pdf = new PDF('L');
	    $title = 'Laporan Penjualan' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"Nomor Penjualan", "length"=>40, "align"=>"C"),
		array("label"=>"Barang", "length"=>60, "align"=>"C"),
		array("label"=>"Staff", "length"=>37, "align"=>"C"),
		array("label"=>"Jam", "length"=>30, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"Jumlah", "length"=>30, "align"=>"C"),
		array("label"=>"Total", "length"=>50, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($penjualan as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.tgl_indo(date('Y-m-d')).'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_penjualan_bulan($bulan)
	{
		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualanBulan($bulan);
	    $pdf = new PDF('L');
	    $title = 'Laporan Penjualan' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"Nomor Penjualan", "length"=>40, "align"=>"C"),
		array("label"=>"Barang", "length"=>60, "align"=>"C"),
		array("label"=>"Staff", "length"=>37, "align"=>"C"),
		array("label"=>"Jam", "length"=>30, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"Jumlah", "length"=>30, "align"=>"C"),
		array("label"=>"Total", "length"=>50, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($penjualan as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.tgl_indo(date('Y-m-d')).'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_penjualan_tahun($tahun)
	{
		global $title;
		$penjualan = $this->Penjualan_model->laporanPenjualanTahun($tahun);
	    $pdf = new PDF('L');
	    $title = 'Laporan Penjualan' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"Nomor Penjualan", "length"=>40, "align"=>"C"),
		array("label"=>"Barang", "length"=>60, "align"=>"C"),
		array("label"=>"Staff", "length"=>37, "align"=>"C"),
		array("label"=>"Jam", "length"=>30, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"Jumlah", "length"=>30, "align"=>"C"),
		array("label"=>"Total", "length"=>50, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($penjualan as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.date('d F Y').'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_service()
	{
		global $title;
		$service = $this->Service_model->laporanService();
	    $pdf = new PDF('L');
	    $title = 'Laporan Service' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"No. service", "length"=>20, "align"=>"C"),
		array("label"=>"Teknisi", "length"=>30, "align"=>"C"),
		array("label"=>"Staff", "length"=>30, "align"=>"C"),
		array("label"=>"Pelanggan", "length"=>30, "align"=>"C"),
		array("label"=>"Jam", "length"=>20, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"keterangan", "length"=>87, "align"=>"C"),
		array("label"=>"biaya", "length"=>30, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($service as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.date('d F Y').'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_service_hari($hari)
	{
		global $title;
		$service = $this->Service_model->laporanServiceHari($hari);
	    $pdf = new PDF('L');
	    $title = 'Laporan Service' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"No. service", "length"=>20, "align"=>"C"),
		array("label"=>"Teknisi", "length"=>30, "align"=>"C"),
		array("label"=>"Staff", "length"=>30, "align"=>"C"),
		array("label"=>"Pelanggan", "length"=>30, "align"=>"C"),
		array("label"=>"Jam", "length"=>20, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"keterangan", "length"=>87, "align"=>"C"),
		array("label"=>"biaya", "length"=>30, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($service as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.date('d F Y').'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_service_bulan($bulan)
	{
		global $title;
		$service = $this->Service_model->laporanServiceBulan($bulan);
	    $pdf = new PDF('L');
	    $title = 'Laporan Service' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"No. service", "length"=>20, "align"=>"C"),
		array("label"=>"Teknisi", "length"=>30, "align"=>"C"),
		array("label"=>"Staff", "length"=>30, "align"=>"C"),
		array("label"=>"Pelanggan", "length"=>30, "align"=>"C"),
		array("label"=>"Jam", "length"=>20, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"keterangan", "length"=>87, "align"=>"C"),
		array("label"=>"biaya", "length"=>30, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($service as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.date('d F Y').'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	public function laporan_service_tahun($tahun)
	{
		global $title;
		$service = $this->Service_model->laporanServiceTahun($tahun);
	    $pdf = new PDF('L');
	    $title = 'Laporan Service' ;
	    $pdf->AddPage();
	    $pdf->SetTitle($title );
	    $pdf->AliasNbPages();

		$header = array(

		array("label"=>"No. service", "length"=>20, "align"=>"C"),
		array("label"=>"Teknisi", "length"=>30, "align"=>"C"),
		array("label"=>"Staff", "length"=>30, "align"=>"C"),
		array("label"=>"Pelanggan", "length"=>30, "align"=>"C"),
		array("label"=>"Jam", "length"=>20, "align"=>"C"),
		array("label"=>"Tanggal", "length"=>30, "align"=>"C"),
		array("label"=>"keterangan", "length"=>87, "align"=>"C"),
		array("label"=>"biaya", "length"=>30, "align"=>"C")
		);

		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(0,0,255);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(0,0,0);
		foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();

		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;

		foreach ($service as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
		$pdf->Cell($header[$i]['length'], 6, $cell, 1, '0', $kolom['align'], $fill);
		$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
		}

		$pdf->SetX(220);
		$pdf->Cell( 0, 20, 'Patamuan,'.date('d F Y').'', 0, 1);
		$pdf->SetX(220);
		$pdf->Cell( 0, -10, 'Pemilik bengkel,', 0, 1);

		$pdf->SetX(220);
		$pdf->Cell( 0, 45, "Syofian Dinata", 0, 1);

		$pdf->Output();
	}

	
}
