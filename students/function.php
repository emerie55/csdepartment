<?php

function select(){
	include"../connect.php";
	$query_sel=mysqli_query($con,"select DISTINCT course_code from lect_rer");
	while($fetch_option=mysqli_fetch_assoc($query_sel)){
		echo "<option value='$fetch_option[course_code]'>$fetch_option[course_code]</option>";
		
	}
}


?>