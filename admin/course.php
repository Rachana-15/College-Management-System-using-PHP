<?php
require_once('../include/header.php');
require_once('../include/dbcon.php');
?>

<!-- Checking That EditCourseId Session Is Setted Or Not, If Setted Then It Will Redirect To The Edit Course Paqge -->

<?php
if(isset($_SESSION['editcourseid'])){
  header("LOCATION:editcourse.php");
}
?>

<!-- Creating A Session For EditCourseId -->
<?php
if(isset($_GET['editcourseid']))
{
  $editcourseid = $_GET['editcourseid'];
  $_SESSION['editcourseid'] = $editcourseid;
}
?>

<?php
// Coding To Fetch All Course Details

$query = "SELECT * FROM `course`";
$run = mysqli_query($con,$query);
$count = 0;

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

      <div class="main">
              <div class="card-panel">
          <card-title>
            All Courses
          </card-title>
                  <?php
                    if(isset($_POST['editcbtn']))
                   {
                    echo "editcourse";
                   }
                   else{echo "no edit couse";}
                  ?>
          <div class="card-content">
            <table class="striped " >
              <thead>
                <tr>
              <th>Sr No</th>
              <th>Short Name</th>
              <th>Full Name</th>
              <th>Created Date</th>
              <th>Action</th>
            </tr>
            
            </thead>
            <tbody>
              
                  <?php while($data= mysqli_fetch_assoc($run)){
                    $count++;
                    $course_short_name = $data['course_short_name'];
                    $course_full_name = $data['course_full_name'];
                    $course_date = $data['course_date'];
                    $course_id = $data['course_id'];

                ?>
                <tr>
                <td> <?php echo $count; ?> </td>
                <td> <?php echo $course_short_name; ?> </td>
                <td> <?php echo $course_full_name; ?> </td>
                <td> <?php echo $course_date; ?> </td>
                <td> 
                  <a href="editcourse.php?id=<?php echo $course_id; ?>" class=" green-text waves-light"> <i class="material-icons">mode_edit</i></a>  &nbsp;
                  <a href="deletecourse.php?id=<?php echo $course_id; ?>" class=" red-text waves-light"  > <i class="material-icons">delete</i></a> 
                  <!--**********************New Testing Coding Started*****************************-->


                  <form method="POST" action="">
                    <button type="submit" name="editcbtn" class="btn transparent z-depth-0" ><i class="material-icons red-text">person</i></button>
                  </form>
                </td>
                </tr>
                  <?php } ?>
            </tbody>
            </table>
                </div>
        </div>
      </div>




      <div class="fixed-action-btn">
              <a href="addcourse.php" class="btn-floating btn-large pulse">
                <i class="material-icons">add</i>
              </a>
      </div>
      
      <!-- The Navbar Menu Collection List -->
      <?php
require_once('../include/sidenav.php');
?>

      <?php
require_once('../include/footer.php');
?>