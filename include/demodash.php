
<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
    <!-- Dropify File Upload -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="../dist/css/demo.css"> -->
    <link rel="stylesheet" href="../dist/css/dropify.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        header, .main, footer {
          padding-left: 300px;
        }
    
        @media only screen and (max-width : 992px) {
          header, .main, footer {
            padding-left: 0;
          }
        }
    </style>
    
  </head>
  <body>
  <?php
    session_start();
  ?>

  <!-- Session Checking -->
<?php
if(isset($_SESSION['uid']))
{

}
else{
  header("location:../login.php");
}

?>




<!-- ************************************************Dashboard Area************************************************ -->



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
            <a href="" class="brand-logo center">Social Learnia</a>
            <a href="#sidenav" class="button-collapse show-on-large" data-target="slide-out"><i class="material-icons">menu</i></a>
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

<!-- ********************Footer Area********************** -->

   <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<!-- Compiled and minified JavaScript -->  
<script src="../dist/js/dropify.min.js"></script>
        <script>
            $(document).ready(function(){
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove:  'Supprimer',
                        error:   'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
                });

                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });

                drEvent.on('dropify.errors', function(event, element){
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e){
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
<script>
 $(document).ready(function(){
 $('.button-collapse').sidenav();
 $('select').material_select();
 $('.collapsible').collapsible();
 $('.tooltipped').tooltip({delay: 50});
 $('.dropdown-trigger').dropdown();
 
});
</script>

</body>
</html>