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
		$this->load->library('form_validation');
		$this->load->library('session');
		

		if( ! $this->session->userdata('email')){
			redirect('auth');
		}
	}
	
	public function index()
	{


		// $data["count_barang"] = $this->AdminMd->get_barangCount(); //ambil data dari Models 
		//$data["count_transaksi"] = $this->AdminMd->get_transaksiCount(); //ambil data dari Models 
		$data["count_admin"] = $this->AdminMd->get_adminCount(); //ambil data dari Models 
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

	public function withdraw_view(){
		$data['withdraw'] =$this->WithdrawMd->get_withdraw();
		$this->load->view('output/withdraw',$data);
	}

	public function pinjaman_view()
	{
		$data['pinjam'] =$this->PinjamMd->get_pinjaman();
		$this->load->view('output/pinjaman',$data);

	}

	public function angsuran_view()
	{
		$data['angsuran'] =$this->PinjamMd->get_angsuran();
		$this->load->view('output/angsuran',$data);

	}

	public function angsuran_detail_view($id_pinjaman)
	{
		
	    $data['dtpangsuran'] =$this->PinjamMd->get_detailPinjamanAngsuran($id_pinjaman);
	    $data['dtangsuran'] =$this->PinjamMd->get_detailAngsuran($id_pinjaman);
		$this->load->view('output/angsuran_detail',$data);

	}


	public function perhari(){
		$data['perhari'] = $this->TransaksiMd->get_laporan_perhari();
		$data['tgl'] = $this->input->post('hari');

		$this->load->view('output/perhari', $data);
	}


	public function perbulan(){
		$data['perbulan'] = $this->TransaksiMd->get_laporan_perbulan();
		$data['bulan'] = $this->input->post('bulan');
		$this->load->view('output/perbulan', $data);

	}


	public function pertahun(){
		$data['pertahun'] = $this->TransaksiMd->get_laporan_pertahun();
		$data['thn'] = $this->input->post('tahun');

		$this->load->view('output/pertahun', $data);
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


		$id_anggota = $this->input->post('id_anggota');
	
		$data0 = $this->SimpanMd->addup_simpanByID($id_anggota);
		foreach($data0 as $d):
			$cek_ida = $d->kredit_peminjaman ;
		endforeach;
	
		if(@$cek_ida == null){

			$this->PinjamMd->add_pinjam();
			$this->PinjamMd->add_angsuran();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
			

		}elseif($cek_ida == 0){
			$this->PinjamMd->addup_pinjam();
			$data1 = $this->PinjamMd->addup_pinjamByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->kredit_peminjaman ;
			endforeach;
			
			$dbaru = $this->input->post('jumlah_pinjaman');
			$kredit = $dlama + $dbaru;
			$this->PinjamMd->addup_lanjutan_pnj($kredit,$id_anggota);
			$this->PinjamMd->add_angsuran();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}else{

			$this->PinjamMd->addup_pinjam();
			$data1 = $this->PinjamMd->addup_pinjamByID($id_anggota);
			
			foreach($data1 as $d):
				$dlama = $d->kredit_peminjaman ;
			endforeach;
			
			$dbaru = $this->input->post('jumlah_pinjaman');
			$kredit = $dlama + $dbaru;
			$this->PinjamMd->addup_lanjutan_pnj($kredit,$id_anggota);
			$this->PinjamMd->add_angsuran();
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}

		
		redirect('HomeCtr/pinjaman_view');
		
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
    
    
    
		redirect(site_url('HomeCtr/withdraw_add'));
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


	public function penyimpanan_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->SimpanMd->del_simpan($id)) {
            redirect(site_url('HomeCtr/simpanan_view'));
		}
	}

	public function peminjaman_del($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->PinjamMd->del_pinjam($id)) {
            redirect(site_url('HomeCtr/pinjaman_view'));
		}
	}



	// Untuk Edit
	public function admin_edd($id)
	{
		$data["up_admin"] = $this->AdminMd->getById($id); //ambil data dari Models 
		$this->load->view('update/upd-admin', $data); // Kirim data ke View
	
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


	// Untuk Edit  =======================================================================================
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


	public function barang_update(){
		$this->BarangMd->update_barang();
		$this->session->set_flashdata('success','Berhasil Diupdate');
		redirect('HomeCtr/barang_view');

	}






}
