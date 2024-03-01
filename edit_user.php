<div class="container">
    <div class="col-lg-12">
        <h4 align="center">User</h4>
        <br>
        <div class="row">
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header bg-pink">
                        Edit User
                    </div>
                    <div class="card-body">
                        <form action="../proses/proses_user.php?aksi=update" method="post">
            <?php 
                            include_once "function/class.user.php";
                            $user = new User();
                            foreach ($user->get_iduser($_GET['UserID']) as $data) {
                            ?> 
              <div class="card-body">
              <div class="form-group">
                  <label>User ID</label>
                  <input type="text" class="form-control" value="<?php echo $data['UserID'] ?>" name="UserID" placeholder="Masukkan Produk ID" readonly>
                </div>
                <div class="form-group">
                  <label>username</label>
                  <input type="text" class="form-control" value="<?php echo $data['Username'] ?>" name="Username" placeholder="Masukkan Produk ID">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="Password" value="<?php echo $data['Password'] ?>" placeholder="Masukkan Nama Produk">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="Email" value="<?php echo $data['Email'] ?>" placeholder="Masukkan Harga ">
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="NamaLengkap" value="<?php echo $data['NamaLengkap'] ?>" placeholder="Masukkan Stok ">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" name="Alamat" value="<?php echo $data['Alamat'] ?>" placeholder="Masukkan Stok ">
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control select2" name="Level" style="width: 100%;">
                    <option value="admin">admin</option>
                    <option value="petugas">petugas</option>
                  </select>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <?php }?>
                    </div>
                </div>
            </div>
</div>
    </div>
</div>