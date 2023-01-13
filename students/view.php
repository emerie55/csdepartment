<?php
session_start();
include "session.php";
include"../connect.php";


if (!isset($_SESSION['passi'])){
  header("location:../students.php");
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
  
     
  <script src="../jquery-3.2.1.min.js"></script> 
<script src="../js/bootstrap.min.js"></script>
																	   
</head>
<body>


<!-- SIDEBAR -->
<?php include "connect/head.php"; ?>
<!-- END SIDEBAR -->

<div class="content">
  <h2><span class="glyphicon glyphicon-check"></span> Replied Complain / Questions</h2><br>
  
	<!-- THE START OF TABLE CONTAINER -->
  <div class="row">

    <div class="col-md-9">

<div class="panel panel-primary">
      <div class="panel-heading"><b> <span class="glyphicon glyphicon-calendar"></span> Replied Complain / Question</b></div>
      <div class="panel-body">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
       <th>Title</th>
       <th>Complain / Question</th>
       <th>Replied</th>
       <th>Delete</th>
                 
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
         $get=$_GET['id'];  
           $mysqli1="select * from submit_ted where student_id='$id' AND id='$get' and programme='$prog' and semester='$sem' and level='$lev' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
    while($row2 = mysqli_fetch_object($myquery1)){
   ?>
   <tr class="">    
                  <td><?php echo $row2->assign_name; ?></td>
                  <td><?php echo $row2->upload; ?> </td>
                  <td><?php echo $row2->score; ?></td>

                  <td><a href="deletereply.php?id=<?php echo $row2->id; ?>" onclick="return confirm('Are you sure you want to delete this reply?')" title="delete Reply"><span class="glyphicon glyphicon-trash"></span></a></td>
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
  <!-- THE END -->
  

  


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
																								   