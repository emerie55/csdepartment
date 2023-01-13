<?php
session_start();
include "session.php";
include"../connect.php";
include"function.php";


if (!isset($_SESSION['passi'])){
  header("location:../students.php");
  exit();
} 

if(!isset($_SESSION['cur_user'])){
  $_SESSION['cur_user'] = $_SERVER['REMOTE_ADDR'];
}


?>
<!DOCTYPE HTML>

             <head>
                <title>Portal: Submit Complain / Question</title>
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
        <!-- <link rel="stylesheet" href="../w3/w3.css">		    -->

        <!-- Livechat for this template-->
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- <link href="chat/bootstrap4/css/bootstrap.css" rel="stylesheet" /> -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/chat_style.css" /> 
        <script src="js/jquery-3.3.1.js"></script>
        <script src="bootstrap4/js/bootstrap.js"></script>
        <script src="js/main.js"></script>
        <!-- Livechat end-->

																	   
</head>

<body>

<!-- SIDEBAR -->
  <?php include "connect/head.php"; ?>
<!-- END SIDEBAR -->



<div class="content">
  <div class="row topcontent" style="margin-bottom:50px;">

  <h2 class="col-md-6"><center><span class="glyphicon glyphicon-share"></span> Submit Complain / Question</center></h2><br>
  <section class="col-md-6">
  <center>
            <span class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-6 d-none d-lg-inline text-gray-600 large" style="font-weight:bold;"><?php echo $name; ?></span>
                <img  src="../<?php echo $pp; ?>" class="img-profile img-circle" width="40px" style="margin-left:7px;">
              </a>              
            </span>
            </center>
  </section>
</div>


  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <br><br>
     <div class="panel panel-primary">
      <div class="panel-heading"><b> <span class="glyphicon glyphicon-share"></span> Submit Complain / Question
	  </b></div>
      <div class="panel-body">
<?php

if(isset($_POST["sub"])){

  function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}


      // $cc=test_input($_POST["course"]);
      $ass_name=test_input($_POST["an"]);
      $comp=test_input($_POST["ufile"]);
	     $date=date("d/M/Y")." ".date("h:i:sa");
      $m="No Reply";

      $senddata2 = mysqli_query($con,"insert into submit_ted (sname,assign_name,upload,programme,level,semester,date,student_id,status) values
    ('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$ass_name)."','".mysqli_real_escape_string($con,$comp)."',
    '".mysqli_real_escape_string($con,$prog)."','".mysqli_real_escape_string($con,$lev)."','".mysqli_real_escape_string($con,$sem)."','".mysqli_real_escape_string($con,$date)."',
    '".mysqli_real_escape_string($con,$id)."','".mysqli_real_escape_string($con,$m)."')")or die(mysqli_error($con));
	

    if(@$senddata2){
        
    echo"<script>alert('succesfully Submitted')</script>";
  }
  else{
    echo"<script>alert('Error in submitting')</script>";
  }

}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
<!-- <input type="hidden" name="course" class="w3-input" required="required"> -->
      <div class=" form">
        <input type="text" name="an" class="w3-input" required="required">
        <label class="label-name" for="Title">
        <span class="content-name"><i class="fa fa-edit"></i> Title</span>
        </label>
      </div><br>

     <textarea class="col-md-12 comp"  name="ufile" class="form-control" placeholder="Complain / Question here..." required=""></textarea><br>
     
     
     <button class="btn btn-primary fa fa-send" name="sub"><b> Submit</b></button>
</form>

      </div>
    </div>
    </div>
    
  </div>
  
  <div class="row">

    <div class="col-md-9">

<div class="panel panel-success">
      <div class="panel-heading"><b> <span class="glyphicon glyphicon-calendar"></span> Submitted Complain / Question</b></div>
      <div class="panel-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
       <th>Title</th>
       <th>Date Submitted</th>
       <th>Complain</th>
       <th>Status</th>
       <th>View</th>
       <th>Delete</th>
                 
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
           
           $mysqli1="select * from submit_ted where student_id='$id' and programme='$prog' and semester='$sem' and level='$lev' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
    while($row2 = mysqli_fetch_object($myquery1)){
   ?>
   <tr class="">    
                  <td><?php echo $row2->assign_name; ?></td>
                  <td><?php echo $row2->date; ?></td>
                  <td><?php echo $row2->upload; ?> </td>
                  <td><?php echo $row2->status; ?></td>
                  <td>
                  
                  <?php
                    if ($row2->status == "Replied"){
                    echo  "<a href='view.php?id=$row2->id' target='_blank' title='view document'><span class='fa fa-eye text-success'></span>";
                    }
                    else{
                      echo  "<span class='fa fa-eye-slash text-primary' style='cursor: not-allowed;'></span>";
                      
                    }
                  
                  ?>
                  </td>
                  <td><a href="deletedoc.php?id=<?php echo $row2->id; ?>" onclick="return confirm('Are you sure you want to delete this Post?')" title="delete Post"><span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>
                <?php
              }
                ?>

      </tbody>
    </table>
	
    <!-- two div below is the close the box -->
 </div>
    </div>
      
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

    <!-- Livechat for this template-->
<?php
        include_once('foot.php');
    ?>
 <!-- Livechat end -->

	</body>
	</html>																							   
																								   