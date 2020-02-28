<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMd extends CI_Model
{
    private $_table = "admin";

    public $id_admin;
    public $nama_lengkap;
    public $nohp;
    public $alamat;
    public $level; 
    public $password;
    public $email;

    // Validasi
    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama Harap Di isi',
            'rules' => 'required'],

            ['field' => 'nohp',
            'label' => 'Nohp Harap Di isi',
            'rules' => 'required'],
            
            ['field' => 'alamat',
            'label' => 'Alamat Harap Di isi',
            'rules' => 'required'],
            
            ['field' => 'level',
            'label' => 'Level Harap Di isi',
            'rules' => 'required'],

            ['field' => 'password',
            'label' => 'password Harap Di isi',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email Harap Di isi',
            'rules' => 'required']
        ];
    }

    public function rules_login(){
        return [
            
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'required'],

            ['field' => 'pass',
            'label' => 'password',
            'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_admin" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
       
        $this->nama_lengkap = $post["nama"];
        $this->nohp         = $post["nohp"];
        $this->alamat       = $post["alamat"];
        $this->level        = $post["level"];
        $this->password     = md5($post["password"]);
        $this->email        = $post["email"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_admin = $post["id"];
        $this->nama_lengkap = $post["nama"];
        $this->nohp         = $post["nohp"];
        $this->alamat       = $post["alamat"];
        $this->level        = $post["level"];
        $this->password     = md5($post["password"]);
        $this->email        = $post["email"];
        return $this->db->update($this->_table, $this, array('id_admin' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_admin" => $id));
    }



    // public function get_barangCount(){
    //     return $this->db->count_all_results('barang');
    // }

    // public function get_transaksiCount(){
        
    //     return $this->db->count_all('transaksi');
    // }

    public function get_adminCount(){
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('level', 1);
        return $this->db->count_all_results('');
    }

}