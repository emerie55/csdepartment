<?php
session_start();
include "session.php";
include"../connect.php";


if (!isset($_SESSION['passiw'])){
  header("location:../lecturer.php");
  exit();
} 

?>
<!DOCTYPE HTML>

             <head>
                              <title>Submitted:View</title>
         <link rel="icon" href="../img/ginger-star.png">
<meta charset="utf-8">
   
              <meta name="viewport" content="width=device-width, initial-scale=1">
                            <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
                            <link href="../edit.css" rel="stylesheet" media="screen">
                             <link href="nav.css" rel="stylesheet" media="screen">
                             <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
                            <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">

  
     
  <script src="../jquery-3.2.1.min.js"></script> 
<script src="../js/bootstrap.min.js"></script>
<script src="../js/myjs.js"></script>

																	   
</head>
<body>


<!-- SIDEBAR -->
<?php include "connect/head.php"; ?>
<!-- END OF SIDEBAR -->



<div class="content">
  
  <div class="row topcontent ">
  <h2><span class="glyphicon glyphicon-check"></span> Answered Complain / Question</h2><br><br><br>

  <div class="col-md-6">
  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
        <th>Complain / Question</th>
        <th>Replied Complain / Question</th>       
   </tr>
</thead>
<tbody>
<!-- php here -->

    <?php
    $get=$_GET['id'];
  $mysqli1="select * from submit_ted where id='$get' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
    while($row2 = mysqli_fetch_object($myquery1)){
   ?>
   <tr>
   <td><?php echo $row2->upload; ?></td>

   <td><?php echo $row2->score; ?></td>
  </tr>

  <?php  } ?>
   </tbody>
    </table>
	</div>
  

	<div class="col-md-4">
	<form action="" method="POST">
  
  <textarea class="col-md-12 comp"  name="grade" class="form-control" placeholder="Reply here..." required=""></textarea><br>

	<button class="btn btn-success" name="gr"><b>Reply</b></button>
	</form>
	
	<?php
	if(isset($_POST["gr"])){
		
		function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}

 $gra=test_input($_POST["grade"]);
   $get=$_GET['id'];
  
   $upp=mysqli_query($con,"update submit_ted set status='Replied',score='$gra' where id='$get' ");
   
   if(@$upp){
        
    echo"<script>alert('Complain Replied')</script>";
	// echo"<script>location.replace('submitted.php')</script>";
  }
  else{
    echo"<script>alert('Error in Replying...')</script>";
  }
   
	 }
		  
   ?>
	
	</div>
	
	</div>



</div>
<script src="../dataTables/jquery.dataTables.js"></script>
    <script src="../dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

	</body>
	</html>																							   
																								   