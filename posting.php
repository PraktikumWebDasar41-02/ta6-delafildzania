<?php
	session_start();
	$konek = mysqli_connect('localhost', 'root', '', 'd_modul6');
	$sql="SELECT cerita, foto FROM t_jurnal6";
	$query= mysqli_query($konek, $sql);
	$hasil= mysqli_fetch_array($query);
?>
<form method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Posting Cerita:</td>
			<td><textarea rows="20" cols="80" name="cerita">

				</textarea>
			</td>
		</tr>
		<tr>
			<td>Upload Foto:</td>
			<td><input type="file" name="foto"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="Kirim">
			</td>
		</tr>
	</table>
</form>
<?php
	/*$target_dir = "image/";
	$target_file = $target_dir. basename($_FILES["foto"]["name"])*/
	if(isset($_POST['submit'])){
		$cerita = $_POST['cerita'];
		$cek=true;
		if(empty($cerita)){
			echo"cerita harap diisi";
			$cek=false;
		}else{
			if(str_word_count($cerita)<30){
				echo "Cerita minimal 30 kata";
				$cek=false;
			}
		}
		$foto =  basename($_FILES["foto"]["name"]);
		$query = "UPDATE t_jurnal6 SET cerita='$cerita' , foto='$foto' WHERE nim='$nim'";

		if(mysqli_query($con,$query)){
			$sql = "SELECT cerita, foto FROM t_jurnal6";
				$result = $konek->query($sql);

				if ($result->num_rows > 0) {
				  
				    while($row = $result->fetch_assoc()) {
				    	$foto = $row["foto"];
				        echo "<br> Foto: ". $row["foto"]. "<br> Gambar :";
				        echo "<img src=image/".$row['foto'].">";
				    }
				} else {
				    echo "0 results";
				}

				$konek->close();
		}else{
			echo "gagal";
		}
	}

?>

<a href="daftarpostingan.php">Daftar Postingan.</a>
