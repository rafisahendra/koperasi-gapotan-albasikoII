
<?php $this->load->view("header") ?>
<div class="row">
    <div class="col-md-12">

  
<form class="form-horizontal" action="<?php echo site_url('HomeCtr/pinjaman_save') ?>" method="post" enctype="multipart/form-data"  name="formAngsuran">
<input type="hidden" class="form-control" value="<?= uniqid() ?>" name="id_peminjaman" required />
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> Tambah <strong>Pinjam Dana</strong></h3>
                    <ul class="panel-controls">
                    <li><a href="<?php echo site_url('HomeCtr/pinjaman_view') ?>" ><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <p>Tambah Untuk Pinjaman</p>
                </div>
                <div class="panel-body">

                   
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Nama Anggota </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <select name="id_anggota" id="" class="form-control" required>
                                   <option value="">- Pilih Anggota -</option>
                               <?php foreach($anggota as $d) : ?>
                               <option value="<?= $d->id_anggota ?>"><?= $d->nama_lengkap?></option>

                               <?php endforeach ; ?>
                               </select>
                            </div>
                
                        </div>
                    </div>

                 
                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">jumlah Pinjaman </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="jumlah_pinjaman" required />
                            </div>
                
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Lama Pinjaman </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="lama_pinjaman" required placeholder="Ditulis Berapa Bulan Ex:12" />
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Bunga % Per Bulan</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="bunga_pinjaman" required id="bunga_pinjaman"  autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" onkeyup="hitung_jumlah_angsuran(this)" />
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Besar Angsuran Per Bulan Rp. </label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input style="color:#000" type="text" class="form-control" name="besar_angsuran" readonly/>
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Biaya Administrasi</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="number" class="form-control" name="biaya_administrasi" required  />
                            </div>
                
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-xs-12 control-label">Keterangan</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class=""></span></span>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                
                        </div>
                    </div>
                   
            
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Clear Form</button>
                    <button class="btn btn-primary ">Simpan</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php $this->load->view("footer") ?>

<script type="text/javascript">
    
   function hitung_jumlah_angsuran() {
        var bil1 = document.formAngsuran.jumlah_pinjaman.value;
        var bil2 = document.formAngsuran.lama_pinjaman.value;
        var bil3 = document.formAngsuran.bunga_pinjaman.value;
        if ( isNaN(bil2) || bil1 =="" || bil1 == 0) {
            var hasil = 0;
        } 
        else {
            var bunga = (bil1 / bil2)  * (bil3 / 100);
            var hasil = (bil1 / bil2) + bunga;
        };
        document.formAngsuran.besar_angsuran.value=hasil;
      
    }

</script>
<!-- /SCRIPT -->
