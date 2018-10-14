<form method="post">
<table border="0">
	<tr>
		<td>NIM :</td>
		<td><input type="text" name="nim"></td>
	</tr>
	<tr>
		<td>Nama :</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
	<tr>
		<td colspan="2"><input type="submit" name="submit" value="Login"></td>
	</tr>
</table>


<?php
session_start();
$konek=mysqli_connect('localhost', 'root', '', 'd_modul6');
if(isset($_POST['submit'])){	
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$data = mysqli_query($konek, "SELECT * FROM t_jurnal6 WHERE nim= '$nim' AND nama= '$nama'");
	$result = mysqli_fetch_row($data); 
	header("Location: output.php"); 
}
?>

<br><br>
belum punya akun? silahkan <a href ="regis.php"> buat akun.</a>