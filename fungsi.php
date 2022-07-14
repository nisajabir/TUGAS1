<?php 
     $conn = mysqli_connect('sqlXXX.epizy.com','epiz_32166525','uV3s6F87qdo6','epiz_32166525_XXX');
    
     
     function tambah_data_kegiatan($data){
        global $conn;

        //tangkap data dari form dan masukan ke variabel

       
        $nama = htmlspecialchars($data["nama"]);
        $desk = htmlspecialchars($data["desk"]);
        
        $img = uploadimg();

        if(!isset($img)){
            return false;
        }


        //tambah file kedatabase
        mysqli_query($conn,"INSERT INTO daily VALUES('','$nama','$img')");

        return mysqli_affected_rows($conn);
    }

     function uploadimg(){

        $nameFile = $_FILES['img']['name'];
        $ukuranFile = $_FILES['img']['size'];
        $error = $_FILES['img']['error'];
        $tmpName = $_FILES['img'] ['tmp_name'];

        //cek apakah tidak ada foto yang diupload
        if ($error === 4){
            echo "<script>
                    alert('pilih foto terlebih dahulu');
                    </script>";

                    return false;
        }

        //pastikan yang diupload adalah foto

        $ekstensiGambarValid = ['jpeg','jpg','png'];
        $ekstensiGambar = explode('.',$nameFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
            echo"<script>
                    alert('yang diupload bukan gambar !');
                </script>";

            return false;
        }
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    function query($query){

        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = []; 
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function hapus_daily($data) {
        global $conn;
        $id = $data['id'];
        mysqli_query($conn, "DELETE FROM daily WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    
    function edit_daily($data){
        global $conn;

        $id = $data['id'];

       $imglama = $data["imglama"];

       if($_FILES['img']['error'] === 4){
           $img = $imglama;

       }else{
           $img = uploadimg();
       }
      
        $nama = htmlspecialchars($data['nama']);


        //update 
        $query = "UPDATE daily SET
                img = '$img',
                nama = '$nama',
                WHERE id = $id";

        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);

    }

    function cari_daily($keyword){
        $query = "SELECT * FROM daily WHERE nama LIKE '%$keyword%'";
        

        return query($query);
    }
?>