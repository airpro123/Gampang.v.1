<?php   
    class database{
        var $host = "localhost";
        var $username = "root";
        var $password = "";
        var $database = "db_persiapan3";
        var $koneksi = "";

        var $hasil = ["gagal", "berhasil"];

        function __construct(){
            $this->koneksi = mysqli_connect(
                $this->host, 
                $this->username, 
                $this->password, 
                $this->database
            );
            if(mysqli_connect_error()){
                echo "Gagal menyambungkan ke database : ".mysqli_connect_error();
            }
        }

        //dataKolom adalah fungsi yang digunakan untuk mengambil data kolom(field) dari suatu tabel
        function dataKolom($tabel){
            $sql_kolom = "show columns from $tabel";
            $eks_kolom = mysqli_query($this->koneksi, $sql_kolom);
            $row = mysqli_fetch_assoc($eks_kolom);
            mysqli_free_result($eks_kolom);
            return $row;
        }

        //tampilData adalah fungsi yang digunakan untuk mengambil semua data pada suatu tabel.
        //Gunakan foreach untuk menampilkan data.
        function tampilData($tabel){
            $data = array();
            $sql_tampil_data = "select * from $tabel";
            $eks_tampil_data = mysqli_query($this->koneksi, $sql_tampil_data);
            if(!$eks_tampil_data){
                die(mysqli_error($eks_tampil_data));
            }
            while ($row = mysqli_fetch_assoc($eks_tampil_data)) {
                $data[] = $row;
            }

            return $data;
        }

        function cariData($cari, $tabel, $kolom){
            $sql_cari_data = "select * from $tabel where $kolom = '$cari'";
            $eks_cari_data = mysqli_query($this->koneksi, $sql_cari_data);

            $hasil = mysqli_fetch_assoc($eks_cari_data);
            mysqli_free_result($eks_cari_data);
            
            return $hasil;

        }

        function tambahData($data, $tabel){

            $hasil = "";
            $sql = "";
            for($i = 0; $i < sizeof($data); $i++){
                if($i !=  sizeof($data)-1){
                    $sql = $sql."'".$data[$i]."',";
                }else{
                    $sql = $sql."'".$data[$i]."'";
                }
            }  

            $sql_tambah_data = "insert into $tabel values(".$sql.")";

            $eks_tambah_data = mysqli_query($this->koneksi, $sql_tambah_data);
    
            if(!$eks_tambah_data){
                die("Gagal menambah data $tabel:".mysqli_error($eks_tambah_data));
                $hasil = $this->hasil[0];
            }else{
                echo "Berhasil menambah data ke tabel :$tabel";
                $hasil = $this->hasil[1];
            }
            mysqli_free_result($eks_tambah_data);

            return $hasil;
        }

        function updateData($id, $data, $tabel, $key){
            $hasil = "";

            $kolom = array(); //array kosong untuk menampung data kolom
            $sql_test = "show columns from $tabel";//query untuk menampilkan kolom pada suatu table
            $eks_test = mysqli_query($this->koneksi, $sql_test);
            while($row = mysqli_fetch_array($eks_test)){
                $kolom[] = $row["Field"];
            }
            mysqli_free_result($eks_test);

            $sql = "";

            for ($i=0; $i < sizeof($kolom); $i++) { 
                if($i != sizeof($kolom)-1){
                    $sql = $sql." ".$kolom[$i]." = '".$data[$i]."', ";
                }else{
                    $sql = $sql." ".$kolom[$i]." = '".$data[$i]."' ";
                }
            }

            $sql_update_data = "update $tabel set ".$sql."
            where $key = $id
            ";

            $eks_sql_update = mysqli_query($this->koneksi, $sql_update_data);

            if(!$eks_sql_update){
                die(mysqli_error($eks_sql_update));
                $hasil = "gagal";
            }else{
                echo "data berhasil di update";
                $hasil = "berhasil";
            }
            mysqli_free_result($eks_sql_update);

            return $hasil;
        }

        function hapusData($id, $tabel, $key){
            $hasil = "";
            $sql_hapus_data = "delete from $tabel where $key = $id";
            $eks_hapus_data = mysqli_query($this->koneksi, $sql_hapus_data);
            if(!$eks_hapus_data){
                die(mysqli_error($eks_hapus_data));
                $hasil = "gagal";
            }else{
                $hasil = "berhasil";
            }
            mysqli_free_result($eks_hapus_data);
            return $hasil;
        }

    }

?>
