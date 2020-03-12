<?php defined('BASEPATH') OR exit('No direct script access allowed');

class PerusahaanMd extends CI_Model
{
    // untuk Get data ========================================
    public function get_keuangan(){
      
        return $this->db->get('keuangan_perusahaan')->result();   
    } 

    // untuk Get ByID ========================================

    public function get_keuanganid_ById($id){
        return $this->db->get_where('keuangan_perusahaan', array('id_keuangan'=> $id))->row();
    }


    // Untuk  Insert add ========================================
    // ========================================= selsesai ================================== 
    public function add_keuangan(){
        $post = $this->input->post();
        //  input table penyimpanan
        $this->db->set('debit',    $post['debit']);
        $this->db->set('kredit',    $post['kredit']);
        $this->db->insert('keuangan_perusahaan');
        

    }

    public function get_keuanganCount(){
        return $this->db->count_all_results('keuangan_perusahaan');
    }

    public function addup_keuanganlanjutan($debit,$kredit){
        
        $this->db->set('debit', $debit);
        $this->db->set('kredit', $kredit);
        $this->db->update('keuangan_perusahaan');
    }    
    
    public function addup_keuanganPinjaman($debit){
    
           $this->db->set('debit', $debit);
           $this->db->update('keuangan_perusahaan');
       }    
       public function addup_keuanganAngsuran($debit){
    
        $this->db->set('debit', $debit);
        $this->db->update('keuangan_perusahaan');
    }    


    public function update_keuangan(){
        
        // update tabel master
            
           $this->db->set('debit', $this->input->post('debit'));
           $this->db->set('kredit', $this->input->post('kredit'));
           $this->db->set('id_keuangan', $this->input->post('id'));
           $this->db->update('keuangan_perusahaan');
       }    
   
    // ======================================= SELESAI =========================================== 
    //  Untuk Delete data ========================================
  
   
    




}