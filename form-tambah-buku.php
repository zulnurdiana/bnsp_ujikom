<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Buku</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
      <h2 class="judul">Halaman Tambah Buku</h2>
      <hr>
      <div class="bingkai">
        <form action="form-tambah-buku.php" method="POST">
          <div class="caption-bingkai">
            <label for="id_buku">Id Buku</label>
            <input type="text" id="id_buku" name="id_buku">
          </div>
          <div class="caption-bingkai">
            <label for="kategori">Kategori</label>
            <input type="text" id="kategori" name="kategori">
          </div>
          <div class="caption-bingkai">
            <label for="nama_buku">Nama Buku</label>
            <input type="text" id="nama_buku" name="nama_buku">
          </div>
          <div class="caption-bingkai">
            <label for="harga">Harga</label>
            <input type="number" id="harga" name="harga">
          </div>
          <div class="caption-bingkai">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock">
          </div>
          <div class="caption-bingkai">
            <label for="id_penerbit">Penerbit</label>
            <select name="id_penerbit" id="id_penerbit">
              <?php 
                include("koneksi.php");
                $query = "SELECT * FROM penerbit";
                $data = mysqli_query($db,$query);
                while ($row = mysqli_fetch_assoc($data)) {
                  echo"
                  <option value={$row['id_penerbit']}> {$row['nama_penerbit']} </option>
                  ";
                }
              
              ?>
            </select>
          </div>
          <div class="caption-bingkai">
            <button type="submit" name="tambah_buku">Kirim</button>
          </div>
        </form>
      </div>
    </div>
    <?php 
      include("koneksi.php");
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['tambah_buku'])){
          $id_buku = $_POST['id_buku'];
          $kategori = $_POST['kategori'];
          $nama_buku = $_POST['nama_buku'];
          $harga = $_POST['harga'];
          $stock = $_POST['stock'];
          $id_penerbit = $_POST['id_penerbit'];

          $query = "INSERT INTO buku(id_buku,id_penerbit,kategori,nama_buku,harga,stock) VALUES('$id_buku','$id_penerbit','$kategori','$nama_buku','$harga','$stock')";
          $data = mysqli_query($db,$query);

          if($data){
            header("Location: admin.php");
          }else {
            die("gagal menambahkan data");
          }
        }
      }
    ?>
</body>
</html>
