<?php require_once('../include/students/header.php'); ?>
<?php require_once('../include/students/sidenav.php'); ?>

<!-- fetching the only logined user image using the session -->

<?php

// i m fetching the image name, if get variable exist on URL

 $logined_user = $_SESSION['student_id'];
 if(isset($_GET['u'])){
    $get_username = $_GET['u'];
    $query = "SELECT * FROM `students` WHERE `username`= '$get_username'";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_assoc($run);
    $image = $data['image'];
    $name =  $data['name'];
}
else{
 $query =  "SELECT * FROM `students` WHERE `id` = '$logined_user'";
 $run = mysqli_query($con,$query);
 $data= mysqli_fetch_assoc($run);
 $image = $data['image'];
 $name = $data['name'];
}
?>
<!-- fetching the user id using get method username, which will send into follow table-->
<?php
if(isset($_GET['u'])){
    $get_username = $_GET['u'];
    $query = "SELECT * FROM `students` WHERE `username`= '$get_username'";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_assoc($run);
    $user = $data['id'];
    $query = "SELECT * FROM `posts` WHERE `from_user_id`= '$user' order by `post_id` desc";
}
?>
<?php
    // updating followers count history
    $from_user_id =  $_SESSION['student_id'];
    $query = "SELECT * FROM `follow` WHERE `from_user_id` = '$from_user_id'";
    $run = mysqli_query($con,$query);
    $following_row  = mysqli_num_rows($run);

    // updating following count data
    $from_user_id =  $_SESSION['student_id'];
    $query = "SELECT * FROM `follow` WHERE `to_user_id` = '$from_user_id'";
    $run = mysqli_query($con,$query);
    $followers_row = mysqli_num_rows($run);
?>
<?php
//POST POSTING CODE TO DATABASE SERVER
if(isset($_POST['post'])){
    $from_user_id = $_SESSION['student_id'];
    $content = htmlentities(mysqli_real_escape_string($con,$_POST['content']));
    $image_name = $_FILES['post_image']['name'];
    $temp_image_name =  $_FILES['post_image']['tmp_name'];
    move_uploaded_file($temp_image_name,"../img/$image_name");
    $query = "INSERT INTO `posts` (`from_user_id`,`content`,`image`) VALUES ('$from_user_id','$content','$image_name')";
    $run = mysqli_query($con,$query);
}
?>
<?php
    // updating following list code
    if(isset($_POST['follow'])){
        $form_data_from_user_id = $_SESSION['student_id'];
        $form_data_to_user_id = $_POST['to_user_id'];
        $query = "SELECT * FROM `follow` WHERE `from_user_id`='$form_data_from_user_id' and `to_user_id` = '$form_data_to_user_id'";
        $run = mysqli_query($con,$query);
        // $data = mysqli_fetch_assoc($run);
        // $from_user_id = $data['from_user_id'];
        
        // $to_user_id = $data['to_user_id'];
        // the query may be wrong
            // if($from_user_id == $form_data_from_user_id and $to_user_id == $form_data_to_user_id){ 
            $row = mysqli_num_rows($run);
                if($row < 1){
                    $form_user_id = $_SESSION['student_id'];
                    $to_user_id = $_POST['to_user_id'];
                    $query = "INSERT INTO `follow` (`to_user_id`, `from_user_id`) VALUES ('$to_user_id', '$form_user_id')";
                    $run = mysqli_query($con,$query);
                    }
                else{
                     echo "<script>alert('you have already following this user')</script>";
                    }
        //     }
        // else{
        //     echo "you have already followed this user ok";
        // }
    }
?>
<?php
    // updating following list code
    if(isset($_POST['following'])){
        $from_user_id = $_SESSION['student_id'];
        $to_user_id = $_POST['to_user_id'];
        $query = "DELETE FROM `follow` WHERE `from_user_id` ='$from_user_id' and `to_user_id`='$to_user_id'";
        $run = mysqli_query($con,$query);
    }
?>
<!-- post fetching code -->
    <nav class="brown darken-4">
        <a href="" class="brand-logo center">Social Codia </a>
        <a href="" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
        <a href=""><img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" class=" dropdown-trigger right responsive-img circle brand-logo " data-target="dropdown" alt="" style=" width: 40px; margin-top: 8px; margin-right: 8px;"></a>
    </nav>
    <!-- Main Page Coding -->
    <div class="mufazmi">
        <div class="row">
            <div class="col s12 m12 l12 ">
                    <img class="responsive-img" src="../images/fb_cover.jpg" alt="" style="height: 200px; width: 100%;">
            </div>
            <div class="col s12 m4 l3 sidebar" style="margin-top: -100px;">
                    <div class="center-align">
                    <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                    // implemention of data without any title
                                
                                      ?>" alt="" class="responsive-img circle z-depth-3" style="width: 150px; cursor:pointer;">
                        <br> <h5><?php echo $name; ?> <i class="material-icons blue-text tiny tooltipped" data-position="top" data-tooltip="Verfied Account" style="cursor:pointer;" >check_circle</i></h5>
                                    <form action="" method="POST">
                                        <input type="hidden" name="to_user_id" id="" value="<?php echo $user ;?>">
                                        <?php
                                        // Notice: Undefined variable: user in C:\xampp\htdocs\sms\students\profile.php on line 139
                                            $userid = $_SESSION['student_id'];
                                            $to_user_id = $userid;
                                            $query = "SELECT * FROM `follow` WHERE `from_user_id`='$userid' AND `to_user_id`= '$to_user_id'";
                                            $run = mysqli_query($con,$query);
                                            $row = mysqli_num_rows($run);
                                            if($row < 1) { ?> 
                                                <button type="submit" name="follow"  class="btn orange waves-effect waves-light" >Follow</button> 
                                            <?php }
                                            else{ ?>
                                                <button type="submit" name="following" class="btn gray darken-4 waves-effect waves-light" >Following</button> 
                                            <?php }
                                            ?>
                                    </form>
                    </div>
                        <div class="center-align">
                            <div class="col s6">
                                <h6>Followers</h6>
                                <h5><a href="#"><?php echo $followers_row; ?></a></h5>
                            </div>
                            <div class="col s6">
                                    <h6>Following</h6>
                                    <h5><a href="#"><?php echo $following_row; ?></a></h5>
                            </div>
                        </div>
                        <div class=" col l12 white-text brown lighten-1">
                            <h5>About Me!</h5>
                            <p>Hi! I'm <?php echo $_SESSION['name']; ?>, I'm 18 years old, living in Sarai Meer. I am a college student
studying at Yashawantrao Chavan Mahavidyalaya. I am open to
opportunities in Artificial Intelligence, Engineering, Communications &
Media, Software Engineering, and Data Science in Sarai Meer.</p>
                        </div>
                        <div class="container divider"></div>
                            <div class="col s12">
                                <p>Perfomance</p>
                                <p><a href="#">56</a> and <a href="#">42</a> reviews </p>
                            </div>
                            <div class="container divider"></div>
                            <!-- implemintion of data without any software requirement specification documents (SRS) -->                        <h6 class="col s12">Images</h6>
                        <div class="col s4">
                            <img src="../images/1.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/2.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/3.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/4.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/5.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/6.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/7.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/8.jpg" alt="" class="responsive-img">
                        </div>
                        <div class="col s4">
                            <img src="../images/9.jpg" alt="" class="responsive-img">
                        </div>
            </div>
            <div class="col s12 m8 l6">
                    <!-- <div class="row"> -->
                            <div class="card z-depth-0">
                                <div class="input-field">
                                <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" alt="" class="circle responsive-img prefix" style="width: 40px; margin: 10px;">
                                      <form action="" method="post"  enctype="multipart/form-data">
                                        <textarea  id="" cols="30" rows="10" name="content" class="materialize-textarea" placeholder="What's on your mind?" style="height: 100px; padding-left: 60px; padding-top:25px; border-bottom: none;"></textarea>
                                        <img id="blah" alt="" style="width:100px; padding-left:30px;"/>
                                        <div class="card-action">
                                            <input id="fileButton" type="file" onchange="readURL(this);" name="post_image" class="hide"/>
                                            <label for="fileButton"><i class="material-icons">camera_alt</i></label>
                                            <button class="btn right z-depth-0" type="submit" name="post">POST</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <!-- </div> -->
                        <!-- post fetching from database server -->
                           <?php
                                if(isset($_GET['u'])){
                                    $get_username = $_GET['u'];
                                    $query = "SELECT * FROM `students` WHERE `username`= '$get_username'";
                                    $run = mysqli_query($con,$query);
                                    $data = mysqli_fetch_assoc($run);
                                    $user = $data['id'];
                                    $query = "SELECT * FROM `posts` WHERE `from_user_id`= '$user' order by `post_id` desc";
                                }
                                else{

                                    $from_user_id = $_SESSION['student_id'];
                                    $query = "SELECT * FROM `posts` WHERE `from_user_id`= '$from_user_id' order by `post_id` desc";
                                }

                                // $query = "SELECT * FROM `posts` WHERE `from_user_id`= '$from_user_id' order by `post_id` desc";
                                $run = mysqli_query($con,$query);
                            ?>
                <!-- <div class="row"> -->
                    <?php
                        while($data=mysqli_fetch_assoc($run)){
                            $post_content = $data['content'];
                            $post_image = $data['image'];
                            $timestamp = $data['timestamp'];
                            $post_id =  $data['post_id'];
                    ?>
                    <div class="card  lighten-2 z-depth-0">
                        <div class="row">
                            <div class="col s2 center-align">
                            <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" alt="" class="responsive-img circle " style="width: 40px; margin-top:10px;">
                            </div>
                            <div class="col s9" style="margin-left: -20px;">
                                <p class=""><?php echo $name; ?></p>
                                <p class="grey-text small" style="font-size:12px; margin-top: -18px;"> Shared publicly - <?php echo $timestamp; ?> </p>
                            </div>
                            <div class="col s1"style="margin-top: 10px;">
                                <a href="#"  data-target="post_dropdown" class="dropdown-trigger"><i class="material-icons">keyboard_arrow_down</i></a>
                            </div>
                            <div class="col s12" style="margin-top:-25px; ">
                                <p style=" margin-left: 10px; margin-right: 10px;"><?php echo $post_content; ?></p>
                                <div class="card-image">
                                    <img src="../img/<?php echo $post_image; ?>" alt="" class="responsive-img">
                                </div>
                            </div>
                            <div class="col s4 center">
                                <a class="btn transparent blue-text z-depth-0" href="" style="font-size: 12px;"><i class="material-icons">thumb_up</i> Like</a>
                            </div>
                            <div class="col s4 center">
                                    <a class="btn transparent blue-text z-depth-0 left-align" href="" style="font-size: 12px; margin-left: -10px; margin-right:-10px;"><i class="material-icons">comment</i> Comment</a>
                            </div>
                            <div class="col s4 center">
                                <a class="btn transparent blue-text z-depth-0" href="" style="font-size: 12px;"><i class="material-icons">share</i> Share</a>
                            </div>
                        </div>
                    </div>
                    <ul class="dropdown-content" id="post_dropdown">
                        <li><a href="">Edit</a></li>
                        <li><a href="../include/students/post_delete.php?id=<?php echo $post_id; ?>">Delete</a></li>
                    </ul>
                <!-- </div> -->
                <?php
                        }
                    ?>
            </div>
            <div class="col s12 m12 l3 hide-on-med-and-down">
             <h5 class="left">Who to follow</h5>
                <!-- <div class="row"> -->
                            <!-- code for suggest to follow profiles -->
                            <?php
                $query = "SELECT * FROM `students`";
                $run = mysqli_query($con,$query);
                while($data=mysqli_fetch_assoc($run)){
                    $name =  $data['name'];
                    $image = $data['image'];
                    $username =  $data['username'];
                    $id = $data['id'];              
                ?>      
                        <div class="col l6">
                            <div class="card" style="border-top-left-radius:30%;border-top-right-radius:30%;border-bottom-right-radius:10%;border-bottom-left-radius:10%;">
                                <a href="?u=<?php echo $username; ?>">
                                    <div class="card-image" style="border-radius:20%;">
                                        <img  src="../img/<?php 
                                         if (isset($image) && !empty($image)){
                                            echo $image;
                                           }
                                           else
                                           {
                                             echo "user.png";
                                           }?>" alt="" style="max-height:120px; min-height:120px; border-top-left-radius:20%;border-top-right-radius:20%; margin-bottom:-20%;" class=" responsive-img">
                                        <h3 class="center-align align-center black-text" style="font-size:14px; margin-bottom:10%;"><?php echo $name; ?></h3>
                                    </div>
                                </a>
                                <form action="" method="POST">
                                        <input type="hidden" name="from_user_id" id="" value="<?php echo $_SESSION['student_id'];?>">
                                        <input type="hidden" name="to_user_id" id="to_user_id" value="<?php echo $id; ?>"">
                                        <div class="col l10 offset-1">
                                        <button type="submit" name="follow" id="follow" style="border-radius:20%;" class="btn z-depth-0 orange waves-effect waves-light" >Follow</button>
                                        </div> 
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                <!-- </div> -->
                
            </div>
        </div>
    </div>

    <!-- right sidenav's profile pic dropdown -->

    <ul class="dropdown-content" id="dropdown">

    <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>

    </ul>
<!-- ********************Footer Area************************ -->
 <!-- Script For Displaying Post's Selected Image Before Uploading -->
 <script>
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        var sidebar = new StickySidebar('.sidebar', {resizeSensor: true});

    </script>
    <script type="text/javascript">
        //sending data to the datbase server without reffreshing the page using the ajax systemt
        function folRequest(){
            var sender_id = document.getElementById('from_user_id').value;
            var reciver_id =  document.getElementById('reciver_id').value'
            $.ajax({

            })
        }
    </script>
<?php require_once('../include/students/footer.php'); ?>