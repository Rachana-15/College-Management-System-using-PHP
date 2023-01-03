<?php
require_once('../include/dbcon.php');
require_once('../include/header.php');

?>
  
<?php
 if(isset($_POST['search'])){

    $standerd = $_POST['standerd'];
    $name = $_POST['name'];

    $query = "select * from students where `standerd` = '$standerd' and `name` LIKE '%$name%'";
    $run = mysqli_query($con,$query);
    $row = mysqli_num_rows($run);
    if($row < 1)
    {
        echo "<script> alert('No Student Found')</script>";
    }
    else{
      
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
            <form action="" method="POST">
            <div class="card-panel">
              <div class="row">
                <div class="col l4">
                  <div class="input-field">
                      <select name="standerd">
                          <option value="">Choose Standerd </option>
                          <option value="1">Btech</option>
                            <option value="2">BBA</option>
                            <option value="3">BCA</option>
                            <option value="4">MBA</option>
                            <option value="5">MCA</option>
                            <option value="6">Mtech</option>                                
                  </select>
                </div>
              </div>
              <div class="col l5">
                <div class="input-field">
                  <input type="text" name="name" id="name">
                  <label for="name">Enter Student Name</label>
                </div>
              </div>
              <div class="col l3">
                  <div class="">
                      <button class="btn" name="search">Search Student</button>
                  </div>
                </div>
            </div>
          </div>
        </form>
        </div>
      </div>


        <div class="row main">
            <div class="col l12">
                <div class="card">
                    <ul class="collection">
                        <li class="collection-item">
                        <table class="striped">
                            <tr class="cyan lighten-2 z-depth-1">
                                <th>Sr. No</th>
                                <th>Student Image</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Standerd</th>
                                <th>Gender</th>
                                <th>City</th>
                                <th>Contact</th>
                            </tr>
                            
                                <?php
                                $count=0;
                                    while($data = mysqli_fetch_assoc($run)){
                                            $count++;
                                            $image = $data['image'];
                                            $name = $data['name'];
                                            $rollno = $data['rollno'];
                                            $standerd = $data['standerd'];
                                            $gender = $data['gender'];
                                            $city  = $data['city'];
                                            $contact = $data['contact'];
                                            
                                    
                                ?><tr>
                                    <td> <?php echo $count; ?> </td>
                                    <td> <img src="images/<?php echo $image; ?>" class="responsive-img circle" style="width: 100px;"> </td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $rollno; ?></td>
                                    <td><?php echo $standerd; ?></td>
                                    <td><?php echo $gender; ?></td>
                                    <td><?php echo $contact; ?></td>
                                    <td><?php echo $city; ?></td>
                                    </tr>
                                <?php } ?>
                            
                        </table>
                    </li>
                    </ul>
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