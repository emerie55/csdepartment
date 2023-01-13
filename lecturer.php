<?php
session_start();
include "connect.php";
?>
<!DOCTYPE HTML>

<head>
    <title>Admin Account Creation</title>

    <link rel="icon" href="img/ginger-star.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="edit.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

    <script src="jquery-3.2.1.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
																	   
</head>


  <script type="text/javascript">
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
    $("#naviconshow").show(10);
    $("#naviconhide").hide();	  
  } else {
    x.type = "password";
    $("#naviconhide").show(10);
    $("#naviconshow").hide();	  
  }
} 
  </script>



<body>

<div class="cover">

	
<div class="jumbotron jumb">

<center>
  <h3 id="h3"><a href="index.php" class="text-success"><img src="img/ginger-star.png" style="width:60px;"/> Departmental Portal</a></h3><br>
  <div class="container ">
  <p class="text">Alraedy Created an account? &nbsp;&nbsp;
  <a href="#" data-toggle="modal" data-target="#myModal" >Login</a>
  </p>
</div>
    <h2><b> <i class="fa fa-graduation-cap"></i> Create an Admin Account</b></h2><br>
    </center>
<div class="container">
  <div class="row">
    <div class="col-md-6 colo">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">

      <div class=" form">
        <input type="text" name="name" class="w3-input" required="required">
        <label class="label-name" for="Lecturer's Full Name">
        <span class="content-name"><i class="fa fa-user"></i> Admin Full Name</span>
        </label>
      </div><br><br>

      <select name="code" class="form-control" required="">
        <option value="">----- Select Level -----</option>
        <option value="ND1">ND1</option>
        <option value="ND2">ND2</option>
        <option value="HND1">HND1</option>
        <option value="HND2">HND2</option>
      </select><br><br>

      <select name="tit" class="form-control" required="">
        <option value="">----- Select Programme -----</option>
        <option value="MORNING">MORNING</option>
        <option value="EVENING">EVENING</option>
        <option value="WEEKEND">WEEKEND</option>
      </select><br><br>

      <select name="sem" class="form-control" required="">
        <option value="">----- Select Semester -----</option>
        <option value="First Semester">First Semester</option>
        <option value="Second Semester">Second Semester</option>
      </select><br>

    </div>

    <div class="col-md-6 colo">


<?php
             
                 if (isset($_POST['sub'])){
           
           //form validation to avoid exploit
function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends
           
  
   
          
            
      
      $name=test_input($_POST["name"]);
      $code=test_input($_POST["code"]); // also called Level
      $title=test_input($_POST["tit"]); // also called programme
      $sem=test_input($_POST["sem"]);
      $username=test_input($_POST["user"]);
      $password=test_input($_POST["pass"]);
      $code_input=test_input($_POST["ci"]);
      $codec="CSP7898";
      


$check2=mysqli_query($con,"select * from lect_rer where username='".mysqli_real_escape_string($con,$username)."' ");

    $row2=mysqli_num_rows($check2);
    
if($row2 > 0 ){
         echo"<script>alert('username already exists')</script>";
         
    }
   elseif ($code_input != $codec) {
      echo"<script>alert('Verification Code is Wrong')</script>";
   }
    
    else{
        if($row2==0){

$cf=mkdir("lecturers/".$username);


        $senddata2 = mysqli_query($con,"insert into lect_rer (name,course_code,course_tit,semester,username,password) values
    ('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$code)."','".mysqli_real_escape_string($con,$title)."','".mysqli_real_escape_string($con,$sem)."',
    '".mysqli_real_escape_string($con,$username)."','".mysqli_real_escape_string($con,$password)."')")or die(mysqli_error($con)); 
  
  $query = "select * from lect_rer where  password='".mysqli_real_escape_string($con,$password)."' AND username='".mysqli_real_escape_string($con,$username)."' ";
                $result = mysqli_query($con,$query)or die(mysqli_error($con));
                                $row = mysqli_fetch_array($result);
    
        }

       
}
    if(@$senddata2){
        
    echo"<script>alert('lecturer account created')</script>";
  
  $_SESSION['passiw']=$row['password'];
                    
                    $_SESSION['name']=$row['name'];
                   
                    $_SESSION['level']=$row['course_code'];
                     $_SESSION['progr']=$row['course_tit'];
                     $_SESSION['sem']=$row['semester'];
                    
                    
                    echo "<script> location.replace('lecturers/')</script>";
}

else{
echo"<script>alert('An error occured,please try again..')</script>";    
}


    }


      ?>

      

  <div class=" form">
    <input type="text" name="user" class="w3-input" required="required">
    <label class="label-name" for="Username">
    <span class="content-name"><i class="fa fa-user-plus"></i> Username</span>
    </label>
  </div>
   
  <div class=" form">
    <input type="password" name="pass" class="w3-input"  id="myInput" required="required">
    <label class="label-name" for="Password">
    <span class="content-name"><i class="fa fa-expeditedssl"></i> Password</span>
    </label>
    <span class="eye fa fa-eye-slash text-primary" id="naviconhide" onclick="myFunction()"></span>  
    <span class="eye fa fa-eye text-success" style="display:none" id="naviconshow" onclick="myFunction()"></span>
  </div>
  
  <div class=" form">
  <input type="text" name="ci" class="w3-input" required="required">
  <label class="label-name" for="Authentication Code">
  <span class="content-name"><i class="fa fa-tag"></i> Authentication Code</span>
  </label>
  </div><br><br>
  
   <button name="sub" class="btn btn-success btn-block " style="margin-bottom:8px;"><b><i class="fa fa-gears"></i> Create</b></button>
</form><br>
 </div>
 </div>
</div>

<br>
</div>

<!-- Modal login -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color:#3399CC;">Admin Login</h4>
        </div>
        <div class="modal-body">

<?php
             
    if (isset($_POST['log'])){
                
            function test_input($data) {
         $data = trim($data);
       $data = stripslashes($data);
     $data = htmlspecialchars($data);
    return $data;
}
//exploit ends

                $user = test_input($_POST['user'])or die('please enter a valid username');
                $password = test_input($_POST['pass'])or die('please enter a valid password');
                $query1 = "select * from lect_rer where  password='".mysqli_real_escape_string($con,$password)."' AND username='".mysqli_real_escape_string($con,$user)."' ";
                $result1 = mysqli_query($con,$query1)or die(mysqli_error($con));
                                $row = mysqli_fetch_array($result1);
                $num_row = mysqli_num_rows($result1);
                  
                  if( $num_row > 0 ) {
                    
                   $_SESSION['passiw']=$row['password'];
                    
                    $_SESSION['name']=$row['name'];
                   
                    $_SESSION['level']=$row['course_code'];
                     $_SESSION['progr']=$row['course_tit'];
                     $_SESSION['sem']=$row['semester'];
                                                             
                                    

                    echo "<script> location.replace('lecturers/')</script>";
                    
                  }
                  else{ 
                echo "<script>alert('Invalid username or Password!')</script>";
                echo "<p style='color:red;'>Are You Sure you have an account?!</p>";
                }    //form validation to avoid exploit

                }            
    ?>


<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

  <div class=" form">
    <input type="text" name="user" class="w3-input" required="required">
    <label class="label-name" for="Username">
    <span class="content-name"><i class="fa fa-user"></i> Username</span>
    </label>
  </div>

  <div class=" form">
    <input type="password" name="pass" class="w3-input" required="required">
    <label class="label-name" for="Password">
    <span class="content-name"><i class="fa fa-lock"></i> Password</span>
    </label>
    
  </div><br>
   
   <button name="log" class="btn btn-info btn-block"><b><i  class="fa fa-sign-in"></i> Login</b></button>
   </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>

















	</body>
	</html>																							   
																								   