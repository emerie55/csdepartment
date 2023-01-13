<?php
session_start();
include "session.php";
include"../connect.php";


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
        <title>Student Portal</title>
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

  <h2 class="col-md-6"><center><span class="fa fa-dashboard"></span> Dashboard</center></h2><br>
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
  <div class="col-md-3">
      <div class="panel panel-primary d_bo">
        <div class="panel-heading"><strong><?php echo $name;?></strong> Profile Status</div>
        <div class="panel-body">
          <center><h1>
          <span class="">
            <?php  
              $queryall= "select * from st WHERE level='$lev' and email='$mail' ";
              $runquery=mysqli_query($con, $queryall) or die(mysqli_error($con));
              while($fetch=mysqli_fetch_object($runquery)){                  
            ?>
            <span> 
              <?php
              if($fetch->phone == "" || $fetch->status == "" || $fetch->assign_num == "" || $fetch->picture == ""){
                echo "<script>alert('$name, please update your profile, so to get Informations about $lev, Thanks.')</script>";
                include "pro.php";
                
              }else{
                include "pro.php";
                
              }
              
              ?>
            </span>
            <?php } ?>
          </span>
          </h1></center>

        </div>
      </div>
      
  </div>

  <div class="col-md-3">
    <div class="panel panel-primary d_bo">
      <div class="panel-heading">Complain / Question </div>
      <div class="panel-body">
        <center><h1>
           <?php
        $mysqli1="select * from submit_ted where student_id='$id' ";
          $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
          $count=mysqli_num_rows($myquery1); echo $count;
        ?>
        </h1></center>

      </div>
    </div>
    
  </div>


  <div class="col-md-3">
    <div class="panel panel-primary d_bo">
      <div class="panel-heading">Important Information</div>
      <div class="panel-body">
        <center><h1>
           <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;

?>
        </h1></center>

      </div>
    </div>
    
  </div>
  
</div>

<!-- STUDENTS DETAILS -->
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-danger">
      <div class="panel-heading"> <h4><span class="fa fa-user-plus"></span> <?php echo $name; ?> Details </h4></div>
      <div class="panel-body">
        
        <!-- N0 1 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-user"></i> Name:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $name; ?></b>
          </div><br><br>

        <!-- N0 2 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-tags"></i> Reg No:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $reg; ?></b>
          </div><br><br>

          <!-- N0 3 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-level-up"></i> Level:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $lev; ?></b>
          </div><br><br>

          <!-- N0 4 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-book"></i> Programme:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $prog; ?></b>
          </div><br><br>

          <!-- N0 5 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-clock-o"></i> Semester:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $sem; ?></b>
          </div><br><br>

           <!-- N0 6 -->
           <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-envelope"></i> Email:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $mail; ?></b>
          </div><br><br>

          <!-- N0 7 -->
          <div class="col-md-4 ">
              <b class="st_b"><i class="fa fa-phone"></i> Phone:</b> 
          </div>       
          <div class="col-md-8">
              <b class="st_ba"><?php echo $phone; ?></b>
          </div><br><br>

          <div class="col-md-8">
             <a href="profile.php" style="text-decoration: none;"><b class="st_ba">View More</b></a> 
          </div><br><br>

      </div>
    </div>
    
  </div>
</div><br><br>
<!-- THE END -->


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
        include 'foot.php';
    ?>
 <!-- Livechat end -->


	</body>
	</html>																							   
																								   