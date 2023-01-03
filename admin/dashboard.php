<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

?>

<?php

// Fetching The Number Of Students

$query = "SELECT * FROM students";
$run = mysqli_query($con,$query);
$student_row = mysqli_num_rows($run);

// Fetching The Number Of Courses

$query = "SELECT * FROM course";
$run = mysqli_query($con,$query);
$course_row = mysqli_num_rows($run);

// Fetching The Number Of Teachers

$query = "SELECT * FROM teacher";
$run = mysqli_query($con,$query);
$teacher_row = mysqli_num_rows($run);

?>
      <!-- The Coding Has Been Started From Here -->

      <nav class="teal">
        <div class="container">
          <div class="nav-wrapper">
            <a href="" class="brand-logo center">COLLEGE MANAGEMENT SYSTEM</a>
            <a href="" class="sidenav-trigger show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
          </div>        
        </div>
      </nav>


      <!-- The Dashboard Coding Started From Here -->

      <div class="row main">
        <div class="col m12 s12 l3">
          <div class="card">
            <div class="card-content blue lighten-3 white-text">
              <h3> <b><?php echo $student_row; ?></b> </h3>
              <p> <b>Students</b> </p>
            </div>
            <div class=" center card-action blue lighten-2 white-text" >
           <a href="allstudents.php">More Information <i class="material-icons tiny" >open_in_new</i></a>
            </div>
          </div>
        </div>
        <div class="col m12 s12 l3">
            <div class="card">
              <div class="card-content blue lighten-3 white-text">
              <h3> <b><?php echo $teacher_row; ?></b> </h3>
                <p> <b>Teachers</b> </p>
                  
              </div>
              <div class=" center card-action blue lighten-2 white-text" >
             <a href="teachers.php">More Information <i class="material-icons tiny">open_in_new</i></a>
              </div>
            </div>
          </div>
          <div class="col m12 s12 l3">
              <div class="card">
                <div class="card-content blue lighten-3 white-text">
                  <h3> <b><?php echo $course_row; ?></b> </h3>
                  <p> <b>Courses</b> </p>
                </div>
                <div class=" center card-action blue lighten-2 white-text" >
               <a href="course.php">More Information <i class="material-icons tiny">open_in_new</i></a>
                </div>
              </div>
            </div>
            <div class="col m12 s12 l3">
                <div class="card">
                  <div class="card-content blue lighten-3 white-text">
                    <h3> <b>2</b> </h3>
                    <p> <b>Marks</b> </p>
                  </div>
                  <div class=" center card-action blue lighten-2 white-text" >
                 <a href="">More Information <i class="material-icons tiny">open_in_new</i></a>
                  </div>
                </div>
              </div>
      </div>


      <!-- The Navbar Menu Collection List -->
      <?php
require_once('../include/sidenav.php');
?>

      <?php
require_once('../include/footer.php');
?>