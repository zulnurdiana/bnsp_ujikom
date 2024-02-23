<?php 
  include("koneksi.php");

  if(isset($_GET['id_buku']) && isset($_GET['hapus_buku'])){
    $id_buku = $_GET['id_buku'];
    $query="DELETE FROM buku WHERE id_buku='$id_buku'";
    $data = mysqli_query($db,$query);
    if($data){
      header("Location: admin.php");
    }else{
      die("Gagal hapus buku");
    }

  } 
  
  if(isset($_GET['id_penerbit']) && isset($_GET['hapus_penerbit'])){
    $id_penerbit = $_GET['id_penerbit'];
    $query="DELETE FROM penerbit WHERE id_penerbit='$id_penerbit'";
    $data = mysqli_query($db,$query);
    if($data){
      header("Location: admin.php");
    }else{
      die("Gagal hapus penerbit");
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
      <h2 class="judul">Halaman Dashboard Admin</h2>
      <hr>
      <br><br>
      <a href="./form-tambah-buku.php" class="btn-info">Tambah Buku</a>
      <table>
        <thead>
          <tr>
            <th>Id Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Penerbit</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
         
          $query = "SELECT buku.id_buku, buku.kategori, buku.nama_buku, buku.harga, buku.stock, penerbit.nama_penerbit FROM buku INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit";
          $databuku = mysqli_query($db,$query);
          

          
          while ($row = mysqli_fetch_assoc($databuku)) {
           echo"
            <tr>
              <td>{$row['id_buku']}</td>
              <td>{$row['kategori']}</td>
              <td>{$row['nama_buku']}</td>
              <td>{$row['harga']}</td>
              <td>{$row['stock']}</td>
              <td>{$row['nama_penerbit']}</td>
              <td>
                <div>
                  <a href='./admin.php?id_buku={$row['id_buku']}&hapus_buku=true' class='btn-danger'>Hapus</a>
                  <a href='./form-ubah-buku.php?id_buku={$row['id_buku']}' class='btn-success'>Ubah</a>
                </div>
              </td>
            </tr>
           ";
          }  ?>
         
        </tbody>
      </table>
      <br>
      <?php echo "Total data buku: <strong>".mysqli_num_rows($databuku)."</strong>"  ?>

      <!-- TABEL PENERBIT -->
      <br><br><br><br><br>
      <a href="./form-tambah-penerbit.php" class="btn-info">Tambah Penerbit</a>
      <table>
        <thead>
          <tr>
            <th>Id Penerbit</th>
            <th>Nama Penerbit</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>No Telfon</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
         
          $query = "SELECT * FROM penerbit";
          $datapenerbit = mysqli_query($db,$query);
          
          while ($row = mysqli_fetch_assoc($datapenerbit)) {
           echo"
            <tr>
              <td>{$row['id_penerbit']}</td>
              <td>{$row['nama_penerbit']}</td>
              <td>{$row['alamat']}</td>
              <td>{$row['kota']}</td>
              <td>{$row['no_telfon']}</td>
              <td>
                <div>
                  <a href='./admin.php?id_penerbit={$row['id_penerbit']}&hapus_penerbit=true' class='btn-danger'>Hapus</a>
                  <a href='./form-ubah-penerbit.php?id_penerbit={$row['id_penerbit']}' class='btn-success'>Ubah</a>
                </div>
              </td>
            </tr>
           ";
          }  
          ?>
         
        </tbody>
      </table>
      <br>
      <?php echo "Total data penerbit: <strong>".mysqli_num_rows($datapenerbit)."</strong>" ?>
    </div>
</body>
</html>
