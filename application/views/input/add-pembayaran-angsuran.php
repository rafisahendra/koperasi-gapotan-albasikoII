<?php $this->load->view("header") ?>
   <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3>Pelunasan Angsuran</h3>
                                <div class="table-responsive">
                                   <form action="<?php echo base_url('HomeCtr/angsuran_cicilan_save/'.$angsuran_ke['id_peminjaman'])?>"  method="POST" enctype="multipart/form-data" >
                                 <div class="form-group">
                             
                                    <label for="">Angsuran Ke</label>
                                    <select name="id_angsuran" id="" class="form-control">
                                        <option value="<?=$angsuran_ke['id_angsuran']?>">Angsuran Ke-<?=$angsuran_ke['angsuran_ke']?></option>
                                    </select>
                                 </div>

                                 <div class="form-group">
                                     <label for="">Tanggal Bayar</label>
                                     <input type="date" name="tanggal_bayar" class="form-control" required>
                                 </div>

                                    <div class="form-group">
                                        <label for="">Tanggal Jatuh Tempo</label>
                                        <input  style="color:#000"  type="date" value="<?=$angsuran_ke['batas_bayar']?>" readonly class="form-control">
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jumlah Yang Harus Dibayarkan</label>
                                        <input  style="color:#000" type="number" value="<?=$angsuran_ke['jumlah_bayar']?>" class="form-control" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jumlah Yang Dibayarkan</label>
                                        <input type="number" value="<?=$angsuran_ke['jumlah_bayar']?>"  class="form-control" name="jumlah_bayar">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="">Bukti Pembayaran</label>
                                        <input type="file" class="form-control" name="bukti_pembayaran">
                                    </div> -->

                                    <div>
                                        <button type="submit" class="btn btn-danger"> Konfirmasi Pembayaran</button>
                                    </div>
                                   </form>
                                </div>
                            </div>
                        </div> 

                    
                    </div> 
                </div> 
                <?php $this->load->view("footer") ?>