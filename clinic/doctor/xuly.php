<?php
	include('../class/clsbacsi.php');
    $q = new doctor();
	if(isset($_GET['code']))
	{
		$code_phieu = $_GET['code'];
		$sql_update = "UPDATE phieudkkham SET status= 1 where id_phieudkkham='".$code_phieu."'";
		$query = mysqli_query($q->connect(),$sql_update);
		header('Location:./xemlichkham.php');
	}
?>