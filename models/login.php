<?php
		$konek = mysqli_connect 
   (
    "localhost",
    "root",
    "",
    "db_bioskop"
   );

	session_start();
	if (isset($_POST['login'])) {
		$pass = md5($_POST['pass']);
		$sql5 = mysqli_query($konek, "SELECT * FROM admin WHERE nama = '$_POST[user]' AND password = '$pass' ");
		$row5 = mysqli_num_rows($sql5);
		$dt5 = mysqli_fetch_array($sql5);
		if ($row5 == 0) {
			echo "<script>alert('Gagal Login !!')</script>";
			echo "<script>document.location = '../views/login.php'</script>";
		}else{
			if ($dt5['level'] == "admin") {
				$_SESSION['id'] = $dt5['id_admin'];
				$_SESSION['level'] = $dt5['level'];
				echo "<script>alert('Anda Berhasil login sebagai Admin')</script>";
				echo "<script>document.location = '../index.php'</script>";
			}else{
				$_SESSION['id'] = $dt5['id_admin'];
				$_SESSION['level'] = $dt5['level'];
				echo "<script>alert('Anda Berhasil login sebagai Manager ')</script>";
				echo "<script>document.location = '../index.php'</script>";
			}
		}
	}
 ?>