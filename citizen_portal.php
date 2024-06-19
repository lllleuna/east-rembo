<?php
error_reporting(0);
include('PAGES/citizen_auth.php');
require 'PAGES/config.php';
function upload($file, $file_name, $file_tmpname, $file_size, $file_error, $file_type) {

    $id = $_SESSION["logged_citizen"]['id_user'];
    $file_extn = explode('.', $file_name);
    $file_actual_extn = strtolower(end($file_extn));

    $allowed_type = array('jpg', 'jpeg', 'png');

    if (in_array($file_actual_extn, $allowed_type)) {
        
        if ($file_error === 0) {
            if ($file_size < 500000) {
                
                $new_filename = 'profile'.$id.'.'.$file_actual_extn;

                $file_destination = 'UPLOADS/'.$new_filename;
                move_uploaded_file($file_tmpname, $file_destination);
                require 'PAGES/config.php';
                $admin_result = mysqli_query($conn,"UPDATE profile SET status='0', filename='$new_filename' WHERE userid='$id'");
                

                header("Location: citizen_portal.php?uploadsuccess");

            } else {
                echo "<script>alert('Your file is too large!');</script>";
            }
        } else {
            echo "<script>alert('There was an error uploading your file!');</script>";
        }

    } else {
        echo "<script>alert('File type is not allowed!');</script>";
    }
}


// <!-- PROFILE UPLOAD IMAGE -->
if (isset($_POST['profile-submit'])) {
    $file = $_FILES['profile_img'];
    
    $file_name = $file['name'];
    $file_tmpname = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    upload($file, $file_name, $file_tmpname, $file_size, $file_error, $file_type);

} elseif (isset($_POST['delete-profileimg'])) {
    $id = $_SESSION["logged_citizen"]['id_user'];
    $delete = mysqli_query($conn,"UPDATE profile SET filename='default-profile.webp' WHERE userid='$id'");
}

if (isset($_POST['profileInfo-submit'])) {
    $idno = mysqli_real_escape_string($conn,$_POST["idno"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $mname = mysqli_real_escape_string($conn,$_POST["mname"]);
    $dis = mysqli_real_escape_string($conn,$_POST["dis"]);
    $pwdno = mysqli_real_escape_string($conn,$_POST["pwdno"]);
    $seniorno = mysqli_real_escape_string($conn,$_POST["seniorno"]);
    $house = mysqli_real_escape_string($conn,$_POST["house"]);
    $street = mysqli_real_escape_string($conn,$_POST["street"]);
    $brgy = mysqli_real_escape_string($conn,$_POST["brgy"]);
    $bday = mysqli_real_escape_string($conn,$_POST["bday"]);

    $name = $fname." ".$mname." ".$lname;

    $update_info = mysqli_query($conn,"UPDATE pwd_senior SET SURNAME='$lname', FIRSTNAME='$fname', MIDDLENAME='$mname', DISABILITY_TYPE='$dis', PWD_ID_NO='$pwdno', SENIOR_ID_NO='$seniorno', HOUSE_NO='$house', STREET='$street', BARANGAY='$brgy', BIRTHDAY='$bday' WHERE VALID_ID_NO='$idno'");

    $update_acc = mysqli_query($conn, "UPDATE citizen_account SET Name='$name' WHERE National_ID_no='$idno'");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/user.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Dashboard</title>
    <link rel="icon" href="Assets/east logo.png" type="image/icon type">
</head>
<body>
   


    <?php include('navbar.php');?> <!-- NAVIGATION BAR -->

    <div class="top">
        <br><br><br><br><br>
    </div>
    <!--  -->
    <?php
        $id_loggedin = $_SESSION["logged_citizen"]['id_user'];
        
        $sql_result = mysqli_query($conn, "SELECT * FROM citizen_account WHERE idCitizen_Account='$id_loggedin'");
        if (mysqli_num_rows($sql_result) > 0) {
            while ($row = mysqli_fetch_assoc($sql_result)) {
                $id = $row['idCitizen_Account'];
                $result_img = mysqli_query($conn, "SELECT * FROM profile WHERE userid='$id'");

                $rowimg = mysqli_fetch_assoc($result_img);

                echo "<div class='profile-btns'>";
                echo "<div class='admin-profile-img'><a class='edit-profile'href='#' >";
                    if ($rowimg['status'] == 0) {
                        $filename = $rowimg['filename'];
                        echo "<img id='pop-up-edit' src='UPLOADS/".$filename."?'".mt_rand().">";
                    } else {
                        echo "<img id='pop-up-edit' src='Assets/default-profile.webp'>";
                    }
                    echo "<p id='pop-up-editInfo'>".$row['Name']."<i class='fa-solid fa-pen'></i></p>";
                        
                echo "</a></div>";


                echo "<div class='btn-page'>
                        <h2> </h2>
                        <a href='hire.php'>Looking for Kasambahay</a> 
                    </div>
                        
                        "; 

                echo "</div>";

                echo "<div class='profileEdit-pop-up' id='profileEdit-pop-up'>";
                    echo "<div class='popup-content'>
                            <h2>Edit Profile Picture</h2> 
                            <form action='' method='POST' enctype='multipart/form-data'>
                                <div class='popup-sub-content'>
                                    <label for='file'>Profile Picture</label></br>
                                    <i class='fa-regular fa-image'></i>
                                    <input type='file' name='profile_img' id='inputTag'>
                                    <button type='submit' name='delete-profileimg'>Delete</button>
                        
                                </div>
                                <button id='closePopup'>Discard</button>
                                <button class='save-btn' type='submit' name='profile-submit'>Save</button>
                            </form>
                        </div>";

                echo "</div>";

                $id_nat = $row['ID_no']; // nationalid value edit can't be saved

                $citizen_info = mysqli_query($conn, "SELECT * FROM pwd_senior WHERE VALID_ID_NO='$id_nat' LIMIT 1");
                $row_show = mysqli_fetch_assoc($citizen_info);
                $dbfirst = $row_show['FIRSTNAME'];
                $dbmid = $row_show['MIDDLENAME'];
                $dblast = $row_show['SURNAME'];
                $dbbday = $row_show['BIRTHDAY'];
                $dbhouse = $row_show['HOUSE_NO'];
                $dbstreet = $row_show['STREET'];
                $dbbrgy = $row_show['BARANGAY'];
                

                echo "<div class='profileEdit-pop-up' id='profileInfo-pop-up'>";
                    echo "<div class='popup-content'>
                    <h2>Edit Your Information</h2> <br>
                        <form action='' method='POST' enctype='multipart/form-data'>
                            <div class='popup-sub-content'>
                                <div class='personal-info'>
                                        <div class='input-space'>
                                        <label for='idno'>National ID No.:</label>
                                        <input type='text' name='idno' value='$id_nat' id='idno' required><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='lname'>Last Name:</label>
                                        <input type='text' name='lname' value='$dblast' id='lname'><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='fname'>First Name:</label>
                                        <input type='text' name='fname' value='$dbfirst' id='fname'><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='mname'>Middle Name:</label>
                                        <input type='text' name='mname' value='$dbmid' id='mname'><br>
                                    </div>
                                    
                                    <div class='input-space'>
                                        <label for='house'>House No.:</label>
                                        <input type='text' name='house' value='$dbhouse' id='house'><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='street'>Street:</label>
                                        <input type='text' name='street' value='$dbstreet' id='street'><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='brgy'>Barangay:</label>
                                        <input type='text' name='brgy' value='$dbbrgy' id='brgy'><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='bday'>Birthday:</label>
                                        <input type='text' name='bday' value='$dbbday' id='bday' placeholder='dd/mm/yyyy'
                                                onfocus=\"(this.type='date')\" onblur=\"(this.type='text')\">
                                    <br>
                                    </div>
                                </div>
                    
                            </div>
                            <br>
                            <button id='closePopup'>Discard</button>
                            <button class='save-btn' type='submit' name='profileInfo-submit'>Save</button>
                        </form>
                    </div>";
                echo "</div>";
                
            }
        } else {
            // echo "THERE ARE NO USERS.";
        }

    ?>


    <!--  -->

    <br>

    
    <div class="calendar-header">
        <p>UPCOMING EVENTS</p>
        <hr>
    </div>

    <div class="body">
        <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
            <?php 
                $post_sql = mysqli_query($conn, "SELECT * FROM admin_post WHERE page_name='CITIZEN-DASH' ORDER BY idAdmin_Post DESC");
            
                if (mysqli_num_rows($post_sql) > 0) {
                    while ($image = mysqli_fetch_assoc($post_sql)) { ?>
            
                <li class="card">
                <div class="img-dash"><img src="ADMIN_UPLOADS/<?=$image['filename']?>" alt="img" draggable="false"></div>
                </li>

            <?php   }
                } ?>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
        </div>

    </div>

    <button class="btn-join" onclick="join()">
  <p class="text">Join Now!</p>
</button>


<div id="popupDiv-join" class="popup-join">
        <h3 id="mssg">Join Form</h3>
    <form action="" method='post' class='join_form' name='join_form' id='join_form'>
        <label for="">Name: </label>
        <input type="text" name="name_join" id="name_join" required><br>
        <label for="">Contact: </label>
        <input type="text" name="contact" id="contact" required><br>
        <label for="">Address: </label>
        <input type="text" name="add" id="add" required><br>
        <label>
            Remarks:
            <input type="radio" name="rem" value="PWD" required>
            PWD
        </label>

        <label>
            <input type="radio" name="rem" value="Senior Citizen" required>
            Senior Citizen
        </label><br>
        <label for="">Name of Event: </label>
        <input type="text" name="event_name" id="event_name" required><br><br>
        <button type="submit" name="join_event" id="join_event" >Join</button>
        <button onclick="closePopup()">Cancel</button>
    </form>
    </div>

    <?php 
        if (isset($_POST['join_event'])) {
            $name = $_POST['name_join'];
            $con = $_POST['contact'];
            $add = $_POST['add'];
            $rem = $_POST['rem'];
            $event_name = $_POST['event_name'];


            $add_joiner = mysqli_query($conn, "INSERT INTO event_participants(name, contact, address, remarks, event_name) VALUES('$name', '$con', '$add', '$rem', '$event_name') LIMIT 1");

            echo "<script> alert('JOINED SUCCESSFULLY!'); </script>";
        }
    ?>

    <script>
        function join() {
            document.getElementById('popupDiv-join').style.display = 'block';
        }

        function closePopup() {
        // Hide the popup
        document.getElementById('popupDiv-join').style.display = 'none';
        }
    </script>

    <br>


    <div class="calendar-header">
        <p>CALENDAR</p>
        <hr>
    </div>
    
    <div class="dashboard-timeline">
   <iframe src="https://calendar.google.com/calendar/embed?src=d14dfb62d4412635485e066dacf4d47caf22fbf8e8c850feeab7020f511817eb%40group.calendar.google.com&ctz=Asia%2FManila" style="border: 0" width="90%" height="600" frameborder="2px" scrolling="no"></iframe>
    </div>
    
    

    <script src="script/script_citizen.js"></script>
    <?php include('footer.php');?> <!-- FOOTER -->
</body>
</html>