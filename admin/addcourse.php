<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
?>


<?php


    if(isset($_POST['add_course'])){

    $course_short_name = $_POST['course_short_name'];
    $course_full_name= $_POST['course_full_name'];
    $course_date= $_POST['course_date'];

   $query = "INSERT INTO `course`(`course_short_name`, `course_full_name`, `course_date`) VALUES ('$course_short_name','$course_full_name','$course_date')";
    $run = mysqli_query($con,$query);
    
    if($run)
    {
        $_SESSION['course_added_successfully'] = "Course Added Successfully";
        $course_added_successfully = $_SESSION['course_added_successfully'];
    }
    else{

     echo "Failed To Add New Course".mysqli_error($con);
     }
}
?>

      <!-- The Coding Has Been Started From Here -->

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">College Management System</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->

        <div class="card-panel main">
            <span class="card-title container">
              <h5>Add Course</h5>
              <h5 class="center red-text"><?php 
              
                if(isset($course_added_successfully)){
                  echo $course_added_successfully; 
                }
                

              ?> </h5>
            </span>
            <form action="" method="POST">
            <div class="card-content container">
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="course_short_name" id="course_short_name" required="required">
                <label for="course_short_name" class="">Enter Course Short Name</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="course_full_name" id="course_full_name" required="required">
                <label for="course_full_name" class="">Enter Course Full Name</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="course_date" id="course_date" value="25-01-2023" readonly="readonly" required="required">
                <label for="course_date" class="">Creation Date</label>
              </div>
              <button type="submit" name="add_course" class="btn" style="width:100%;">Create Course</button>
            </div>
           </form>
        </div>

      <!-- Fixed Action Button -->

      <div class="fixed-action-btn">
              <a href="course.php" class="btn-floating btn-large pulse">
                <i class="material-icons large">arrow_back</i>
              </a>
      </div>
      
      <!-- The Navbar Menu Collection List -->
      <?php
require_once('../include/sidenav.php');
?>

      <?php
require_once('../include/footer.php');
?>