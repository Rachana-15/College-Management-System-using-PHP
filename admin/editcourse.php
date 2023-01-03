<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
?>

<?php

    //Selecting Data Form Database For Print, Using GET Method ID

    $get_course_id = $_GET['id'];
    $query = "SELECT * FROM `course` WHERE `course_id`='$get_course_id'";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_assoc($run);
    
    $course_id = $data['course_id'];
    $course_short_name = $data['course_short_name'];
    $course_full_name= $data['course_full_name'];
    $course_date= $data['course_date'];

?>



<?php

  //Update Course Coding

    if(isset($_POST['add_course'])){

    $course_short_name = $_POST['course_short_name'];
    $course_full_name= $_POST['course_full_name'];
    $course_date= $_POST['course_date'];
   $query = "UPDATE `course` SET `course_short_name` = '$course_short_name',`course_full_name` = '$course_full_name' WHERE `course_id`='$get_course_id'";
    $run = mysqli_query($con,$query);
    
    if($run)
    {
        $_SESSION['course_updated_successfully'] = "Course Updated Successfully";
        $course_updated_successfully = $_SESSION['course_updated_successfully'];
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
            <a href="" class="brand-logo center">Social Learnia</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->

        <div class="card-panel main">
            <span class="card-title container">
              <h5>Update Course</h5>
              <h5 class="center red-text"><?php 
              
                if(isset($course_updated_successfully)){
                  echo $course_updated_successfully; 
                }
                

              ?> </h5>
            </span>
            <form action="" method="POST">
            <div class="card-content container">
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="course_short_name" value="<?php echo $course_short_name; ?>" id="course_short_name" required="required">
                <label for="course_short_name" class="">Course Short Name</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="course_full_name" value="<?php echo $course_full_name; ?>" id="course_full_name" required="required">
                <label for="course_full_name" class="">Course Full Name</label>
              </div>
              <div class="input-field">
                <i class="material-icons prefix">person</i>
                <input type="text" name="course_date" id="course_date" value="<?php echo $course_date; ?>"id="Start date" required="required">
                <label for="course_date" class="">Creation Date</label>
              </div>
              <button type="submit" name="add_course" class="btn" style="width:100%;">Update Course</button>
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