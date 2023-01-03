<?php
require_once('../include/dbcon.php');
$student_id = $_SESSION['student_id'];
$query = "SELECT * FROM `students` WHERE `id`='$student_id'";
$run = mysqli_query($con,$query);
$data = mysqli_fetch_assoc($run);
$name = $data['name'];
$email = $data['email']; 
$image = $data['image'];
$rollno = $data['rollno'];
$standerd = $data['standerd'];
$contact = $data['contact'];
?>
<ul id="slide-out" class="sidenav collapsible sidenav-fixed">
        <li class="user-view">
            <div class="background">
                <img src="../images/sms_bg.jpg" class="responsive-img" alt="">
            </div>
            <a href="profile.php">
            <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "students.png";
                                    }
                                      ?>" alt="" class="responsive-img circle">
            </a>
            <span class="name white-text"><?php echo $name ?></span>
            <span class="email white-text"><?php echo $email ?></span>
        </li>
        <li><a href="index.php"><i class="material-icons">dashboard</i> Dashboard</a></li>
        <li>
          <div class="collapsible-header">
            <ul>
              <li>
              <i class=" collapsible-header material-icons" style="color:#757575;">file_download</i> <span style="margin-left:18px;">Download Center</span>  <i class="material-icons right prefix" style="margin-right:0; margin-left:30px; color:#757575;">arrow_drop_down</i>
              </li>
            </ul>
          </div>
          <div class="collapsible-body">
            <ul style="overflow-x: hidden">
              <li>
              <li><a href=""><i class="material-icons" style="margin-left:10px;">chevron_right</i>Assignments</a></li>
              <li><a href=""><i class="material-icons" style="margin-left:10px;">chevron_right</i>Study Material</a></li>
              <li><a href=""><i class="material-icons" style="margin-left:10px;">chevron_right</i>Syllabus</a></li>
              <li><a href=""><i class="material-icons" style="margin-left:10px;">chevron_right</i>Other Downloads</a></li>
              </li>
            </ul>
          <div class="divider"></div>
          </div>
        </li>
        <li><a href=""><i class="material-icons">dashboard</i> Dashboard</a></li>
        <li><a href=""><i class="material-icons">dashboard</i> Dashboard</a></li>
        <li><a href=""><i class="material-icons">dashboard</i> Dashboard</a></li>
        <li><a href=""><i class="material-icons">dashboard</i> Dashboard</a></li>
        <div class="divider"></div>
        <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
        <li><a href="about.php"><i class="material-icons">info</i>About Us</a></li>
    </ul>