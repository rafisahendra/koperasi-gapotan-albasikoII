<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCtr extends CI_Controller {

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
		$this->load->library('form_validation');
		$this->load->library('session');
		

		if( ! $this->session->userdata('email')){
			redirect('auth');
		}
	}
	
	public function index()
	{


		$data["count_pinjam"] = $this->AdminMd->get_pinjamanCount(); //ambil data dari Models 
		$data["count_simpanan"] = $this->AdminMd->get_simpanansiCount(); //ambil data dari Models 
		$data["count_angsuran2"] = $this->AdminMd->get_angsuranCount2(); //ambil data dari Models 
		$data["count_member"] = $this->AdminMd->get_memberCount(); //ambil data dari Models 
		$data["count_angsuran"] = $this->AdminMd->get_angsuranCount(); //ambil data dari Models 
		$this->load->view('beranda',$data);

	}

	public function pilih_barang(){

		$id_kategori = $this->input->post('id_kategori');
		$barang = $this->BarangMd->get_barang_ByIdBrand($id_kategori);
		$data = "<option value=''> -Pilih Barang- </option>";

		foreach($barang as $br){
			$data .= "<option harga='" . $br->harga . "' value='" . $br->id_barang . "'>" . $br->kode_barang . " - " . $br->nama_barang . "</option>"; 
		}

		echo $data;
	}


	//  Khusus Untuk View =======================================================================================
	
	public function admin_view()
	{
		$data["dt_admin"] = $this->AdminMd->getAll(); //ambil data dari Models 
		$this->load->view('output/admin', $data); // Kirim data ke View

	}

	public function anggota_view()
	{
		$data["anggota"] = $this->AnggotaMd->get_anggota(); //ambil data dari Models 
		$this->load->view('output/anggota', $data); // Kirim data ke View

	}

	public function kategori_view()
	{
		$data["dt_kategori"] = $this->KategoriMd->get_kategori(); //ambil data dari Models 
		$this->load->view('output/jenis-layanan', $data); // Kirim data ke View

	}

	public function simpanan_view()
	{
		$data['simpan'] =$this->SimpanMd->get_simpanan();
		$this->load->view('output/simpanan',$data);

	}

	public function simpananWajib_wiew(){
		$data['simpan'] =$this->SimpanMd->get_simpananWajib();
		$this->load->view('output/simpananWajib',$data);
	}


	public function simpananPokok_view(){
		$data['simpan'] =$this->SimpanMd->get_simpananPokok();
		$this->load->view('output/simpananPokok',$data);
	}

	public function simpanan_pokok_detail_view($id_anggota, $id_kategori){
		$data['detailSimpok'] = $this->SimpanMd->get_detailSimpananPokok($id_anggota, $id_kategori);
		$this->load->view("output/simpananPokokDetail", $data);
	}
	

	public function simpanan_wajib_detail_view($id_anggota, $id_kategori){
		$data['detailWajib'] = $this->SimpanMd->get_detailSimpananWajib($id_anggota, $id_kategori);
		$this->load->view("output/simpananWajibDetail", $data);
	}

	public function withdraw_view(){
		$data['withdraw'] =$this->WithdrawMd->get_withdraw();
		$this->load->view('output/withdraw',$data);
	}

	public function witdraw_detail_view($id_anggota){
		$data['detailwithdraw'] = $this->WithdrawMd->get_detailSimpananPokok($id_anggota);
		$this->load->view("output/detail_withdraw", $data);
	}

	// public function pinjaman_view($id_pinjaman)
	// {
	// 	$data['pinjam'] =$this->PinjamMd->get_pinjaman($id_pinjaman);
	// 	$this->load->view('output/pinjaman',$data);

	// }

	public function angsuran_view()
	{
		$data['angsuran'] =$this->PinjamMd->get_angsuran();
		$this->load->view('output/angsuran',$data);

	}

	public function keuangan_view(){
		$data['keuangan']= $this->PerusahaanMd->get_keuangan();
		$this->load->view('output/keuangan_perusahaan', $data);
	}

	public function angsuran_detail_view($id_pinjaman)
	{ 
		$ifnull = $data['angsuran_ke'] = $this->PinjamMd->get_pembayaran_angsuran($id_pinjaman);
		if($ifnull == null){
			$this->PinjamMd->selesaiPinjaman($id_pinjaman);
		}
		$data['max_angsuran'] = $this->PinjamMd->get_max_cicilan($id_pinjaman);
	    $data['dtpangsuran'] =$this->PinjamMd->get_detailPinjamanAngsuran($id_pinjaman);
	    $data['dtangsuran'] =$this->PinjamMd->get_detailAngsuran($id_pinjaman);
		$this->load->view('output/angsuran_detail',$data);

	}





 

	// Khusus Untuk Input =======================================================================================

	public function admin_add()
	{
		$this->load->view('input/add-admin');

	}

	public function anggota_add()
	{
		$this->load->view('input/add-anggota');

	}

	public function keuangan_add(){
		$this->load->view('input/add-keuangan');
	}

	public function simpanan_add()
	{
		$data["anggota"] = $this->AnggotaMd->get_anggota(); 
		$data["kategori"] = $this->KategoriMd->get_kategori(); //ambil data dari Models 
		$this->load->view('input/add-simpanan', $data);

	}

	public function pinjaman_add()
	{
		$data['anggota'] = $this->AnggotaMd->get_anggota();
		$data["kategori"] = $this->KategoriMd->get_kategori(); //ambil data dari Models 
		$this->load->view('input/add-pinjaman', $data);

	}

	public function angsuran_add()
	{
		$data["kategori"] = $this->KategoriMd->get_kategori(); //ambil data dari Models 
		$this->load->view('input/add-angsuran', $data);

	}

	public function bayar_angsuran_add($id_pinjaman){

		$data['angsuran_ke'] = $this->PinjamMd->get_pembayaran_angsuran($id_pinjaman);
		$this->load->view('input/add-pembayaran-angsuran', $data);
	}

	public function withdraw_add()
	{
		$data['anggota'] = $this->AnggotaMd->get_anggota();
		$data["kategori"] = $this->KategoriMd->get_kategori(); //ambil data dari Models 
		$this->load->view('input/add-withdraw', $data);

	}

	public function kategori_add()
	{
		$this->load->view('input/add-kategori');

	}

	public function transaksi_add()
	{
		$this->load->view('input/add-transaksi');

	}


	//  Untuk Save
	public function admin_save(){
		$add_admin = $this->AdminMd;
        $validation = $this->form_validation;
        $validation->set_rules($add_admin->rules());

        if ($validation->run()) {
            $add_admin->save();
            $this->session->set_flashdata('success', '<h6><i>Data Berhasil disimpan</i></h6>');
        }

		redirect(site_url('HomeCtr/admin_view'));
	}

	public function anggota_save(){
		
		$add_admin = $this->AnggotaMd;
        $validation = $this->form_validation;
        $validation->set_rules($add_admin->rules());

        if ($validation->run()) {
		
			$this->AnggotaMd->save_anggota();
			
            $this->session->set_flashdata('success', '<h6><i>Register Selesai, Data Berhasil disimpan</i></h6>');
        }

		redirect(site_url('HomeCtr/anggota_view'));
	}



	public function kategori_save(){
		
    	$this->KategoriMd->save();
    	$this->session->set_flashdata('success', '<h6><i>Data Berhasil disimpan</i></h6>');
    
		redirect(site_url('HomeCtr/kategori_view'));
	}

	public function keuangan_save(){
		$cek_data = $data['cek_data'] = $this->PerusahaanMd->get_keuanganCount();
		
		if($cek_data == 0){
		$this->PerusahaanMd->add_keuangan();
		$this->session->set_flashdata('success','<h6><i>Data Berhasil disimpan</i></h6>');
		}else{

			$ambil_data_sebelumnya = $data['keuangan'] = $this->PerusahaanMd->get_keuangan();
			foreach ($ambil_data_sebelumnya as $dsebelumnya){
			$debitSebelumnya =	$dsebelumnya->debit;
			$kreditSebelumnya =  $dsebelumnya->kredit;
			}

			$debitBaru = $this->input->post('debit');
			$kreditBaru = $this->input->post('kredit');
			$debit  = $debitSebelumnya + $debitBaru ;
			$kredit = $kreditSebelumnya+ $kreditBaru;

			$this->PerusahaanMd->addup_keuanganlanjutan($debit, $kredit);

		}

		redirect('HomeCtr/keuangan_view');
	}

	public function angsuran_cicilan_save($id){

		$ambil_data_sebelumnya = $data['keuangan'] = $this->PerusahaanMd->get_keuangan();
			foreach ($ambil_data_sebelumnya as $dsebelumnya){
			$debitSebelumnya =	$dsebelumnya->debit;
			}
			$debitBaru = $this->input->post('jumlah_bayar');
			$debit = $debitSebelumnya + $debitBaru;
			$this->PerusahaanMd->addup_keuanganAngsuran($debit);
	   	    $this->PinjamMd->add_cicilan_bulanan();
		$this->session->set_flashdata('success', '<h6><i>Data angsuran Perbulan berhasil </i></h6>');
		redirect('HomeCtr/angsuran_detail_view/'.$id);
	}
	


	public function simpanan_save()
	{
		$idk = $this->input->post('id_kategori');
		$id_anggota = $this->input->post('id_anggota');
		$data0 = $this->SimpanMd->addup_simpanByID($id_anggota);
		foreach($data0 as $d):
			$cek_ida = $d->id_anggota;
		endforeach;
		

		if(@$cek_ida == null){

			$this->SimpanMd->add_simpan();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			

		}elseif(@$cek_ida == !null && $idk == 3){

			$this->SimpanMd->addup_simpan();
			$data1 = $this->SimpanMd->addup_simpanByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->debit_simwajib;
			endforeach;

			$dbaru = $this->input->post('jumlah');
			$debit = $dlama + $dbaru;
			
			$this->SimpanMd->addup_lanjutan($debit,$id_anggota,$idk);
			$this->session->set_flashdata('success', 'Data Simpanan Wajib Berhasil Disimpan');
		}elseif(@$cek_ida == !null && $idk == 5){
			$this->SimpanMd->addup_simpan();
			$data1 = $this->SimpanMd->addup_simpanByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->debit_simpokok;
			endforeach;

			$dbaru = $this->input->post('jumlah');
			$debit = $dlama + $dbaru;
		
			$this->SimpanMd->addup_lanjutan($debit,$id_anggota,$idk);
			$this->session->set_flashdata('success', 'Data Simpanan Pokok Berhasil Disimpan');
		}
		redirect('HomeCtr/simpanan_view');
		
	}

	public function pinjaman_save()
	{
		$id_pinjaman = $this->input->post('id_peminjaman');

		$id_anggota = $this->input->post('id_anggota');
	
		$data0 = $this->SimpanMd->addup_simpanByID($id_anggota);
		foreach($data0 as $d):
			$cek_ida = $d->kredit_peminjaman ;
		endforeach;
	
		if(@$cek_ida == null){
			// untuk update di tabel keuangan perusaahaan karena di ada peminjaman
			$ambil_data_sebelumnya = $data['keuangan'] = $this->PerusahaanMd->get_keuangan();
			foreach ($ambil_data_sebelumnya as $dsebelumnya){
			$debitSebelumnya =	$dsebelumnya->debit;
			}
			$kreditBaru = $this->input->post('jumlah_pinjaman');
			$debit = $debitSebelumnya - $kreditBaru;
			$this->PerusahaanMd->addup_keuanganPinjaman($debit);
			// insert di tabel Peminjaman dan insert tabel master keuangan
			$this->PinjamMd->add_pinjam();

			// insert ke tabel angsuran
			$this->PinjamMd->add_angsuran();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			

		}elseif($cek_ida == 0){
			// untuk update di tabel keuangan perusaahaan karena di ada peminjaman
			$ambil_data_sebelumnya = $data['keuangan'] = $this->PerusahaanMd->get_keuangan();
			foreach ($ambil_data_sebelumnya as $dsebelumnya){
			$debitSebelumnya =	$dsebelumnya->debit;
			}
			$kreditBaru = $this->input->post('jumlah_pinjaman');
			$debit = $debitSebelumnya - $kreditBaru;
			$this->PerusahaanMd->addup_keuanganPinjaman($debit);

			// insert di tabel Peminjaman saja
			$this->PinjamMd->addup_pinjam();
			// ambil data sebelmnya ntuk di update
			$data1 = $this->PinjamMd->addup_pinjamByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->kredit_peminjaman ;
			endforeach;
			
			$dbaru = $this->input->post('jumlah_pinjaman');
			$kredit = $dlama + $dbaru;
			// data yg di ambil di update disini
			$this->PinjamMd->addup_lanjutan_pnj($kredit,$id_anggota);
			// insert ke tabel angsuran
			$this->PinjamMd->add_angsuran();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}else{
			// untuk update di tabel keuangan perusaahaan karena di ada peminjaman
			$ambil_data_sebelumnya = $data['keuangan'] = $this->PerusahaanMd->get_keuangan();
			foreach ($ambil_data_sebelumnya as $dsebelumnya){
			$debitSebelumnya =	$dsebelumnya->debit;
			}
			$kreditBaru = $this->input->post('jumlah_pinjaman');
			$debit = $debitSebelumnya - $kreditBaru;
			$this->PerusahaanMd->addup_keuanganPinjaman($debit);
        	// insert di tabel Peminjaman saja
			$this->PinjamMd->addup_pinjam();
			// ambil data sebelmnya ntuk di update
			$data1 = $this->PinjamMd->addup_pinjamByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->kredit_peminjaman ;
			endforeach;
			
			$dbaru = $this->input->post('jumlah_pinjaman');
			$kredit = $dlama + $dbaru;
			// data yg di ambil di update disini
			$this->PinjamMd->addup_lanjutan_pnj($kredit,$id_anggota);
			// insert ke tabel angsuran
			$this->PinjamMd->add_angsuran();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		
		
		redirect('HomeCtr/angsuran_detail_view/'.$id_pinjaman);
		
	}
	public function withdraw_save(){
		
		$idk = $this->input->post('id_kategori');
		$id_anggota = $this->input->post('id_anggota');
		$data0 = $this->SimpanMd->addup_simpanByID($id_anggota);
		foreach($data0 as $d):
			$cek_ida = $d->id_anggota;
		endforeach;
		

		if(@$cek_ida == null){

			$this->session->set_flashdata('success', ' Tidak Memiliki Simpanan');
			

		}elseif(@$cek_ida == !null && $idk == 3){

			$this->WithdrawMd->add_withdraw();
			$data1 = $this->WithdrawMd->addup_withdrawByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->debit_simwajib;
			endforeach;
			if( $dlama == 0){
				redirect(site_url('HomeCtr/withdraw_kosong'));
			}

			$dbaru = $this->input->post('jumlah_withdraw');
			$debit = $dlama - $dbaru;
			$this->WithdrawMd->addup_withdrawlanjutan($debit,$id_anggota,$idk);
			$this->session->set_flashdata('success', 'Data Simpanan Wajib Berhasil Disimpan');
		}elseif(@$cek_ida == !null && $idk == 5){

			$this->WithdrawMd->add_withdraw();
			$data1 = $this->WithdrawMd->addup_withdrawByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->debit_simpokok;
			endforeach;
			if( $dlama == 0){
				redirect(site_url('HomeCtr/withdraw_kosong'));
			}
			$dbaru = $this->input->post('jumlah_withdraw');
			$debit = $dlama - $dbaru;
		
			$this->WithdrawMd->addup_withdrawlanjutan($debit,$id_anggota,$idk);
			$this->session->set_flashdata('success', 'Data Simpanan Pokok Berhasil Disimpan');
		}
    
    
    
		redirect(site_url('HomeCtr/withdraw_view'));
	}



	// Untuk Delete =======================================================================================
	public function admin_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->AdminMd->delete($id)) {
            redirect(site_url('HomeCtr/admin_view'));
		}
	}

	public function anggota_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->AnggotaMd->delete($id)) {
            redirect(site_url('HomeCtr/anggota_view'));
		}
	}

	public function kategori_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->KategoriMd->delete($id)) {
            redirect(site_url('HomeCtr/kategori_view'));
		}
	}


	public function simwajib_del($id, $idm , $idk)
    {
      
           $this->SimpanMd->del_simpan($id);
            redirect(site_url('HomeCtr/Simpanan_wajib_detail_view/'.$idm.'/'.$idk));
		
	}

	public function simpokok_del($id, $idm , $idk)
    {   
        	$this->SimpanMd->del_simpan($id);
            redirect(site_url('HomeCtr/Simpanan_wajib_detail_view/'.$idm.'/'.$idk));
		
	}
	public function peminjaman_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->PinjamMd->del_pinjam($id)) {
            redirect(site_url('HomeCtr/pinjaman_view'));
		}
	}



// Untuk Edit  =======================================================================================
	public function admin_edd($id)
	{
		$data["up_admin"] = $this->AdminMd->getById($id); //ambil data dari Models 
		$this->load->view('update/upd-admin', $data); // Kirim data ke View
	
	}

	public function keuangan_edd($id)
	{
		$data["up_keuangan"] = $this->PerusahaanMd->get_keuanganid_ById($id); //ambil data dari Models 
	
		$this->load->view('update/upd-keuangan', $data); // Kirim data ke View
	
	}

	public function anggota_edd($id)
	{
		$data["anggota"] = $this->AnggotaMd->getById($id); //ambil data dari Models 
		$this->load->view('update/upd-anggota', $data); // Kirim data ke View
	
	}
	public function barang_edd($id)
	{
		$data["dt_kategori"] = $this->KategoriMd->get_kategori(); 
		$data["up_barang"] = $this->BarangMd->get_barang_ById($id); //ambil data dari Models 
		$this->load->view('update/upd-barang', $data); // Kirim data ke View
	
	}


	
	public function kategori_edd($id)
	{
		$data["up_kategori"] = $this->KategoriMd->getById($id); //ambil data dari Models 
		$this->load->view('update/upd-kategori', $data); // Kirim data ke View
	
	}



	// Untuk Update
	public function admin_update(){   
        $up_admin = $this->AdminMd;
        $validation = $this->form_validation;
        $validation->set_rules($up_admin->rules());

        if ($validation->run()) {
         $data =   $up_admin->update();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
        }

		redirect(site_url('HomeCtr/admin_view'));
	}


	public function anggota_update(){   
        $up_anggota = $this->AnggotaMd;
        $validation = $this->form_validation;
        $validation->set_rules($up_anggota->rules());

        if ($validation->run()) {
         	$data =   $up_anggota->update_anggota();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
        }

		redirect(site_url('HomeCtr/anggota_view'));
	}


	public function kategori_update(){   
       
		$this->KategoriMd->update();
		$this->session->set_flashdata('success', 'Berhasil diupdate');

		redirect(site_url('HomeCtr/kategori_view'));
	}

	
	public function keuangan_update(){   
       
		$this->PerusahaanMd->update_keuangan();
		$this->session->set_flashdata('success', 'Berhasil diupdate');

		redirect(site_url('HomeCtr/keuangan_view'));
	}


	

	






}
