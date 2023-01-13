<!-- SIDEBAR -->
<div class="sidebar">
  <section class="s_log">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>
  <a  href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard </a>
  <a href="submit.php"><span class="glyphicon glyphicon-share"></span> Complain / Question <span class="badge">
    <?php
  $mysqli1="select * from submit_ted where student_id='$id' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span></a>
  
  <a href="new.php"><span class="glyphicon glyphicon-calendar"></span> Important Information <span class="badge">
     <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
  ?></span></a>
<a href="profile.php"><span class="fa fa-cogs"></span> Profile </a>
  
  
  <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')"><span class="glyphicon glyphicon-off"></span> Logout</a>

</div>
<!-- END SIDEBAR -->

<!--  MOBILE SIDEBAR -->
<div class="smob">
  
<section class="s_log">
    <img src="../img/fed.PNG" class="img img-responsive">
  </section>  

  <div class="navimg" id="navhide">
    <span class="fa fa-navicon" id="naviconhide"></span>
    <span class="fa fa-list-ul" id="naviconshow"></span>
  </div>  
  

  <ul class="" id="navshow">
  <br><br>
  <a class=" smoblink"  href="index.php"><li><span class="glyphicon glyphicon-home"></span> Dashboard </li></a>
  <a href="submit.php"  class="smoblink"><li><span class="glyphicon glyphicon-share"></span> Complain / Question 
  <span class="badge">
    <?php
  $mysqli1="select * from submit_ted where student_id='$id' ";
  $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
  $count1=mysqli_num_rows($myquery1); echo $count1;
?>
  </span>
</li></a>
  
  <a href="new.php" class="smoblink"><li><span class="glyphicon glyphicon-calendar"></span> Important Information 
  <span class="badge">
     <?php
 $mysqli1="select * from info where level='$lev' AND programme='$prog' AND semester='$sem' ";
 $myquery1=mysqli_query($con,$mysqli1) or die(mysqli_error($con));
 $count1=mysqli_num_rows($myquery1); echo $count1;
  ?></span>
</li></a>
<a href="profile.php" class="smoblink"><li><span class="fa fa-cogs"></span> Profile </li></a>
  
  
  <a href="logout.php" class="smoblink" onclick="return confirm('Are you sure you want to logout?')"><li><span class="glyphicon glyphicon-off"></span> Logout </li></a>
  </ul>
</div>
<!-- END SIDEBAR -->
