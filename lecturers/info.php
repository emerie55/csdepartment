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
                              <title>Pass an info</title>
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
<!-- FOR CK EDITOR -->
<!-- <script src="js/ckeditor.js"></script> -->
<!-- <link href="css/sample.css" rel="stylesheet"> -->

<!-- FOR SUMMERNOTE -->
<link rel="stylesheet" href="../assets/plugins/summernote/dist/summernote.css"/>

																	   
</head>
<body style="font-family: ok;">


<!-- SIDEBAR -->
<?php include "connect/head.php"; ?>
<!-- END OF SIDEBAR -->


<div class="content">
  
 <div class="row topcontent ">
 <h2 style="margin-left:10px;"><span class="fa fa-file-text"></span> Pass Information</h2><br>

    <div class="col-md-2"></div>
    <div class="col-md-6">
     <br><br>
     <div class="panel panel-info">
      <div class="panel-heading"><b> <span class="fa fa-file-text"></span> Pass An Information</b></div>
      <div class="panel-body">
<?php

if(isset($_POST["sub"])){

  function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}


      $lev=test_input($_POST["lev"]);
      $program=test_input($_POST["prog"]);
      $sem=test_input($_POST["sem"]);
      $info=test_input($_POST["info"]);
      
      $filename=$_FILES["vide"]["name"];
      $templocale=$_FILES["vide"]["tmp_name"];
      $_FILES["vide"]["type"];
      $_FILES["vide"]["size"];
      
      $folderpath="pdf/".$filename;
      // . time()
    //   $check2=mysqli_query($con,"select * from info where pic = '".mysqli_real_escape_string($con,$folderpath)."' ");
    //   $row2=mysqli_num_rows($check2);

    //   if($row2 > 0){
    //     echo"<script>alert('There is a similar Image.. Do change it')</script>";
    //  }
     
    //  else{
      move_uploaded_file($templocale,$folderpath);
      $senddata2 = mysqli_query($con,"insert into info (level,programme,semester,inf,lecturer_name,pic) values
    ('".mysqli_real_escape_string($con,$lev)."','".mysqli_real_escape_string($con,$program)."','".mysqli_real_escape_string($con,$sem)."','".mysqli_real_escape_string($con,$info)."','$lect_name','".mysqli_real_escape_string($con,$folderpath)."')")or die(mysqli_error($con)); 
    //  }

    if(@$senddata2){
        
    echo "<script>alert('Information Passed!');</script>
    ";

  }else{
    echo"<script>alert('Error in passing information')</script>";
  }

}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
  
<input type="hidden" name="lev" class="form-control" value="<?php echo $lev; ?>" readonly="readonly"> 
<br>

<input type="hidden" name="prog" class="form-control" value="<?php echo $prog; ?>" readonly="readonly"> 
<br>

<input type="hidden" name="sem" class="form-control" value="<?php echo $sem; ?>" readonly="readonly"> 
<br>
<div class="form-group">
  <label for="Upload file">Upload Image (Optional)</label>
  <input type="file" class="form-control" accept="pdf/*" name="vide" >
</div>
					
<textarea class="form-control summernote" name="info" id="" placeholder="Enter Message..."  style="resize:none;" required=""></textarea><br>

<button class="btn btn-info" name="sub"><b><i class="fa fa-rocket"></i> Pass Info</b></button>
</form>

      </div>
    </div>
    </div>
    
  </div>


  <div class="row">
    <div class="col-md-1">
      
    </div>

    <div class="col-md-9" style="overflow-x:auto;">

<div class="panel panel-success">
      <div class="panel-heading"><b> <span class="glyphicon glyphicon-calendar"></span> Passed Information</b></div>
      <div class="panel-body">
        
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    
    <thead>
       <tr>
       
       <th>Date</th> 
       <th>Info</th>
       <th>Image</th>
       <th>Delete</th>            
   </tr>
</thead>
<tbody>
<!-- php here -->
    <?php
          
           $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
   echo "<h2>$lev $prog</h2>";
    while($row2 = mysqli_fetch_object($myquery1)){
      

   ?>
   <tr>    
                  <td><?php echo $row2->datemm; ?></td>
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
                        echo "<a href='$row2->pic' target='_blank'>";
                        echo "<span class='fa fa-file-image-o' style='font-size:40px;'></span>";
                      }
                      ?>
                    </center>
                  </td>
                  <td>  
                    <a href="deleteinfo.php?id=<?php echo $row2->id; ?>" onclick="return confirm('Are you sure you want to delete?')" title="delete Information"><span class="glyphicon glyphicon-trash"></span></a>
                  </td>
                  
                  
                </tr>
               <?php  } ?>

      </tbody>
    </table>
    <!-- two div below is the close the box -->
 </div>
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

                // ClassicEditor
                // .create( document.querySelector('#editor'))
                // .then( editor => {
                //   console.log( editor);
                  
                // })
                // .catch( error => {
                //   console.error(error);
                  
                // });
    </script>
<!-- FOR SUMMERNOTE -->
<script src="../assets/bundles/counterup.bundle.js"></script>
<script src="../assets/bundles/apexcharts.bundle.js"></script>
<script src="../assets/bundles/summernote.bundle.js"></script>
<script src="../assets/js/page/index.js"></script>
<script src="../assets/js/page/summernote.js"></script>
<script src="../jquery-easing/jquery.easing.min.js"></script>

	</body>
	</html>																							   
																								   