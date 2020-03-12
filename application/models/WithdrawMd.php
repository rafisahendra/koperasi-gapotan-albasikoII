<?php defined('BASEPATH') OR exit('No direct script access allowed');

class WithdrawMd extends CI_Model
{
    // untuk Get data ========================================
    public function get_withdraw(){
        $this->db->select('SUM(jumlah_penarikan) as jp');
        $this->db->select('w.*,  a.nama_lengkap');
        $this->db->from('detail_withdraw w');
        $this->db->join('anggota a', 'w.id_anggota = a.id_anggota');
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
    public function add_withdraw(){
        $post = $this->input->post();

        //  input table penyimpanan
        $this->db->set('id_anggota',    $post['id_anggota']);
        $this->db->set('id_kategori',     $post['id_kategori']);
        $this->db->set('jumlah_penarikan', $post['jumlah_withdraw']);
        $this->db->set('tanggal_penarikan',date('Y-m-d'));
        $this->db->insert('detail_withdraw');


    }


    public function addup_withdraw(){
        $post = $this->input->post();
        $ida = $post['id_anggota'];
        //  input table penyimpanan
        $this->db->set('id_anggota',    $ida);
        $this->db->set('id_kategori',     $post['id_kategori']);
        $this->db->set('jumlah_simpanan', $post['jumlah']);
        $this->db->set('tanggal_simpanan',date('Y-m-d'));
        $this->db->insert('penyimpanan');

    }

    public function addup_withdrawByID($ida){
        return $this->db->get_where('master_transaksi', array('id_anggota'=> $ida))->result();
    }


    public function addup_withdrawlanjutan($debit,$ida,$idk){
        
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

   
    




}