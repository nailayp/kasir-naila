<div class="container">
    <div class="col-lg-12">
        <h4 align="center">Penjualan</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        Input Penjualan
                    </div>
                    <div class="card-body">
                        <form action="proses/proses_penjualan.php?aksi=update" method="POST">
                            <?php 
                            include_once "function/class.penjualan.php";
                            $penjualan = new Penjualan();
                            foreach ($penjualan->get_idpenjualan($_GET['PenjualanID']) as $data) {
                            ?> 
                            <table class="table table-hover">
                                <tr>
                                    <td>Penjualan ID </td>
                                    <td><input type="text" name="PenjualanID " value="<?php echo $data['PenjualanID '] ?>" class="form-control" readonly ></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Penjualan</td>
                                     <td><input type="date" name="TanggalPenjualan" value="<?php echo $data['TanggalPenjualan'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td><input type="text" name="TotalHarga" value="<?php echo $data['TotalHarga'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>Pelanggan ID</td>
                                    <td><input type="text" name="PelangganID" value="<?php echo $data['PelangganID'] ?>" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right"><button type="submit" class="btn btn-primary">Simpan</button></td>
                                </tr>
                            </table>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>