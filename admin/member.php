<?php

include ('inc/config.php');

?>
<h1> Tabel Member</h1>
<form action='index.php?page=member'method="post">
	<input type='text' name='cari' value=''>
	<input type='submit' name='btnCari' value='cari'>
	
</form>
<a href='index.php?page=member'>all data</a>
<table  width="600px" border=0>
	<tr style="background-color:#F79307">
		<td width="65px">Kode User</td>
		<td width="250px">Username</td>
		<td width="60px">Operation</td>
	</tr>
	<?php
/*
 * kode untuk menghapus data
 */
if(isset($_GET['del'])){
	$Kd_member=$_GET['id'];
	$hapus ="delete from wbpl_member where Kd_member='$Kd_member'";
	mysql_query($hapus)or die(mysql_error());
}

$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  wbpl_member where member_name like '%$cari%'";
}else{
$sql="SELECT * FROM  wbpl_member";
}

$result=mysql_query($sql) or die(mysql_error());


//proses menampilkan data 
while($rows=mysql_fetch_array($result)){
?>
	<tr>
		<td><a href="index.php?page=profile&id=<?php echo $rows['Kd_member']?>"><?php echo $rows['Kd_member'];?></a></td>
		<td><a href="index.php?page=profile&id=<?php echo $rows['Kd_member']?>"><?php echo $rows['member_name'];?></a></td>
		
		<td>
			<a href="index.php?page=pengelola_form_edit&id=<?php echo $rows['Kd_member']?>"> <img src="image/b_edit.png"></a>
			<a href="index.php?page=member&del=true&id=<?php echo $rows['Kd_member']?>"  onclick="return askUser()";> <img src="image/b_drop.png"></a>
		</td>
	</tr>
	<?
	}

	//tutup koneksi
	?>
	<tr>
		<td></td>
		<td align=right colspan='1'><?php
		if (isset($_GET['status'])) {
			if ($_GET['status'] == 0) {
				echo " <div style='color:blue'>Operasi data berhasil</div>";
			} else {
				echo "operasi gagal";
			}
		}
		?>
		</td>
		<td align=right><a href="index.php?page=pengelola_form_add"> <img src="image/add.jpg"> Add</a></td>
	</tr>
	<tr></tr>
</table>








<h1> Tabel Member</h1>
<form action='index.php?page=member'method="post">
	<input type='text' name='cari' value=''>
	<input type='submit' name='btnCari' value='cari'>
	
</form>
<a href='index.php?page=member'>all data</a>
<table  width="600px" border=0>
	<tr style="background-color:#F79307">
		<td width="200px">Username</td><td width="100px">Operation</td>
	</tr>
	<?php
/*
 * kode untuk menghapus data
 */
if(isset($_GET['del'])){
	$username=$_GET['id'];
	$hapus ="delete from pengelola where username='$username'";
	mysql_query($hapus)or die(mysql_error());
}

$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  pengelola where username like '%$cari%'";
}else{
$sql="SELECT * FROM  pengelola";
}

$result=mysql_query($sql) or die(mysql_error());


//proses menampilkan data 
while($rows=mysql_fetch_array($result)){
?>
	<tr>
		<td><?  echo $rows['username'];?></td>
		
		<td><a href="index.php?page=pengelola_form_edit&id=<? echo $rows['username']?>"> <img src="image/b_edit.png"></a>
			<a href="index.php?page=member&del=true&id=<? echo $rows['username']?>"  onclick="return askUser()";> <img src="image/b_drop.png"></a></td>
	</tr>
	<?
	}

	//tutup koneksi
	?>
	<tr>
		<td align=right colspan='1'><?php
		if (isset($_GET['status'])) {
			if ($_GET['status'] == 0) {
				echo " <div style='color:blue'>Operasi data berhasil</div>";
			} else {
				echo "operasi gagal";
			}
		}
		?>
		</td>
		<td align=right><a href="index.php?page=pengelola_form_add"> <img src="image/add.jpg"> Add</a></td>
	</tr>
	<tr></tr>
</table>
<?

mysql_close();
//close database

//tampilan siapa yang pengelola
?>

