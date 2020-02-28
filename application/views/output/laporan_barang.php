
<!DOCTYPE html>

<head>
	<!-- META SECTION -->
	<title><?php echo SITE_NAME ."-". ucfirst($this->uri->segment(2)) ."-". ucfirst($this->uri->segment(3)) ?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?php echo base_url() ?>/asset/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>/asset/css/theme-default.css" />
	<!-- EOF CSS INCLUDE -->
</head>

<body>
    <div class="container">
        <br>
        <br>
        <div class="row">
        <div class="col-sm-3">
                    <img style="width:250px;"  height="170px" alt="No Image" src="assets/foto_produk/logo.png">
                </div>
                <div class="col-sm-9" style='margin-top:10px'>
                <h1>Koperasi Albasiko</h1>
                <h5>JALAN LINTAS SUMATERA SUNGAI RUMBAI KABUPATEN DHARMASRAYA</h5>
                <h5>WA : 081363967072b <b>/</b> 085383836108</h5>
              
                <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
            </div>
        </div>
        <br>
        <h4 class="col-sm-12" align="center">Laporan Data Barang</h4>
       
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <br>
                    <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Suku Cadang</th>
                            <th>Nama Brand</th>
                            <th>Nama Suku Cadang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                      
                    <?php foreach($lap_barang as $no => $d): ?>
                        <tr>
                          <td><?= $no+1; ?></td>
                          <td><?= $d->kode_barang ?></td>
                          <td><?= $d->nama_brand ?></td>
                          <td><?= $d->nama_barang ?></td>
                          <td>Rp. <?= $d->harga ?></td>
                          <td><?= $d->jumlah ?></td>
                          <td><?= $d->tgl_masuk ?></td>
                          
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
    <table width=80% align="center">
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center"> <br> 
   </td>
    <td width="530"></td>
    
    <td align="center"><?php  
      $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
    ?>

    Padang Pariaman, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?> <br><span>Diketahui Oleh</span></td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
     <br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br />
      ( Muhammad Ikhsan )<br />
    </td>
  </tr>
  
  
</table>
</body>

</html>