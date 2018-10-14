<?php
session_start();
$konek=mysqli_connect('localhost', 'root', '', 'd_modul6');

?>

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
		<td>Kelas : </td>
			<td><input type="radio" name="kelas" value="01">01<br>
			<input type="radio" name="kelas" value="02">02<br>
			<input type="radio" name="kelas" value="03">03<br>
			<input type="radio" name="kelas" value="04">04<br>
		</td>

	</tr>
	<tr>
		<td>Jenis Kelamin : </td>
		<td><input type="radio" name="jk" value="l">Laki-Laki</td>
		<td><input type="radio" name="jk" value="p">Perempuan</td>
	</tr>
	<tr>
		<td>Hobi : </td>
		<td><input type="checkbox" name="hobi[]" value="Renang">Renang<br>
			<input type="checkbox" name="hobi[]" value="Basket">Basket<br>
			<input type="checkbox" name="hobi[]" value="Badminton">Badminton<br>
		</td>
	</tr>
	<tr>
		<td>Fakultas : </td>
		<td><select name="fakultas">
				<option value="fit">FIT</option>
				<option value="feb">FEB</option>
				<option value="fkb">FKB</option>
				<option value="fif">FIF</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Alamat : </td>
		<td><input type="text" name="alamat"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" name="edit" value="Edit"></td>
	</tr>
</table>
</form>


<?php
if(isset($_POST['edit'])){
$nama= $_POST['nama'];
$nim=$_POST['nim'];
$kelas=$_POST['kelas'];
$jk=$_POST['jk'];
$hobi=$_POST['hobi'];
$fakultas=$_POST['fakultas'];
$alamat=$_POST['alamat'];
$panjangnim=strlen($_POST['nim']);
$panjangnama=strlen($_POST['nama']);

$cek=true;
	if(empty($_POST['nim'])) {
		echo"nim harus diisi !!";
		$cek=false;
	}else if($panjangnim>10){
		echo"nim max 10 digit !!";
		$cek=false;
	}else{
		$nim=$_POST['nim'];
	}

	if(empty($_POST['nama'])) {
		echo"nama harus diisi !!";
		$cek=false;
	}else if($panjangnama>35){
		echo"nama max 35 digit!!";
		$cek=false;
	}else{
		$nama=$_POST['nama'];
	}

	if($cek){
	$nim = $_SESSION['nim'];
	$query = mysqli_query($konek, "SELECT * FROM t_jurnal6 WHERE nim = '$nim'");
	$konek= mysqli_connect('localhost','root','','d_modul6');
	$sql = "UPDATE  t_jurnal6 SET nama='$nama' , kelas='$kelas',jk='$jk', hobi='$hobi', fakultas='$fakultas', alamat='$alamat' WHERE nim='$nim'";
			   	header("location:output.php");
			   	echo "Berhasil di ubah";
				
			  
	}
	

 }
?>