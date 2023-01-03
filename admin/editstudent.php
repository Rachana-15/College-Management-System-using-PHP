<?php
require_once('../include/header.php');
?>
<?php
$student_id = $_GET['id'];
if(isset($student_id)){

}
else
{
  header("LOCATION:dashboard.php");
}
?>

<?php
require_once('../include/dbcon.php');
$student_id = $_GET['id'];
$query = "SELECT * FROM students WHERE `id`='$student_id'";
$run = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($run);
$image = $data['image'];
$name = $data['name'];
$rollno = $data['rollno'];
$standerd = $data['standerd'];
$gender = $data['gender'];
$city  = $data['city'];
$contact = $data['contact'];
$email = $data['email'];
?>

<?php
//Update Student Query Code
    require_once('../include/dbcon.php');

    if(isset($_POST['submit'])){
    $image_name = $_FILES['image']['name'];
    $temp_image_name =  $_FILES['image']['tmp_name'];
    $rollno = htmlentities(mysqli_real_escape_string($con,$_POST['rollno']));
    $standerd= htmlentities(mysqli_real_escape_string($con,$_POST['standerd']));
    $name= htmlentities(mysqli_real_escape_string($con,$_POST['name']));
    $gender= htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
    $contact = htmlentities(mysqli_real_escape_string($con,$_POST['contact']));
    $email =  htmlentities(mysqli_real_escape_string($con,$_POST['email']));
    $city = htmlentities(mysqli_real_escape_string($con,$_POST['city']));
    move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "UPDATE `students` SET `rollno`='$rollno', `standerd`='$standerd', `name`='$name', `gender`='$gender', `contact`='$contact', `email`='$email', `city`='$city', `image`='$image' WHERE `id`='$student_id' ";
    $run = mysqli_query($con,$query);

    if($run)
    {
       $_SESSION['student_updated'] = "Student Updated Successfully";
       $student_updated =  $_SESSION['student_updated'];
    
    }
    else{

       $_SESSION['student_updated_failed'] = "Failed To Update";
       $student_updated_failed =  $_SESSION['student_updated_failed'];
     
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

        <div class="row main">
            <div class="col l12 m12 s12">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                <div class="center">
                <h5 class="center red-text"><?php

              if(isset($student_updated)){
                echo $student_updated;
              }
              elseif(isset($student_updated_failed)){
                  echo $student_updated_failed."<br>".mysqli_error($con);
              }
            ?> </h5></div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                     <div class="input-field file-field">
                     <input type="file" name="image" class="dropify" data-show-remove="false" value="<?php echo $image; ?>" data-default-file="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" />
                     </div>
                      </div>
                        <div class="col l4">
                            <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                <input type="text" value="<?php echo $rollno; ?>" name="rollno" id="rollno" required="required">
                                <label for="rollnow">Enter Roll Number</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                    <input type="text" value="<?php echo $name; ?>" name="name" id="name" required="required">
                                    <label for="name">Enter Name</label>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">call</i>
                                        <input type="text" value="<?php echo $contact; ?>" name="contact" id="contact" required="required">
                                        <label for="contact">Enter Mobile Number</label>
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col l4">
                                <div class="input-field">
                                    <select name="standerd" required="required">
                                            <option value="<?php echo $standerd; ?>"> <?php echo $standerd; ?> </option>
                                            <option value="1">Btech</option>
                                            <option value="2">BBA</option>
                                            <option value="3">BCA</option>
                                            <option value="4">MBA</option>
                                            <option value="5">MCA</option>
                                            <option value="6">Mtech</option>
                                            


                                    </select>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">location_city</i>
                                        <input type="text" value="<?php echo $city; ?>" name="city" id="city" required="required">
                                        <label for="city">Enter City Name</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">email</i>
                                      <input type="text" value="<?php echo $email; ?>" name="email" id="email" required="required">
                                      <label for="email">Enter Email Address</label>
                                  </div>

                            </div>
                        </div>
                        <div class="col l4 center">

                        </div>
                        <div class="col l8 center large">
                          <input type="radio" name="gender" id="male" <?php
                           if($gender=="male")
                           {
                             echo "checked";
                            }
                           ?> value="male" required="required">
                          <label for="male">Male</label>
                          <input type="radio" name="gender" id="female" <?php
                           if($gender=="female")
                           {
                             echo "checked";
                            }
                           ?> value="female" required="required">
                          <label for="female">Female</label>
                        </div>
                    </div>

                    <button type="submit" name="submit" style="width:100%" class="btn">Update Students</button>
                </div>
              </form>

            </div>
        </div>

      <!-- The Navbar Menu Collection List -->

      <?php
require_once('../include/sidenav.php');
?>


      <?php
require_once('../include/footer.php');
?>