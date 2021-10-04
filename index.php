<?php include('src/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DAS : Home</title>
    <?php include('src/head.php') ?>
  
</head>

<body>

    <?php include('src/preload.php') ?>
   
    <?php include('src/header.php') ?>


    
    <?php include('src/slider.php') ?>
   
    <?php if (isset($_SESSION['log']) == "" or $_SESSION['log1'] == "client") {
        if (isset($_POST['ok'])) {
            if (isset($_SESSION['log']) == "") {
                echo '
                <script>
                  alert("Sign in First");
                  window.location.href = "signin.php";
                </script>
                ';
            } else {
                $id = $_SESSION['log']['Id'];
                $type = $_POST['type'];
                if ($type == 'test') {
                    $test = $_POST['test'];
                    $appdate = $_POST['appdate1'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime1']));
                    $qry = mysqli_query($con, "INSERT INTO test_appointment (Test_id,Test_time,Test_date,Users_id,Report) VALUES ('$test','$apptime','$appdate','$id','')");
                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Sucessfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Appointment set Unsucessful RETRY!");
                        </script>
                        ';
                    }
                } else if ($type == 'doctor') {
                    $name = $_SESSION['log']['Name'];
                    $doc = $_POST['docname'];
                    $appdate = $_POST['appdate'];
                    $apptime = date('H:i:s', strtotime($_POST['apptime']));
                    $qry = mysqli_query($con, "INSERT INTO doctor_app (Doctor_id,App_date,App_time,Users_id,Report,Status) VALUES ('$doc','$appdate','$apptime','$id','','Accepted')");
                    if ($qry) {
                        echo '
                        <script>
                        alert("Appointment set Sucessfully");
                        window.location.href = "appointments.php";
                        </script>
                        ';
                    } else {
                        // echo "Error: " . mysqli_error($con);
                        echo '
                        <script>
                        alert("Appointment set Unsucessful RETRY!");
                        </script>
                        ';
                    }
                }
            }
        }
    ?>
        <section id="topFeature">
            <div class="row" >
        
                <!-- <div class="col-lg-4 col-md-4" style="align:right; width:50%";>
                    <div class="row">
                        <div class="single-top-feature">
                            <span class="fa fa-flask"></span>
                            <h3>Emergency Care</h3>
                            <p>In cases of Emergency here are some Information.</p>
                            <div class="readmore_area">
                                <a data-hover="Read More" data-target="#yModal" href="#"><span>Read More</span></a>
                            </div>
                            <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="yModal" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                                &times;
                                            </button>
                                        </div>
                                    </div>
                                </div>            
                        </div>
                    </div>
                </div> -->
            
                <!-- <div class="col-lg-4 col-md-4">
                    <div class="row">
                        <div class="single-top-feature opening-hours">
                            <span class="fa fa-clock-o"></span>
                            <h3>Opening Hours</h3>
                            <p>Open All seven days of the week.</p>
                            <ul class="opening-table">
                                <li>
                                    <span>Monday - Friday</span>
                                    <div class="value">8.00 - 18.00</div>
                                </li>
                                <li>
                                    <span>Saturday</span>
                                    <div class="value">9.30 - 15.30</div>
                                </li>
                                <li>
                                    <span>Sunday</span>
                                    <div class="value">9.30 - 17.00</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-4 col-md-4"  style="width:50%" ;>
                    <div class="row">
                        <div class="single-top-feature">
                            <span class="fa fa-ambulance"></span>
                            <h3>Emergency</h3>
                            <p>In case Of Emergency here are </br>some Information</p>
                            <div class="readmore_area">
                                <a data-hover="Read More" data-target="#yModal" data-toggle="modal" href="#">
                                    <span>Emergency Info</span>
                                </a>
                            </div>
                            
                            <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="yModal" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                 <div class="modal-content">    
                                        <div class="modal-header">
                                            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"> Some Emergency Contact Numbers:</h4>
                                    
                                        </div>
                                        <div class="row">
                                            <table class="table table-hover">
                                            <tr>
                                                <th>City</th>
                                                <th>Ambulance</th>
                                                <th>BloodBank</th>
                                            </tr>
                                            <tr>
                                                <td>Kathmandu</td>
                                                <td>9843274865</td>
                                                <td>01-44123030, 01-4410911</td>
                                            </tr>
                                            <tr>
                                                <td>Bhaktapur</td>
                                                <td>9860025333</td>
                                                <td>01-6611661, 01-6612266</td>
                                            </tr>
                                            <tr>
                                                <td>lalitpur</td>
                                                <td>9860025333</td>
                                                <td>01-6611661, 01-6612266</td>
                                            </tr>
                                            <tr>
                                                <td>Pokhara</td>
                                                <td>9860025333</td>
                                                <td>01-6611661, 01-6612266</td>
                                            </tr>
                                            <tr>
                                                <td>Jhapa</td>
                                                <td>9860025333</td>
                                                <td>01-6611661, 01-6612266</td>
                                            </tr>
                                        
                                            </table>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            
               
                <div class="col-lg-4 col-md-4"  style=" width:50%";>
                    <div class="row">
                        <div class="single-top-feature">
                            <span class="fa fa-hospital-o"></span>
                            <h3>Appointment</h3>
                            <p>Now booking an appointment is just a click away so just click on the button below and start
                                booking appointments straight away.</p>
                            <div class="readmore_area">
                                <a data-hover="Appoinment" data-target="#myModal" data-toggle="modal" href="#">
                                    <span>Appoinment</span>
                                </a>
                            </div>
                            
                            <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel"> Test Appoinment Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="appointment-area">
                                                <form class="appointment-form" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Date <span class="required">*</span>
                                                            </label>
                                                            <input type="Date" class="wp-form-control wpcf7-text" placeholder="mm/dd/yy" name="appdate1" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Time <span class="required">*</span>
                                                            </label>
                                                            <input type="time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime1" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Select Test <span class="required">*</span>
                                                            </label>
                                                            <?php $sql = mysqli_query($con, "SELECT * FROM test") ?>
                                                            <select class="wp-form-control wpcf7-select" name="test" required>
                                                                <?php while ($row = mysqli_fetch_array($sql)) { ?>
                                                                    <option value="<?= $row['id']; ?>"><?= $row['test_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" value="test">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Book Appointment</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">Doctor Appoinment Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="appointment-area">
                                            <form class="appointment-form" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Date <span class="required">*</span>
                                                            </label>
                                                            <input type="date" class="wp-form-control wpcf7-text" placeholder="dd/mm/yy" name="appdate" min="<?= date("Y-m-d"); ?>" max="<?= date("Y-m+1-d"); ?>" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Appointment Time <span class="required">*</span>
                                                            </label>
                                                            <input type="Time" class="wp-form-control wpcf7-text" placeholder="hh:mm" name="apptime" required>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label class="control-label">Select Doctor <span class="required">*</span>
                                                            </label>
                                                            <?php $sql1 = mysqli_query($con, "SELECT * FROM doctor"); ?>
                                                            <select class="wp-form-control wpcf7-select" name="docname" required>
                                                                <?php while ($row1 = mysqli_fetch_array($sql1)) { ?>
                                                                    <option value="<?= $row1['Id'] ?>"><?= $row1['Name']  ?>---<?= $row1['Category'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="type" value="doctor">
                                                    <button class="wpcf7-submit button--itzel" name="ok" type="submit">
                                                        <i class="button__icon fa fa-share"></i><span>Book Appointment</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
          
        </section>
    <?php } ?>
   
    <?php include('src/services.php') ?>
    
    <?php include('src/whychoose.php') ?>
    

    <?php include('src/testimony.php') ?>
    


    <?php include('src/footer.php') ?>


    <?php include('src/incfooter.php') ?>
</body>

</html>
