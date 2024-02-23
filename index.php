<?php 
  include("koneksi.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
      <h2 class="judul">Halaman Dashboard Utama</h2>
      <hr>
      <br><br>
      <a href="./pengadaan.php" class="btn-info">Pengadaan</a>
      <a href="./admin.php" class="btn-success">Halaman Admin</a>
      <div class="search-form">
        <form action="index.php" method="get">
          <input type="text" id="cari_buku" name="cari_buku" placeholder="Cari buku berdasarkan judulnya ....">
          <input type="submit" value="Cari">
        </form>
      </div>
      <br><br>
      <table>
        <thead>
          <tr>
            <th>Id Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Penerbit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $where="";
            if(isset($_GET['cari_buku'])){
              $cari_buku = $_GET['cari_buku'];
              $where="WHERE buku.nama_buku LIKE '%$cari_buku%'";
            }
            $query = "SELECT buku.id_buku, buku.kategori, buku.nama_buku, buku.harga, buku.stock, penerbit.nama_penerbit FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit $where";
            $data = mysqli_query($db,$query);
  
          
          while ($row = mysqli_fetch_assoc($data)) {
           echo"
            <tr>
              <td>{$row['id_buku']}</td>
              <td>{$row['kategori']}</td>
              <td>{$row['nama_buku']}</td>
              <td>{$row['harga']}</td>
              <td>{$row['stock']}</td>
              <td>{$row['nama_penerbit']}</td>
            </tr>
           ";
          }  ?>
         
        </tbody>
      </table>
      <br>
      <?php echo "Total data : <strong>".mysqli_num_rows($data)."</strong>"  ?>
    </div>
</body>
</html>