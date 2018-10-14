<?php

session_start();
$konek = mysqli_connect('localhost','root','','d_modul6');

$sql="SELECT * FROM t_jurnal6";
$query=mysqli_query($konek, $sql);
$halo= mysqli_fetch_array($query);

echo "NIM : " .$halo['nim']."<br>";
echo "Nama : " .$halo['nama']."<br>";
echo "kelas : " .$halo['kelas']."<br>";
echo "Jenis Kelamin : " .$halo['jk']."<br>";
echo "Hobi : " .$halo['hobi']."<br>";
echo "Fakultas : " .$halo['fakultas']."<br>";
echo "Alamat : " .$halo['alamat']."<br>";

 
?>

<a href ="editprofile.php"> Edit.</a>
<a href ="posting.php"> Posting.</a>