<?php 

  $host = "localhost";
  $username = "root";
  $password = "";
  $db_nama = "unibookstore";

  $db = mysqli_connect($host,$username,$password,$db_nama);

  if(!$db){
    die("Gagal terhubung ke database : ". mysqli_connect_error());
  }

?>