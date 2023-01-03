<?php
require_once('../include/header.php');
?>

<?php

    require_once('../include/dbcon.php');

    if(isset($_POST['submit'])){
    $image_name = $_FILES['image']['name'];
    $temp_image_name =  $_FILES['image']['tmp_name'];
    $rollno = $_POST['rollno'];
    $standerd= $_POST['standerd'];
    $name= $_POST['name'];
    $gender= $_POST['gender'];
    $contact = $_POST['contact'];
    $email =  $_POST['email'];
    $city = $_POST['city'];
    move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "INSERT INTO `students`(`rollno`, `standerd`, `name`, `gender`, `contact`, `email`, `city`,`image`) VALUES ('$rollno','$standerd','$name','$gender','$contact','$email','$city','$image_name')";
    $run = mysqli_query($con,$query);
    
    if($run)
    {
        $_SESSION['student_added'] = "Student Added Successfully";
        $student_added =  $_SESSION['student_added'];
    }
    else{

      $_SESSION['student_added_failed'] = "Failed To Add New Student";
      $student_added_failed =  $_SESSION['student_added_failed'];
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

        <div class="row main">
            <div class="col l12 m12 s12">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-panel">
                <div class="cente">
                <h5 class="center red-text"><?php 
              
              if(isset($student_added)){
                echo $student_added; 
              }
              

            ?> </h5></div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                     <div class="input-field file-field">
                     <input type="file" name="image" class="dropify" data-show-remove="false" data-default-file="../images/user.png" />
                     </div>
                      </div>
                        <div class="col l4">
                            <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                <input type="text" name="rollno" id="rollno" required="required">
                                <label for="rollnow">Enter Roll Number</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">person</i>
                                    <input type="text" name="name" id="name" required="required">
                                    <label for="name">Enter Name</label>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">call</i>
                                        <input type="text" name="contact" id="contact" required="required">
                                        <label for="contact">Enter Mobile Number</label>
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col l4">
                                <div class="input-field">
                                    <select name="standerd" required="required">
                                            <option value="">Choose Standerd </option>
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
                                        <input type="text" name="city" id="city" required="required">
                                        <label for="city">Enter City Name</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">email</i>
                                      <input type="text" name="email" id="email" required="required">
                                      <label for="email">Enter Email Address</label>
                                  </div>

                            </div>
                        </div>
                        <div class="col l4 center">
                          
                        </div>
                        <div class="col l8 center large">
                          <input type="radio" name="gender" id="male" value="male" required="required">
                          <label for="male">Male</label>
                          <input type="radio" name="gender" id="female" value="female" required="required">
                          <label for="female">Female</label>
                        </div>
                    </div>
                     
                    <button type="submit" name="submit" style="width:100%" class="btn">Add Students</button>
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