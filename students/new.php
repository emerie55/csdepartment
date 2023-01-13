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
                              <title>Portal: Important Information</title>
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
        <!-- <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" /> -->
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

<h2 class="col-md-6"><center><span class="glyphicon glyphicon-calendar"></span> Important Information</center></h2><br>
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
    <div class="col-md-10" style="overflow-x:auto;">
     
     <div class="panel panel-primary">
      <div class="panel-heading" style="font-size:16px;"><b> <span class="glyphicon glyphicon-calendar"></span> Important Information From Department</b></div>
      <div class="panel-body">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
          <thead>
            <tr>
            <th>Lecturer Name</th>
            <th>Information</th>
            <th>Image</th>
            <th>Date / Time</th>
                    
            </tr>
          </thead>
          <tbody>
      <!-- php here -->
          <?php
           
            $mysqli1="select * from info where programme='$prog' and semester='$sem' and level='$lev' ";
            $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
              while($row2 = mysqli_fetch_object($myquery1)){
            ?>
          <tr class="">    
            <td><?php echo $row2->lecturer_name; ?></td>
            <td>
              <?php 
                $show = $row2->inf; 
                echo html_entity_decode($show);
              ?>
            </td>
            <td>
                    <center>
                      <?php
                      if($row2->pic == "pdf/"){
                        echo "<span class='' style='font-size:15px; font-weight:bold; cursor: not-allowed;'>No Image</span>";
                        
                      }else{
                        echo "<a href='../lecturers/$row2->pic' target='_blank'>";
                        echo "<span class='fa fa-file-image-o' style='font-size:40px;'></span>";
                      }
                      ?>
                    </center>
                  </td><td><?php echo $row2->datemm; ?></td>
          </tr>
          <?php
        }
          ?>

        </tbody>
    </table>

  
  
    

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
																								   