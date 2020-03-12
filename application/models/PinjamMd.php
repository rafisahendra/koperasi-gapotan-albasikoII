<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamMd extends CI_Model
{
    // untuk Get data
    public function get_pinjaman($id_pinjaman){
        $this->db->select('p.*,  a.nama_lengkap');
        $this->db->from('peminjaman p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->where('id_peminjaman ',$id_pinjaman );
        return $this->db->get('')->result();   
    } 

    public function get_laporan_pinjaman(){
        $this->db->select('p.*,  a.nama_lengkap');
        $this->db->from('peminjaman p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        return  $this->db->get('')->result();
    }


    public function get_max_cicilan($id_peminjaman){
        $this->db->select_max('angsuran_ke');
        $this->db->where('id_peminjaman',$id_peminjaman);
        return $this->db->get('angsuran')->row();
    }

    public function get_angsuran(){
        $this->db->select('p.*,  a.nama_lengkap');
        $this->db->from('peminjaman p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
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

    public function get_pembayaran_angsuran($id_pinjaman){

    
        $this->db->select("
        angsuran.id_peminjaman,
        angsuran.id_angsuran,
        angsuran.angsuran_ke,
        angsuran.batas_bayar,
        angsuran.jumlah_bayar,
        IFNULL(pembayaran_angsuran.dibayar, 0) AS dibayar 
        From
        angsuran Left Join 
        (SELECT pembayaran_angsuran.id_angsuran, SUM(IFNULL(pembayaran_angsuran.jumlah_bayar, 0)) As dibayar FROM pembayaran_angsuran WHERE pembayaran_angsuran.status_pembayaran = 'Sudah Dibayar' GROUP BY pembayaran_angsuran.id_angsuran) pembayaran_angsuran
        ON pembayaran_angsuran.id_angsuran = angsuran.id_angsuran WHERE angsuran.id_peminjaman = '$id_pinjaman' AND 
        IFNULL(pembayaran_angsuran.dibayar, 0) < angsuran.jumlah_bayar 
        ORDER BY angsuran.id_angsuran ASC LIMIT 1");

      return $this->db->get('')->row_array();  
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
         
        $lama= $post['lama_pinjaman'];
        $bunga= $post['bunga_pinjaman'];
        $jumlah = $post['jumlah_pinjaman'];
        $bunga_persen = ($bunga / 100);
        $bunga_pinjaman = ($bunga_persen) * ($jumlah) ;
         // input tabel master
         $this->db->set('id_anggota', $post['id_anggota']);
         $this->db->set('kredit_peminjaman', $post['jumlah_pinjaman']);
         $this->db->set('bunga_peminjaman ', $bunga_pinjaman );
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

    public function add_cicilan_bulanan(){
        $post = $this->input->post();
        $this->db->set('id_angsuran', $post['id_angsuran']);
        $this->db->set('tanggal_bayar', $post['tanggal_bayar']);
        $this->db->set('jumlah_bayar', $post['jumlah_bayar']);
        $this->db->set('status_pembayaran','Sudah Dibayar');
        $this->db->insert('pembayaran_angsuran');

        $this->db->set('status ', 1);
        $this->db->where('id_angsuran', $post['id_angsuran']);
        $this->db->update('angsuran');

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
                $this->db->set('angsuran_ke',      $x);
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

  public function selesaiPinjaman($id_pinjaman){
        
    $this->db->set('status ', 1);
    $this->db->where('id_peminjaman', $id_pinjaman);
    $this->db->update('peminjaman');
}   
    // ======================================= SELESAI =========================================== 
    //  Untuk Delete data
    public function del_pinjam($id){

        return  $this->db->delete('peminjaman', array('id_peminjaman' => $id));
    }
  
 

 
}