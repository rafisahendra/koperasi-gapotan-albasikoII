<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaMd extends CI_Model
{
    private $_table = "anggota";

    public $id_anggota;
    public $nik;
    public $tempat_lahir;
    public $tgl_lahir;
    public $pekerjaan;
    public $nama_lengkap;
    public $agama;
    public $tgl_registrasi;
    public $jenis_kelamin;
    public $nohp;
    public $alamat;
    public $level; 
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


            ['field' => 'nik',
            'label' => 'Nik Harap Di isi',
            'rules' => 'required'],

            ['field' => 'jenis_kelamin',
            'label' => 'Jenis kelamin Harap Di isi',
            'rules' => 'required'],
            ['field' => 'tempat_lahir',
            'label' => 'Tempat lahir Harap Di isi',
            'rules' => 'required'],

            ['field' => 'tgl_lahir',
            'label' => 'Tanggal lahir Harap Di isi',
            'rules' => 'required'],

            ['field' => 'pekerjaan',
            'label' => 'Pekerjaan Harap Di isi',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'Email Harap Di isi',
            'rules' => 'required']
        ];
    }

    public function get_anggota()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_anggota" => $id])->row();
    }

    public function save_anggota()
    {
        $post = $this->input->post();
        $this->nik          = $post["nik"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tgl_lahir    = $post["tgl_lahir"];
        $this->pekerjaan    = $post["pekerjaan"];
        $this->nama_lengkap = $post["nama"];
        $this->agama        = $post["agama"];
        $this->tgl_registrasi= date('Y-m-d');
        $this->jenis_kelamin= $post["jenis_kelamin"];
        $this->nohp         = $post["nohp"];
        $this->alamat       = $post["alamat"];
        $this->level        = 3;
        $this->email        = $post["email"];
        return $this->db->insert($this->_table, $this);
    }

    public function update_anggota()
    {
        $post = $this->input->post();
        $this->id_anggota   = $post["id"];
        $this->nik          = $post["nik"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tgl_lahir    = $post["tgl_lahir"];
        $this->pekerjaan    = $post["pekerjaan"];
        $this->nama_lengkap = $post["nama"];
        $this->agama        = $post["agama"];
        $this->jenis_kelamin= $post["jenis_kelamin"];
        $this->nohp         = $post["nohp"];
        $this->alamat       = $post["alamat"];
        $this->level        = $post["level"];
        $this->email        = $post["email"];
        return $this->db->update($this->_table, $this, array('id_anggota' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_anggota" => $id));
    }



    
}