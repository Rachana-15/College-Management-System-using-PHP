<?php require_once('../include/students/header.php'); ?>
<?php require_once('../include/students/sidenav.php'); ?>
    <nav class="brown darken-4">
        <a href="" class="brand-logo center">COLLEGE MANAGEMENT SYSTEM</a>
        <!-- sidenav trigger code, means picture showing in right sight header sidenav, for account info and logout -->
        <a href="" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
        <a href=""><img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "user.png";
                                    }
                                      ?>" class=" dropdown-trigger right responsive-img circle brand-logo " data-target="dropdown" alt="" style=" width: 40px; margin-top: 8px;margin-right: 8px;"></a>
    </nav>
    <div class="row mufazmi">
        <div class="col s12 m12 l3">
            <div class="card-panel z-depth-0" style="padding: 15px">
                <div class="card-image center">
                <img src="../img/<?php
                                    if (isset($image) && !empty($image)){
                                     echo $image;
                                    }
                                    else
                                    {
                                      echo "teacher.png";
                                    }
                                      ?>" alt="" class="responsive-img circle" style="width: 120px; border: 3px solid gray;" alt="">
                    <h5 class="center"><?php echo $name ?></h5>
                    <div class="divider"></div>
                    <table >
                        <thead>
                            <tr>
                                <th>Enrollment No.</th>
                                <td class="blue-text">12020002017044</td>
                            </tr>
                            <tr>
                                <th>Courses</th>
                                <td class="blue-text">Batchlor of Technology</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td class="blue-text">Computer Science and Engineering (IOT CSBT)</td>
                            </tr>
                            <tr>
                                <th>Roll Number</th>
                                <td class="blue-text"><?php echo $rollno ?></td>
                            </tr>
                            <tr>
                                <th>class</th>
                                <td class="blue-text"><?php echo $standerd; ?></td>
                            </tr>
                            <tr>
                                <th>Section</th>
                                <td class="blue-text">A</td>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l9">
            <div class="card z-depth-0">
                <ul class="tabs">
                    <li class="tab"><a href="#profile" class="">Profile</a></li>
                    <li class="tab"><a href="#fees" class="">Fees</a></li>
                    <li class="tab"><a href="#exam" class="">Exam</a></li>
                    <li class="tab"><a href="#document" class="">Document</a></li>
                </ul>
                <div id="profile" class="col s12 white " >
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <table >
                                <tbody>  
                                    <tr>
                                        <th>Date Of Birth</th>
                                        <td>15/11/2001</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>
                                            General  
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Mobile Number</th>
                                        <td><?php echo $contact; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Religion</th>
                                        <td>Hindu</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $email; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card"  style="padding-left:10px; padding-right: 10px; ">
                            <div class="left">
                                <h5>Address</h5>
                            </div>
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Current Address</th>
                                        <td>Salt Lake, Kolkata -700091 </td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address</th>
                                        <td>Gola Road, Patna India-800012</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        </div>
                <div id="fees" class="col s12">Please wait, Will get updated soon!</div>
                <div id="exam" class="col s12">Please wait, Will get updated soon!</div>
                <div id="document" class="col s12">will be included soon!</div> 
            
            </div>
        </div>
    </div>

    <!-- right sidenav's profile pic dropdown -->

    <ul class="dropdown-content" id="dropdown">
       
    <li><a href="../include/students/logout.php"><i class="material-icons">logout</i>Logout</a></li>
       
    </ul>

<!-- ********************Footer Area************************ -->
<?php require_once('../include/students/footer.php'); ?>