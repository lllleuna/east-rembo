<?php  // OLD VERSION PAGE OLD VERSION PAGE OLD VERSION PAGE
// error_reporting(0);
require 'PAGES/config.php';
include('PAGES/authentication.php');

function upload($radio, $file, $file_name, $file_tmpname, $file_size, $file_error, $file_type) {
    
    require 'PAGES/config.php';

    $id = $_SESSION["logged_admin"]['id_user'];
    $file_extn = explode('.', $file_name);
    $file_actual_extn = strtolower(end($file_extn));

    $allowed_type = array('jpg', 'jpeg', 'png');

    if (in_array($file_actual_extn, $allowed_type)) {
        
        if ($file_error === 0) {
            if ($file_size < 2000000) {
                
                if ($file == $_FILES['profile_img']) {
                    $new_filename = 'profile'.$id.'.'.$file_actual_extn;

                    $file_destination = 'ADMIN_UPLOADS/'.$new_filename;
                    move_uploaded_file($file_tmpname, $file_destination);
                    $admin_result = mysqli_query($conn,"UPDATE profile SET status='0', filename='$new_filename' WHERE userid='$id'");
                
                    header("Location: admin_portal.php?uploadsuccess");
                    
                } else{

                    $page = $file;

                    switch ($page) {
                        case $_FILES['dash_program_img']:
                            $page_name = "CITIZEN-DASH";
                            $re_cat = 'remarks';
                            break;
                        case $_FILES['prog_program_img']:
                            $page_name = "PROGRAMS";
                            $re_cat = 'remarks';
                            break;
                        default:
                            $page_name = "NONE";
                            $re_cat = 'NONE';
                    }

                    $new_filename = 'event_poster'.uniqid('', true).'.'.$file_actual_extn;

                    $file_destination = 'ADMIN_UPLOADS/'.$new_filename;
                    move_uploaded_file($file_tmpname, $file_destination);
                    $admin_post = mysqli_query($conn, "INSERT INTO admin_post(idAdmin, page_name, $re_cat, filename) VALUES('$id', '$page_name', '$radio', '$new_filename') LIMIT 1");
                    header("Location: admin_portal.php?uploadsuccess");
                   
                }


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


// <!-- DASHBOARD POSTING UPLOAD IMAGE -->
if (isset($_POST['dashboard-submit'])) {
    $file = $_FILES['dash_program_img'];
    
    $file_name = $file['name'];
    $file_tmpname = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    $radio = $_POST['remarks-dash'];
    upload($radio, $file, $file_name, $file_tmpname, $file_size, $file_error, $file_type);

}


// <!-- PROGRAMS POSTING UPLOAD IMAGE -->
if (isset($_POST['program-submit'])) {
    $file = $_FILES['prog_program_img'];
    
    $file_name = $file['name'];
    $file_tmpname = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    $radio = $_POST['remarks-prog'];
    upload($radio, $file, $file_name, $file_tmpname, $file_size, $file_error, $file_type);

}


// <!-- PROFILE UPLOAD AND DELETE IMAGE -->
if (isset($_POST['profile-submit'])) {
    $file = $_FILES['profile_img'];
    
    $file_name = $file['name'];
    $file_tmpname = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];
    $radio = $_POST['remarks-dash'];
    upload($radio, $file, $file_name, $file_tmpname, $file_size, $file_error, $file_type);

} elseif (isset($_POST['delete-profileimg'])) {
    $id = $_SESSION["logged_admin"]['id_user'];
    $delete = mysqli_query($conn,"UPDATE profile SET filename='default-profile.webp' WHERE userid='$id'");
}
// <!-- PROFILE UPLOAD AND DELETE IMAGE -->

if (isset($_POST['profileInfo-submit'])) {
    $idno = mysqli_real_escape_string($conn,$_POST["idno"]);
    $lname = mysqli_real_escape_string($conn,$_POST["lname"]);
    $fname = mysqli_real_escape_string($conn,$_POST["fname"]);
    $mname = mysqli_real_escape_string($conn,$_POST["mname"]);
    $house = mysqli_real_escape_string($conn,$_POST["house"]);
    $street = mysqli_real_escape_string($conn,$_POST["street"]);
    $brgy = mysqli_real_escape_string($conn,$_POST["brgy"]);
    $bday = mysqli_real_escape_string($conn,$_POST["bday"]);

    $name = $fname." ".$mname." ".$lname; 
    $home_add = $house." ".$street." ".$brgy;

    $update_info = mysqli_query($conn,"UPDATE admin SET First_name='$fname', Middle_name='$mname', Last_name='$lname', Birthday='$bday', Home_Address='$home_add' WHERE National_ID_no='$idno'");

    $update_acc = mysqli_query($conn, "UPDATE admin_account SET Name='$name' WHERE National_ID_no='$idno'");
      
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
<body >

    <?php include('navbar.php');?> <!-- NAVIGATION BAR -->

    <!-- <div class="top"></div> -->
    <!-- PROFILE IMAGE -->
    <?php

        $id_loggedin = $_SESSION["logged_admin"]['id_user'];
        $sql_result = mysqli_query($conn, "SELECT * FROM admin_account WHERE idAdmin_Account='$id_loggedin'");
        if (mysqli_num_rows($sql_result) > 0) {
            while ($row = mysqli_fetch_assoc($sql_result)) {
                $id = $row['idAdmin_Account'];
                $result_img = mysqli_query($conn, "SELECT * FROM profile WHERE userid='$id'");

                $rowimg = mysqli_fetch_assoc($result_img);
                
                
                echo "<div class='profile-btns'>";

                echo "<div class='admin-profile-img'><a class='edit-profile'href='#' >";
                    if ($rowimg['status'] == 0) {
                        $filename = $rowimg['filename'];
                        echo "<div class='imgcont'>
                                <div class='cont'>";
                        echo "<img id='pop-up-edit' src='ADMIN_UPLOADS/".$filename."?'".mt_rand().">";
                        echo " </div>
                            </div>";
                    } else {
                        echo "<img id='pop-up-edit' src='Assets/default-profile.webp'>";
                    }
                    echo "<p id='pop-up-editInfo'>".$row['Name']."<i class='fa-solid fa-pen'></i></p>";
                        
                    
                echo "</a></div>";
                

                echo "<div class='btn-page'>
                            <button id='reg' class='page-btn btn-see'>Registered Citizen</button>
                            <button id='seeker' class='page-btn btn-see'>Job Seeker</button>
                            <button id='view' class='page-btn btn-see'>View as Citizen</button>
                            <button id='parti' class='page-btn btn-see'>Event Participants</button>
                        </div>
                        
                        <script>
                        document.getElementById('reg').addEventListener('click', function() {
                            window.location.href = 'exportDB.php'; });
                        document.getElementById('seeker').addEventListener('click', function() {
                            window.location.href = 'job/seeker.php'; });
                        document.getElementById('view').addEventListener('click', function() {
                            window.location.href = 'citizen_portal.php'; });
                            document.getElementById('parti').addEventListener('click', function() {
                                window.location.href = 'export_e_participants.php'; });
                        </script>
                        
                        "; 

                echo "</div>";

                echo "<hr class='border'>";

                echo "<div class='profileEdit-pop-up' id='profileEdit-pop-up'>";
                    echo "<div class='popup-content'>
                            <h2>Edit Profile</h2>
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

                $id_nat = $row['National_ID_no']; // nationalid value edit can't be saved

                $admin_info = mysqli_query($conn, "SELECT * FROM admin WHERE National_ID_no='$id_nat' LIMIT 1");
                $row_show = mysqli_fetch_assoc($admin_info);
                $dbfirst = $row_show['First_name'];
                $dbmid = $row_show['Middle_name'];
                $dblast = $row_show['Last_name'];
                $dbbday = $row_show['Birthday'];
                $dbhome = $row_show['Home_Address'];

                echo "<div class='profileEdit-pop-up' id='profileInfo-pop-up'>";
                    echo "<div class='popup-content'>
                    <h2>Edit Profile Info</h2> <br/>
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
                                        <label for='house'>Home Add:</label>
                                        <input type='text' name='house' value='$dbhome' id='house'><br>
                                    </div>
                                    <div class='input-space'>
                                        <label for='bday'>Birthday:</label>
                                        <input value='$dbbday' type='text' name='bday' id='bday' placeholder='dd/mm/yyyy'
                                                onfocus=\"(this.type='date')\" onblur=\"(this.type='text')\">
                                    <br>
                                    </div>
                                    
                                </div>
                    
                            </div>
                            <br/>
                            <button id='closePopup'>Discard</button>
                            <button class='save-btn' type='submit' name='profileInfo-submit'>Save</button>
                        </form>
                    </div>";
                echo "</div>";
            }
        } else {
            echo "THERE ARE NO USERS.";
        }

    ?>

    <script>
        document.getElementById('pop-up-edit').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior (navigating to a new page)
            document.getElementById('profileEdit-pop-up').style.display = 'block'; // Display the popup
        });

        document.getElementById('pop-up-editInfo').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior (navigating to a new page)
            document.getElementById('profileInfo-pop-up').style.display = 'block'; // Display the popup
        });

        document.getElementById('closePopup').addEventListener('click', function() {
            document.getElementById('profileEdit-pop-up').style.display = 'none'; // Hide the popup when close button is clicked
            document.getElementById('profileInfo-pop-up').style.display = 'none';
        });

    </script>
    <!-- PROFILE IMAGE -->

    <div class="calendar-header">
        <p>IMAGE POSTING</p>
        <hr>
    </div>
    <!-- DASHBOARD UPLOAD -->
    <div class="uploads_cont">
        <div class="upload_block">
            <h1>DASHBOARD</h1>
            <form  class="file-upload-form" method="POST" enctype="multipart/form-data">
            <label for="file_dash" class="file-upload-label">
            <div class="radio-buttons-container">
                <div class="radio-button">
                <input name="remarks-dash" id="radiodash1" value="PWD" class="radio-button__input" type="radio" checked>
                <label for="radiodash1" class="radio-button__label">
                    <span class="radio-button__custom"></span>PWD
                </label>
                </div>
                <div class="radio-button">
                <input name="remarks-dash" id="radiodash2" value="Senior Citizen" class="radio-button__input" type="radio" >
                <label for="radiodash2" class="radio-button__label">
                    <span class="radio-button__custom"></span>Senior Citizen
                </label>
                </div>
                <div class="radio-button">
                <input name="remarks-dash" id="radiodash3" value="Both" class="radio-button__input" type="radio">
                <label for="radiodash3" class="radio-button__label">
                    <span class="radio-button__custom"></span>Both
                </label>
                </div>
            </div>
                <div class="file-upload-design">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p>Upload Image</p>
                <span class="browse-button">Browse file</span>
                </div>
                <input id="file_dash" type="file" name="dash_program_img"/>
                <span class="file-name" id="file-name"></span> <br>
                <button class="dashboard-submit" type="submit" name="dashboard-submit">Upload</button>
            </label>
            </form>
        </div>

        <script>
            document.getElementById('file_dash').addEventListener('change', function() {
                const fileName = 'File Name: ' + this.files[0].name;
                document.getElementById('file-name').textContent = fileName;
            });

        </script>     
    <!-- DASHBOARD UPLOAD -->


    <!-- PROGRAMS UPLOAD -->
    <div class="upload_block">
            <h1>PROGRAMS</h1>
            <form  class="file-upload-form" method="POST" enctype="multipart/form-data">
            <label for="file_prog" class="file-upload-label">
            <div class="radio-buttons-container">
                <div class="radio-button">
                <input name="remarks-prog" id="radioup1" value="PWD" class="radio-button__input" type="radio" checked>
                <label for="radioup1" class="radio-button__label">
                    <span class="radio-button__custom"></span>PWD
                </label>
                </div>
                <div class="radio-button">
                <input name="remarks-prog" id="radioup2" value="Senior Citizen" class="radio-button__input" type="radio" >
                <label for="radioup2" class="radio-button__label">
                    <span class="radio-button__custom"></span>Senior Citizen
                </label>
                </div>
                <div class="radio-button">
                <input name="remarks-prog" id="radioup3" value="Both" class="radio-button__input" type="radio">
                <label for="radioup3" class="radio-button__label">
                    <span class="radio-button__custom"></span>Both
                </label>
                </div>
            </div>
                <div class="file-upload-design">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <p>Upload Image</p>
                <span class="browse-button">Browse file</span>
                </div>
                <input id="file_prog" type="file" name="prog_program_img"/>
                <span class="file-name" id="file-name-prog"></span> <br>
                <button class="dashboard-submit" type="submit" name="program-submit">Upload</button>
            </label>
            </form>
        </div>
        
        <script>
            document.getElementById('file_prog').addEventListener('change', function() {
                const fileName = 'File Name: ' + this.files[0].name;
                document.getElementById('file-name-prog').textContent = fileName;
            });

        </script>



    </div>

    <div class="calendar-header">
        <p>SET DATE OF EVENT</p>
        <hr>
    </div>

    <div class="dashboard-timeline" >
   <iframe src="https://calendar.google.com/calendar/embed?src=d14dfb62d4412635485e066dacf4d47caf22fbf8e8c850feeab7020f511817eb%40group.calendar.google.com&ctz=Asia%2FManila" style="border: 0" width="90%" height="600" frameborder="2px" scrolling="no"></iframe>
    </div>


    

    <?php include('footer.php');?> <!-- FOOTER -->

</body>
</html>