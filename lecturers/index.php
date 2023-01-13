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
                              <title>Admin Portal</title>
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
  <h2><span class="fa fa-dashboard"></span> Admin Dashboard 
  </h2><br>

  <div class="col-md-3">
    <div class="panel panel-success d_b">
      <div class="panel-heading">Complain / Question </div>
      <div class="panel-body">
        <center><h1>
           <?php
        $mysqli1="select * from submit_ted where level='$lev' AND programme='$prog' AND semester='$sem' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          $count=mysqli_num_rows($myquery1); echo $count;
        ?>
        </h1></center>

      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-success d_b">
      <div class="panel-heading">Pass Information </div>
      <div class="panel-body">
        <center><h1>
           <?php
        $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          $count=mysqli_num_rows($myquery1); echo $count;
        ?>
        </h1></center>

      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-success d_b">
      <div class="panel-heading">Scheduled Appointment </div>
      <div class="panel-body">
        <center><h1>
           <?php
        $mysqli1="select * from a_point where level='$lev' AND programme='$prog' AND semester='$sem' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          $count=mysqli_num_rows($myquery1); echo $count;
        ?>
        </h1></center>

      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-success d_b">
      <div class="panel-heading">Registered Students </div>
      <div class="panel-body">
        <center><h1>
           <?php
        $mysqli1="select * from st where level='$lev' AND programme='$prog' AND semester='$sem' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          $count=mysqli_num_rows($myquery1); echo $count;
        ?>
        </h1></center>

      </div>
    </div>
  </div>

  
</div>


  <div class="row">
    <div class="col-md-6">
     
     <div class="panel panel-success" style="font-size:18px;">
      <div class="panel-heading" style="font-size:16px;"><b> <span class="fa fa-user"></span> Account Details</b></div>
      <div class="panel-body">
<p>
  <span class="glyphicon glyphicon-calendar"></span> <?php echo date("d/M/Y") ?>
</p>
<p>
  <span class="glyphicon glyphicon-time"></span> <?php echo date("h:i:sa") ?>
</p>
<p>
  Welcome, <b><?php echo $lect_name; ?></b>
</p>

<p>
  <strong>Level:</strong> <?php echo $lev; ?>
</p>
<p>
  <strong>Programme:</strong> <?php echo $prog; ?>
</p>
<p>
  <strong>Semester:</strong> <?php echo $sem; ?>
</p>


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


	</body>
	</html>																							   
																								   