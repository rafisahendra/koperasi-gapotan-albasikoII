<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SimpanMd extends CI_Model
{
    // untuk Get data ========================================
    public function get_simpanan(){
     
        $this->db->select('t.*,  a.nama_lengkap');
        $this->db->from('master_transaksi t');
        $this->db->join('anggota a', 't.id_anggota = a.id_anggota');
        $this->db->where('debit_simwajib !=', 0);
        return $this->db->get('')->result();   
    } 

    public function get_simpananWajib(){

        $this->db->select('SUM(jumlah_simpanan)');
        $this->db->select('p.*,  a.nama_lengkap , k.nama_kategori');
        $this->db->from('penyimpanan p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('k.id_kategori', 3);
        $this->db->group_by("a.id_anggota");
        return $this->db->get('')->result();
    }

    public function get_simpananPokok(){

        $this->db->select_sum('jumlah_simpanan');
        $this->db->select('p.*,  a.nama_lengkap , k.nama_kategori');
        $this->db->from('penyimpanan p');
        $this->db->join('anggota a', 'p.id_anggota = a.id_anggota');
        $this->db->join('kategori k', 'p.id_kategori = k.id_kategori');
        $this->db->where('k.id_kategori', 5);
        $this->db->group_by("a.id_anggota");
        return $this->db->get('')->result();
    }


    // untuk Get ByID ========================================
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



    // Untuk  Insert add ========================================
    // ========================================= selsesai ================================== 
    public function add_simpan(){

        $id_kategori = $this->input->post('id_kategori');
        $post = $this->input->post();

        //  input table penyimpanan
        $this->db->set('id_anggota',    $post['id_anggota']);
        $this->db->set('id_kategori',     $post['id_kategori']);
        $this->db->set('jumlah_simpanan', $post['jumlah']);
        $this->db->set('tanggal_simpanan',date('Y-m-d'));
        $this->db->insert('penyimpanan');

        // input tabel master
        $this->db->set('id_anggota', $post['id_anggota']);

        if($id_kategori == 3){
            $this->db->set('debit_simwajib ', $post['jumlah']);
        }else{
            $this->db->set('debit_simpokok ', $post['jumlah']);
        }
        $this->db->insert('master_transaksi');


    }


    public function addup_simpan(){
        $post = $this->input->post();
        $ida = $post['id_anggota'];
        //  input table penyimpanan
        $this->db->set('id_anggota',    $ida);
        $this->db->set('id_kategori',     $post['id_kategori']);
        $this->db->set('jumlah_simpanan', $post['jumlah']);
        $this->db->set('tanggal_simpanan',date('Y-m-d'));
        $this->db->insert('penyimpanan');

    }

    public function addup_simpanByID($ida){
        return $this->db->get_where('master_transaksi', array('id_anggota'=> $ida))->result();
    }


    public function addup_lanjutan($debit,$ida,$idk){
        
          // update tabel master
          if($idk == 3){
            $this->db->set('debit_simwajib ', $debit);
        }else{
            $this->db->set('debit_simpokok', $debit);
        } 
          $this->db->where('id_anggota', $ida);
          $this->db->update('master_transaksi');
    }    

    // ======================================= SELESAI =========================================== 
    //  Untuk Delete data ========================================
    public function del_detail($id){

        $this->db->delete('transaksi_detail', array('id_detail' => $id));
    }

    public function transaksi_del($id)
    {
        $this->db->delete('transaksi', array('id_transaksi' => $id));
    }

    





    // Untuk Laporan data
    public function get_laporan_perhari(){
        
        $this->db->select('*');
        $this->db->from('transaksi ');
        $this->db->where('tgl_transaksi', $this->input->post('hari'));
        return $this->db->get('')->result();


    }

    public function get_laporan_perbulan(){

        $bulan = $this->input->post('bulan'); 
        $this->db->select("*,sum(qty) as pj FROM transaksi WHERE tgl_transaksi LIKE '$bulan%' group BY id_transaksi");     

        return  $this->db->get('')->result();
    }

    public function get_laporan_pertahun(){
        $tahun = $this->input->post('tahun'); 
        $this->db->select("*,sum(qty) as pj, sum(total) as pt , MONTH(tgl_transaksi) as bln FROM transaksi WHERE  YEAR(tgl_transaksi)='$tahun' Group BY MONTH(tgl_transaksi)");     

        return  $this->db->get('')->result_array();

    }
 
}