<?php 
session_start();
include("../config.php");



if(!isset($_SESSION['username']) || $_SESSION['admin'] != 1 && $_SESSION['admin'] != ''){
	
	
	echo "<script>window.location.href='../login.php';</script>";
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include("head.php"); ?>

<body>

<?php

if(isset($_POST['submit'])){
	
	InsertClass();
	
	
}


?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
			<?php include("topNav.php");?>
			
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
              
			<?php include("sideNav.php"); ?>  
			  
            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">






<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Class

</h1>
</div>
               


<form action="add_product.php" method="post" enctype="multipart/form-data">


<div class="col-md-8">

<div class="form-group">
    <label for="class_title">Class Title </label>
        <input type="text" name="class_title" class="form-control">
       
    </div>


    <div class="form-group">
           <label for="class_description">Class Description</label>
      <textarea name="class_description" id="" cols="30" rows="10" maxlength="1000" class="form-control"></textarea>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="class_price">Class Price</label>
        <input type="number" name="class_price" class="form-control" size="60" min="1">
      </div>
    </div>



    <div class="form-group row">

      <div class="col-xs-3">
        <label for="class_seats">Class Seats</label>
        <input type="number" name="class_seats" class="form-control" size="60" min="1">
      </div>
    </div>



</div><!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

   

     <!-- Product Categories-->

    <div class="form-group">
         <label for="class_category">Class Category</label>
          <hr>
        <select name="class_category" id="" class="form-control">
            <option value="">Select Category</option>
           
		   <?php
		   
		   $res = getClassCategories();
		   while($row = mysqli_fetch_array($res)){
			   echo '<option>'.$row[cat_id]."-".$row[cat_name].'</option>';
		   }
		   
		   ?>
        </select>


</div>

<div class="form-group">
    <label for="class_age">Class Age </label>
        <input type="text" name="class_age" class="form-control">
       
    </div>
	
	
	<div class="form-group">
    <label for="class_time">Class Time </label>
        <input type="text" name="class_time" class="form-control">
       
    </div>




    <div class="form-group">
         <label for="class_teacher">Class Teacher</label>
          <hr>
        <select name="class_teacher" id="" class="form-control">
            <option value="">Select Teacher</option>
           
		   <?php
		   
		   $res = getTeachersToOptions();
		   while($row = mysqli_fetch_array($res)){
			   echo '<option>'.$row[teacher_id]."-".$row[teacher_name].'</option>';
		   }
		   
		   ?>
        </select>


</div>



    <!-- Product Image -->
    <div class="form-group">
        <label for="class_img2">Class Image</label>
        <input type="file" name="class_img2"  accept="image/png, image/gif, image/jpeg">
      
    </div>



</aside><!--SIDEBAR-->


      
     <div class="form-group">
       
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Save Class">
    </div>
	
</form>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<?php include("footer.php"); ?> 
	
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
