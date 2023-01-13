<?php
include"../connect.php";

// if(!empty($_GET["id"])) {
// 	$delfile=mysqli_query($con,"select * from a_point where id='".$_GET["id"]."' ");
// 	while($delfet=mysqli_fetch_object($delfile)){
// unlink($delfet->path);
//	}
	$result = mysqli_query($con,"DELETE FROM a_point WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Appointment deleted!')</script>";
		echo "<p style='color:green;'>Redirecting you to page in 2 seconds...</p>";
		echo "<meta http-equiv='Refresh' content='2; url=index.php'>";
	}
//}
?>