<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Penerbit</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="container">
    <h2 class="judul">HalamanTambah Penerbit</h2>
    <hr>
    <form action="form-tambah-penerbit.php" method="POST">
      <div class="bingkai">
        <div class="caption-bingkai">
          <label for="id_penerbit">Id Penerbit</label>
          <input type="text" id="id_penerbit" name="id_penerbit">
        </div>
        <div class="caption-bingkai">
          <label for="nama_penerbit">Nama Penerbit</label>
          <input type="text" id="nama_penerbit" name="nama_penerbit">
        </div>
        <div class="caption-bingkai">
          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" name="alamat">
        </div>
        <div class="caption-bingkai">
          <label for="kota">Kota</label>
          <input type="text" id="kota" name="kota">
        </div>
        <div class="caption-bingkai">
          <label for="no_telfon">No Telfon</label>
          <input type="text" id="no_telfon" name="no_telfon">
        </div>
        <div class="caption-bingkai">
        <button type="submit" name="tambah_penerbit">Kirim</button>
        </div>
      </div>
    </form>
  </div>
  <?php 
  include("koneksi.php");

  if(isset($_POST['tambah_penerbit'])){
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $no_telfon = $_POST['no_telfon'];

    $query="INSERT INTO penerbit(id_penerbit,nama_penerbit,alamat,kota,no_telfon)
    VALUES('$id_penerbit','$nama_penerbit','$alamat','$kota','$no_telfon')";
    $data= mysqli_query($db,$query);

    if($data){
        header("Location: admin.php");
    }else{
      die("gagal menambahkan penerbit");
    }
  }


?>
</body>
</html>