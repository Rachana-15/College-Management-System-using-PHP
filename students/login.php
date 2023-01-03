<?php
require_once('../include/login_header.php');
?>
<?php

    require_once('../include/dbcon.php');

    if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = htmlentities(mysqli_real_escape_string($con,$email));
    $password = htmlentities(mysqli_real_escape_string($con,$password));

    $query = "SELECT * FROM `students` WHERE `email` = '$email' and `password` = '$password' ";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        $_SESSION['login_failed'] = "Username Or Password Wrong";
        $login_failed = $_SESSION['login_failed'];
    }
    else{
        $data = mysqli_fetch_assoc($run);
        $student_name = $data['name'];
        $student_id = $data['id'];
        $_SESSION['student_name'] = $student_name;
        $_SESSION['student_id'] = $student_id;
        header("location:index.php");
    }
}
?>s
<?php
if(isset($_SESSION['student_id']))
{
header("location:index.php");
}
else{
  
}

?>
  <body style="background-image:url(../images/sms_bg.jpg); background-size: cover;">
    <div class="row"style="margin-top:10%; opacity: 0.8;">
        <div class="col l4 offset-l4 m6 offset-m3 s12">
            <form action="" method="POST">
                    <div class="card-panel" style="border-radius: 15px;">
                            <div class="card-content">
                                <h5 class="<?php if(isset($login_failed)) { echo "hide";} ?>" >Login Form</h5>
                            </div>
                                                            <span class="card-title container">
              <h5 class="center red-text"><?php 
              
                if(isset($login_failed)){
                  echo $login_failed; 
                }
                

              ?> </h5>
            </span>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    person
                                </i>
                                <input type="text" name="email" id="email" value="rachanasingh4888@gmail.com" required="required">
                                <label for="email">Enter Your Email Address</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">
                                    lock
                                </i>                    
                                <input type="password" name="password" value="rachana" id="password" required="required">
                                <label for="password">Enter Your Password</label>
                            </div>
                            <div class="">
                            <input type="checkbox" name="checkbox" id="checkbox">
                            <label for="checkbox">Remember Me!</label>
                        </div>
                        <br>
                            <div>
                            <button type="submit" name="login" class="btn" style="width: 100%; border-radius: 15px;">Login</button>
                        </div>
                        </div>
            </form>
        </div>
    </div>
  
                    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>