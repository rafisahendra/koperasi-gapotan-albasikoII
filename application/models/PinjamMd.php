<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamMd extends CI_Model
{
    // untuk Get data
    public function get_pinjaman(){
        $this->db->select('t.*,  a.nama_lengkap');
        $this->db->from('master_transaksi t');
        $this->db->join('anggota a', 't.id_anggota = a.id_anggota');
        $this->db->where('kredit_peminjaman !=', 0);
        return $this->db->get('')->result();   
    } 

    public function get_angsuran(){
        $this->db->select('p.*,  a.nama_lengkap');
        $this->db->from('peminjaman p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->group_by("a.id_anggota");
        return $this->db->get('')->result();   
    } 

    public function get_detailAngsuran($id_pinjaman){
        $this->db->select('*');
        $this->db->from('angsuran');
        $this->db->where('id_peminjaman', $id_pinjaman);
       
        return $this->db->get('')->result();
    }

    public function get_detailPinjamanAngsuran($id_pinjaman){
        $this->db->select('p.*, a.nama_lengkap');
        $this->db->from('peminjaman p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->where('id_peminjaman', $id_pinjaman);
       
        return $this->db->get('')->row();
    }

    // untuk Get ByID
    public function get_detail_ById($id){
        $this->db->select('d.*, b.nama_barang , b.harga');
        $this->db->from('transaksi_detail d');
        $this->db->join('barang b', 'd.id_barang = b.id_barang');
        $this->db->where('d.id_transaksi', $id);
        return $this->db->get()->result();
    }

    public function get_detailid_ById($id){
        return $this->db->get_where('transaksi_detail', array('id_transaksi'=> $id))->row();
    }


    // Untuk  Insert add
     // ======================================= SELESAI =========================================== 
    public function add_pinjam(){

        $post = $this->input->post();
        $this->db->set('id_peminjaman',   $post['id_peminjaman']);
        $this->db->set('id_anggota',      $post['id_anggota']);
        $this->db->set('jumlah_pinjaman', $post['jumlah_pinjaman']);
        $this->db->set('lama_pinjaman',   $post['lama_pinjaman']);
        $this->db->set('bunga_pinjaman',  $post['bunga_pinjaman']);
        $this->db->set('besar_angsuran',  $post['besar_angsuran']);
        $this->db->set('biaya_administrasi',$post['biaya_administrasi']);
        $this->db->set('keterangan',        $post['keterangan']);
        $this->db->set('tanggal_pinjam',  date('Y-m-d'));
        $this->db->insert('peminjaman');

         // input tabel master
         $this->db->set('id_anggota', $post['id_anggota']);
         $this->db->set('kredit_peminjaman', $post['jumlah_pinjaman']);
         $this->db->insert('master_transaksi');



    }

    public function addup_pinjam(){

        $post = $this->input->post();
        $this->db->set('id_peminjaman',   $post['id_peminjaman']);
        $this->db->set('id_anggota',      $post['id_anggota']);
        $this->db->set('jumlah_pinjaman', $post['jumlah_pinjaman']);
        $this->db->set('lama_pinjaman',   $post['lama_pinjaman']);
        $this->db->set('bunga_pinjaman',  $post['bunga_pinjaman']);
        $this->db->set('besar_angsuran',  $post['besar_angsuran']);
        $this->db->set('biaya_administrasi',$post['biaya_administrasi']);
        $this->db->set('keterangan',        $post['keterangan']);
        $this->db->set('tanggal_pinjam',  date('Y-m-d'));
        $this->db->insert('peminjaman');


  

    }

    public function add_angsuran(){
    //  input ke tabel Angsuran
    // tanggal batas waktu per bulan
    $tgl_bayar_angsuran_per_bulan = date('Y-m-d', strtotime("+1 months", strtotime(date('Y-m-d'))));
    $post = $this->input->post();
    $lama_pinjaman = $post['lama_pinjaman'];
	for($x = 1; $x <= $lama_pinjaman; $x++)
	{
    // tambah data angsuran perbulan    
    
            $this->db->set('id_peminjaman',   $post['id_peminjaman']);
            $this->db->set('cicilan_ke',      $x);
            $this->db->set('batas_bayar',     $tgl_bayar_angsuran_per_bulan);
            $this->db->set('jumlah_bayar',  $post['besar_angsuran']);
            $this->db->insert('angsuran');
	
	// tambahkan tanggal angsuran tadi 1 bulan kedepan
	$tgl_bayar_angsuran_per_bulan = date('Y-m-d', strtotime("+1 months", strtotime($tgl_bayar_angsuran_per_bulan)));
	} 
    }
    public function addup_pinjamByID($ida){
        return $this->db->get_where('master_transaksi', array('id_anggota'=> $ida))->result();
    }

    public function addup_lanjutan_pnj($kredit,$ida){
        
        // update tabel master
        $this->db->set('kredit_peminjaman ', $kredit);
        $this->db->where('id_anggota', $ida);
        $this->db->update('master_transaksi');
  }   
    // ======================================= SELESAI =========================================== 
    //  Untuk Delete data
    public function del_pinjam($id){

        return  $this->db->delete('peminjaman', array('id_peminjaman' => $id));
    }
  
 

 
}