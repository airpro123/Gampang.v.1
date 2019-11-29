<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script type="type/javascript" src="../js/bootstrap.js"></script>
    <script type="type/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <?php 
        include "../functions.php";

        $crud = new database();
    ?>
</head>
<body>
    <table class="table table-hover">
        <thead class="thead-dark">
            <th scope="col">ID Pelanggan</th>
            <th scope="col">Nama Pelanggan</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Kota</th>
            <th scope="col">kode Pos</th>
            <th scope="col">Aksi</th>
        </thead>
        <tbody>
            <?php
                $data = $crud->tampilData("pelanggan");
                foreach($data as $row){
                    echo "
                        <tr>
                            <td scope='row'>".$row['id_pelanggan']."</td>
                            <td>".$row['nama_pelanggan']."</td>
                            <td>".$row['alamat']."</td>
                            <td>".$row['telepon']."</td>
                            <td>".$row['kota']."</td>
                            <td>".$row['kode_pos']."</td>
                            <td>
                                <a class='btn btn-warning' href='ubah.php?id=".$row['id_pelanggan']."'>Ubah</a>
                                <a class='btn btn-danger' href='hapus.php?id=".$row['id_pelanggan']."'>Hapus</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
            <tr>   
                <td align="center" colspan="7">
                    <a class='btn btn-success' style="width: 100%;" href='tambah.php'>Tambah Data</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
