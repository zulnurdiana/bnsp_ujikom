<?php 
   include("koneksi.php");
   if(isset($_GET['id_buku'])){
      $id_buku = $_GET['id_buku'];
      $query = "SELECT * FROM buku WHERE id_buku='$id_buku'";
      $data = mysqli_query($db,$query);
      $buku = mysqli_fetch_assoc($data);

      if(mysqli_num_rows($data) < 1){
      die("data tidak ditemukan");
    }

    if(isset($_POST['tambah_buku'])){
      $kategori = $_POST['kategori'];
      $nama_buku = $_POST['nama_buku'];
      $harga = $_POST['harga'];
      $stock = $_POST['stock'];
      $id_penerbit = $_POST['id_penerbit'];

      $query="UPDATE buku SET kategori='$kategori', nama_buku='$nama_buku', harga='$harga', stock='$stock', id_penerbit='$id_penerbit' WHERE id_buku='$id_buku'";
      $data = mysqli_query($db,$query);
      if($data){
        header("Location: admin.php");
      }else {
        die("gagal update buku");
      }
    }

   }else{
    die("akses terlarang");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Ubah Buku</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="container">
    <h2 class="judul">Form Ubah Buku</h2>
    <hr>
     <form action="" method="POST">
      <div class="bingkai">
        <div class="caption-bingkai">
          <label class="label" for="id_buku">Id Buku</label>
          <input type="text" id="id_buku" name="id_buku" value="<?php echo $buku['id_buku'] ?>" readonly>
        </div>
        <div class="caption-bingkai">
          <label class="label" for="kategori">Kategori</label>
          <input type="text" id="kategori" name="kategori" value="<?php echo $buku['kategori']  ?>">
        </div>
        <div class="caption-bingkai">
          <label class="label" for="nama_buku">Nama Buku</label>
          <input type="text" id="nama_buku" name="nama_buku" value="<?php echo $buku['nama_buku'] ?>">
        </div>
        <div class="caption-bingkai">
          <label class="label" for="harga">Harga</label>
          <input type="number" id="harga" name="harga" value="<?php echo $buku['harga'] ?>">
        </div>
        <div class="caption-bingkai">
          <label class="label" for="stock">Stock</label>
          <input type="number" id="stock" name="stock" value="<?php echo $buku['stock']  ?>">
        </div>
        <div class="caption-bingkai">
          <label class="label" for="id_penerbit">Penerbit</label>
          <select name="id_penerbit" id="id_penerbit" value="<?php echo $buku['id_buku']  ?>">
            
            <?php
              $query = "SELECT * FROM penerbit";
              $data = mysqli_query($db, $query);
              while ($row = mysqli_fetch_assoc($data)) {
                $selected = ($row['id_penerbit'] == $buku['id_penerbit']) ? 'selected' : ''; // Menandai opsi yang sesuai dengan nilai yang dipilih sebelumnya
                echo "<option value='" . $row['id_penerbit'] . "' $selected>" . $row['nama_penerbit'] . "</option>";
              }
            ?>
          </select>
        </div>
        <div class="caption-bingkai">
          <button type="submit" name="tambah_buku">Kirim</button>
        </div>
      </div>
     </form>
  </div>
</body>
</html>
