<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery-3.4.1"></script>
    <?php 
        include "../database/koneksi.php"; 
        include "../function/funct.php";

        $id     = $_GET['id'];
        $tabel  = "pelanggan";
        $key  = "id_pelanggan";

        $crud = new database();

        $tampil_data = $crud->cariData($id, $tabel, $key);

    ?>
</head>
<body>
    <div class="container col-md-7 mt-2">
        <div class="card">
        <div class="card-header">
            <h5 align="center">Tambah Data Pelanggan</h5>
        </div>
        <div class="card-body">
            <div class="card-text">
                <form action="" method="post" role="form">
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Id Pelanggan</label>
                        </div>
                        <div class="col">
                            <input value="<?php echo $tampil_data["id_pelanggan"]; ?>" type="text" name="id_pelanggan" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Nama Pelanggan</label>
                        </div>
                        <div class="col">
                            <input value="<?php echo $tampil_data["nama_pelanggan"]; ?>" type="text" name="nama_pelanggan" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Alamat</label>
                        </div>
                        <div class="col">
                            <input value="<?php echo $tampil_data["alamat"]; ?>" type="text" name="alamat" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Telepon</label>
                        </div>
                        <div class="col">
                            <input value="<?php echo $tampil_data["telepon"]; ?>" type="text" name="telepon" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Kota</label>
                        </div>
                        <div class="col">
                            <input value="<?php echo $tampil_data["kota"]; ?>" type="text" name="kota" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row form-group">
                        <div class="col-md-3">
                            <label>Kode Pos</label>
                        </div>
                        <div class="col">
                            <input value="<?php echo $tampil_data["kode_pos"]; ?>" type="text" name="kode_pos" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div align="center" class="col">
                            <button style="width: 100%;" class="btn btn-success" type="submit" name="submit">Simpan</button>
                        </div>
                        <div align="center" class="col">
                            <button style="width: 100%;" class="btn btn-warning" type="reset" name="submit">Reset</button>
                        </div>
                    </div>
                
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        
                        $data = [
                            $_POST['id_pelanggan'],
                            $_POST['nama_pelanggan'],
                            $_POST['alamat'],
                            $_POST['telepon'],
                            $_POST['kota'],
                            $_POST['kode_pos']
                        ];
                        $hasil = $crud->updateData($id, $data, "pelanggan", "id_pelanggan");

                        if($hasil="berhasil"){
                            echo "<meta http-equiv='refresh' content='0;url=http://localhost/persiapan5/pelanggan/'>";
                        }
                    }


                ?>


            </div>
        </div>
        </div>
    
    </div>
</body>
</html>