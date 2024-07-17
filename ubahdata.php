<!DOCTYPE html>
<head>
    <title>Ubah Data Linda</title>
    <style>
        body{
    background-color: #FCF8F3;
}
.Header{
    padding:20px;
    margin: 10px;
}

.JudulHeader{
    color: #698474;
    font-family: Arial, Helvetica, sans-serif;
    position: absolute;
    margin-top: 40px;
    margin-left: 120px;
    font-size: 30px;
    
}

.NavMenu ul{
    list-style-type: none;
    margin-left: 70%;
    cursor: pointer;
    float: left;
    font-weight: 400;
    
}
.NavMenu ul li{
    list-style-type: none;
    display: inline-block;
    padding: 15px 15px;

}
.NavMenu ul li a{
    color: #698474;
    text-decoration: none;
}

.NavMenu ul li :hover{
    border-bottom: 3px solid #DCA47C;
    transition: all .3s ease ;
    
}
table{
    margin-top: 40px;
    margin-left: 140px;
    color: #DCA47C;
}
form{
    color: #DCA47C;
}
    </style>
</head>
<body>
<div class="Header">
        <div class="JudulHeader"><b>Ubah Data Peminjam</b></div>

    </div>

    <div class="NavMenu">
        
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="tampildata.php">Daftar Peminjam</a></li>
        </ul>
        
    </div>

    <?php

    require("koneksi.php");

    $idMhi = $_GET["idMhi"];
    $dataUbah = "SELECT * FROM tbl_lindawardani WHERE idMhi = $idMhi";
    $lihatUbah = mysqli_query($koneksi, $dataUbah);
    $data = mysqli_fetch_assoc($lihatUbah);
    ?>

    <table style="width: 80%; padding: 10px;">
    <form action="" method="POST">
        <tr>
            <td style="width: 10%;"><label for="nama">Nama</label></td>
            <td><input type="text"name="nama" id="nama" value="<?= $data['nama']; ?>"></td>
        </tr>

        <tr>
            <td><label for="nohp">NO HP/WA</label></td>
            <td><input type="text" name="nohp" id="nohp" value="<?= $data['nohp']; ?>"></td>
        </tr>

        <tr>
            <td><label for="judulbuku">Judul Buku</label></td>
            <td>
                <select name="judulbuku" id="judulbuku">
                    <option value="At-Tarikh Al-Islamiyah" <?php if($data['judulbuku'] == "At-Tarikh Al-Islamiyah"){echo "selected";} ?>>At-Tarikh Al-Islamiyah</option>
                    <option value="Al-Adzkar"<?php if($data['judulbuku'] == "Al-Adzkar"){echo "selected";} ?>>Al-Adzkar</option>
                    <option value="Fathul Mu'in" <?php if($data['judulbuku'] == "Fathul Mu'in"){echo "selected";} ?>>Fathul Mu'in</option>
                    <option value="Idoh Ushul Fiqh" <?php if($data['judulbuku'] == "Idoh Ushul Fiqh"){echo "selected";} ?>>Idoh Ushul Fiqh</option>
                    <option value="Amsilatul Jadidah" <?php if($data['judulbuku'] == "Amsilatul Jadidah"){echo "selected";} ?>>Amsilatul Jadidah</option>
                    <option value="Mawahibu Laduniyah" <?php if($data['judulbuku'] == "Mawahibu Laduniyah"){echo "selected";} ?>>Mawahibu Laduniyah</option>
                    <option value="Qurrotul Uyyun" <?php if($data['judulbuku'] == "Qurrotul Uyyun"){echo "selected";} ?>>Qurrotul Uyyun</option>
                    <option value="Minhajul 'Abidin" <?php if($data['judulbuku'] == "Minhajul 'Abidin"){echo "selected";} ?>>Minhajul 'Abidin</option>
                    <option value="Tafsir Ibnu Katsir" <?php if($data['judulbuku'] == "Tafsir Ibnu Katsir"){echo "selected";} ?>>Tafsir Ibnu Katsir</option>
                    <option value="Tafsir Jalalain" <?php if($data['judulbuku'] == "Tafsir Jalalain"){echo "selected";} ?>>Tafsir Jalalain</option>
                    <option value="Balagoh" <?php if($data['judulbuku'] == "Balagoh"){echo "selected";} ?>>Balagoh</option>
                    <option value="Tarikh Tasyrikh Islamiyah" <?php if($data['judulbuku'] == "Tarikh Tasyrikh Islamiyah"){echo "selected";} ?>>Tarikh Tasyrikh Islamiyah</option>
                    <option value="Arud" <?php if($data['judulbuku'] == "Arud"){echo "selected";} ?>>Arud</option>
                    <option value="Bulugul Marom" <?php if($data['judulbuku'] == "Bulugul Marom"){echo "selected";} ?>>Bulugul Marom</option>
                    <option value="Al-Luma'" <?php if($data['judulbuku'] == "Al-Luma'"){echo "selected";} ?>>Al-Luma'</option>
                    <option value="Kawakib" <?php if($data['judulbuku'] == "Kawakib"){echo "selected";} ?>>Kawakib</option>
                    <option value="Tafsir Ahkam" <?php if($data['judulbuku'] == "Tafsir Ahkam"){echo "selected";} ?>>Tafsir Ahkam</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="email" name="email" id="email" value="<?= $data['email']; ?>"></td>
        </tr>

        <tr>
            <td><label for="alamat">Alamat</label></td>
            <td><input type="text" name="alamat" id="alamat" value="<?= $data['alamat']; ?>"></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit">Ubah Data</button>
                <button onClick="document.location.href = 'index.php'">Batal</button>
 
            </td>
        </tr>


    </form>

    </table>
    <?php
    require("koneksi.php");
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $nohp = $_POST["nohp"];
        $judulbuku = $_POST["judulbuku"];
        $email = $_POST["email"];
        $alamat = $_POST["alamat"];

        $ubahdata = "UPDATE tbl_lindawardani SET
                    nama = '$nama',
                    nohp = '$nohp',
                    judulbuku = '$judulbuku',
                    email = '$email',
                    alamat = '$alamat'
                    WHERE idMhi = $idMhi";
                    mysqli_query($koneksi, $ubahdata);
 
        $hasilUbah = mysqli_affected_rows($koneksi);
        if($hasilUbah > 0){
            echo "<script>
                    alert('Data Berhasil diubah');
                        document.location.href = 'tampildata.php';
                </script>";
        }else{
        echo "<script>
                alert('Data Gagal diubah');
                document.location.href = 'tampildata.php';
            </script>";
        }
    }
    ?>

</body>

</<html>
    
