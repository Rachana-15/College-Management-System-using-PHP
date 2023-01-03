<?php
require_once('../include/header.php');
?>

<?php

    require_once('../include/dbcon.php');

    if(isset($_POST['submit'])){
    $image_name = $_FILES['image']['name'];
    $temp_image_name =  $_FILES['image']['tmp_name'];
    $name = $_POST['name'];
    $email= $_POST['email'];
    $contact= $_POST['contact'];
    $gender= $_POST['gender'];
    $position = $_POST['position'];
    $password =  $_POST['password'];
    $address = $_POST['address'];
    move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "INSERT INTO `teacher`(`name`, `email`, `contact`, `gender`, `position`, `password`, `address`,`image`) VALUES ('$name','$email','$contact','$gender','$position','$password','$address','$image_name')";
    $run = mysqli_query($con,$query);
    
    if($run)
    {
        $_SESSION['teacher_added'] = "Teacher Added Successfully";
        $teacher_added =  $_SESSION['teacher_added'];
    }
    else{

      $_SESSION['teacher_added_failed'] = "Failed To Add New Teacher";
      $teacher_added_failed =  $_SESSION['Teacher_added_failed'];
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
                <div class="cente">
                <h5 class="center red-text"><?php 
              
              if(isset($teacher_added)){
                echo $teacher_added; 
              }
              

            ?> </h5></div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                     <div class="input-field file-field">
                     <input type="file" name="image" class="dropify" data-show-remove="false" data-default-file="../images/teacher.png" />
                     </div>
                      </div>
                        <div class="col l4">
                            <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" required="required">
                                <label for="name">Enter Name</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                    <input type="text" name="email" id="email" required="required">
                                    <label for="email">Enter Email Address</label>
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
                                    <select name="position" required="required">
                                            <option value="">Select Position </option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Head Teacher">Head Teacher</option>
                                            <option value="Best Teacher">Best Teacher</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" name="password" id="password" required="required">
                                        <label for="password">Enter A Password</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">location_city</i>
                                      <input type="text" name="address" id="address" required="required">
                                      <label for="Address">Enter Address</label>
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
                     
                    <button type="submit" name="submit" style="width:100%" class="btn">Add Teacher</button>
                </div>
              </form>

            </div>
        </div>

      <!-- The Navbar Menu Collection List -->

      <?php
require_once('../include/sidenav.php');
require_once('../include/footer.php');
?>