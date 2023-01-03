<?php
require_once('../include/header.php');
?>
<?php
$teacher_id = $_GET['id'];
if(isset($teacher_id)){

}
else
{
  header("LOCATION:dashboard.php");
}
?>

<?php
require_once('../include/dbcon.php');
$query = "SELECT * FROM teacher WHERE `id`='$teacher_id'";
$run = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($run);
$image = $data['image'];
$name = $data['name'];
$email = $data['email'];
$contact = $data['contact'];
$gender = $data['gender'];
$position  = $data['position'];
$address = $data['address'];
?>

<?php
//Update Student Query Code
    require_once('../include/dbcon.php');

    if(isset($_POST['submit'])){
        $image_name = $_FILES['image']['name'];
        $temp_image_name =  $_FILES['image']['tmp_name'];
        $name = $_POST['name'];
        $email= $_POST['email'];
        $contact= $_POST['contact'];
        $gender= $_POST['gender'];
        $position = $_POST['position'];
        $address = $_POST['address'];
    move_uploaded_file($temp_image_name,"../img/$image_name");
   $query = "UPDATE `teacher` SET `name`='$name', `email`='$email', `contact`='$contact', `gender`='$gender', `position`='$position', `address`='$address', `image`='$image' WHERE `id`='$teacher_id' ";
    $run = mysqli_query($con,$query);

    if($run)
    {
       $_SESSION['teacher_updated'] = "Teacher Updated Successfully";
       $teacher_updated =  $_SESSION['teacher_updated'];
    
    }
    else{

       $_SESSION['teacher_updated_failed'] = "Failed To Update";
       $teacher_updated_failed =  $_SESSION['teacher_updated_failed'];
     
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
              
              if(isset($teacher_updated)){
                echo $teacher_updated; 
              }
              elseif(isset($teacher_updated_failed)){
                  echo $teacher_updated_failed;
              }
              

            ?> </h5></div>
                    <div class="row">
                      <div class="col l4 m12 s12 center">
                     <div class="input-field file-field">
                     <input type="file" name="image" class="dropify" data-show-remove="false" data-default-file="../img/<?php if(isset($image) && !empty($image)){echo $image;} else {echo "teacher.png";} ?>" />
                     </div>
                      </div>
                        <div class="col l4">
                            <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                <input type="text" name="name" id="name" value="<?php echo $name; ?>" required="required">
                                <label for="name">Enter Name</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                    <input type="text" name="email" id="email" value="<?php echo $email; ?>"" required="required">
                                    <label for="email">Enter Email Address</label>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">call</i>
                                        <input type="text" name="contact" id="contact" value="<?php echo $contact; ?>"" required="required">
                                        <label for="contact">Enter Mobile Number</label>
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col l4">
                                <div class="input-field">
                                    <select name="position" required="required">
                                            <option value="<?php echo $position; ?>" > <?php echo $position; ?> </option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Head Teacher">Head Teacher</option>
                                            <option value="Best Teacher">Best Teacher</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                        <i class="material-icons prefix">lock</i>
                                        <input type="password" name="password" id="password" value="password" required="required">
                                        <label for="password">Enter A Password</label>
                                    </div>
                                    <div class="input-field">
                                      <i class="material-icons prefix">location_city</i>
                                      <input type="text" name="address" id="address" value="<?php echo $address; ?>" required="required">
                                      <label for="Address">Enter Address</label>
                                  </div>

                            </div>
                        </div>
                        <div class="col l4 center">
                          
                        </div>
                        <div class="col l8 center large">
                          <input type="radio" name="gender" id="male" value="male" <?php if($gender=="male"){ echo "checked";} ?> required="required">
                          <label for="male">Male</label>
                          <input type="radio" name="gender" id="female" value="female"   <?php if($gender=="female"){ echo "checked";} ?> required="required">
                          <label for="female">Female</label>
                        </div>
                    </div>
                     
                    <button type="submit" name="submit" style="width:100%" class="btn">Update Teacher</button>
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