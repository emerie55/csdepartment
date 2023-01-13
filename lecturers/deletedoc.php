<?php
include"../connect.php";

if(!empty($_GET["id"])) {
	$delfile=mysqli_query($con,"select * from submit_ted where id='".$_GET["id"]."' ");
	while($delfet=mysqli_fetch_object($delfile)){
unlink("../students/".$delfet->upload);
	}
	$result = mysqli_query($con,"DELETE FROM submit_ted WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Document deleted!')</script>";
		echo"Redirecting you to submitted assignment page in 2 seconds...";
		echo "<meta http-equiv='Refresh' content='2; url=submitted.php'>";
	}
}
?>