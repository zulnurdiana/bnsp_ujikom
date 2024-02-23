<?php 
  include('koneksi.php');
  
  if(isset($_GET['id_penerbit'])){
    $id_penerbit = $_GET['id_penerbit'];
    $query="SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'";
    $data = mysqli_query($db,$query);
    $penerbit = mysqli_fetch_assoc($data);

    if(mysqli_num_rows($data) < 1){
      die("data tidak ada");
    }

    if(isset($_POST['ubah_penerbit'])){
      $id_penerbit = $_POST['id_penerbit'];
      $nama_penerbit = $_POST['nama_penerbit'];
      $alamat = $_POST['alamat'];
      $kota = $_POST['kota'];
      $no_telfon = $_POST['no_telfon'];

      $query="UPDATE penerbit SET nama_penerbit='$nama_penerbit', alamat='$alamat', kota='$kota', no_telfon='$no_telfon' WHERE id_penerbit='$id_penerbit'";
      
      $data= mysqli_query($db,$query);

      if($data){
        header("Location: admin.php");
      }else{
        die("gagal update penerbit");
      }
    }
  }else{
    die('akses terlarang');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Ubah Penerbit</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="container">
    <h2 class="judul">Halaman Ubah Penerbit</h2>
    <hr>
    <form action="" method="POST">
      <div class="bingkai">
        <div class="caption-bingkai">
          <label for="id_penerbit">Id Penerbit</label>
          <input type="text" id="id_penerbit" name="id_penerbit" value="<?php echo $penerbit['id_penerbit']  ?>" readonly>
        </div>
        <div class="caption-bingkai">
          <label for="nama_penerbit">Nama Penerbit</label>
          <input type="text" id="nama_penerbit" name="nama_penerbit" value="<?php echo $penerbit['nama_penerbit']  ?>">
        </div>
        <div class="caption-bingkai">
          <label for="alamat">Alamat</label>
          <input type="text" id="alamat" name="alamat" value="<?php echo $penerbit['alamat']  ?>">
        </div>
        <div class="caption-bingkai">
          <label for="kota">Kota</label>
          <input type="text" id="kota" name="kota" value="<?php echo $penerbit['kota']  ?>">
        </div>
        <div class="caption-bingkai">
          <label for="no_telfon">No Telfon</label>
          <input type="text" id="no_telfon" name="no_telfon" value="<?php echo $penerbit['no_telfon']  ?>">
        </div>
        <div class="caption-bingkai">
          <button type="submit" name="ubah_penerbit">Kirim</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
