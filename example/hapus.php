<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php  
        include "../function/functions.php";//lokasi functions.php

        $id     = $_GET['id'];
        $tabel  = "pelanggan";
        $key    = "id_pelanggan";

        $crud = new database();

        $hasil = $crud->hapusData($id, $tabel, $key);

        if($hasil = "berhasil"){
            echo "<meta http-equiv='refresh' content='0;http://localhost/persiapan5/pelanggan/'>";
        }else{
            echo "data dengan id = $id gagal dihapus";
            echo "<meta http-equiv='refresh' content='2;http://localhost/persiapan5/pelanggan/'>";
        }
    ?>
</head>
<body>
    
</body>
</html>
