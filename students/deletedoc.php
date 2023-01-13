<?php
include"../connect.php";

	$result = mysqli_query($con,"DELETE FROM submit_ted WHERE id='".$_GET["id"]."' ");
	if(!empty($result)){
		
		echo "<script> alert('Post deleted!')</script>";
		echo"Redirecting you to page in 2 seconds...";
		echo "<meta http-equiv='Refresh' content='2; url=submit.php'>";
	}

?>