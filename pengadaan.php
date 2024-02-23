<?php 
  include("koneksi.php");



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengadaan</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
      <h2 class="judul">Halaman Pengadaan</h2>
      <hr>
      <br><br>
      <table>
        <thead>
          <tr>
            <th>Id Buku</th>
            <th>Nama Buku</th>
            <th>Penerbit</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $query = "SELECT buku.id_buku, buku.kategori, buku.nama_buku, buku.harga, buku.stock, penerbit.nama_penerbit FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit ORDER BY buku.stock ASC";
            $data = mysqli_query($db,$query);
          

          
          while ($row = mysqli_fetch_assoc($data)) {
           echo"
            <tr>
              <td>{$row['id_buku']}</td>
              <td>{$row['nama_buku']}</td>
              <td>{$row['nama_penerbit']}</td>
              <td>{$row['stock']}</td>
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