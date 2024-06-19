<?php
require '../PAGES/config.php';

if (!isset($_SESSION["seeker-login"])) {
    echo
        "<script> alert('Register or Login first to apply.'); 
        window.location.href = '../PAGES/login.php';
        
        </script>";  
}

if (isset($_POST['submit'])) {
    $idSeeker = $_SESSION["logged_seeker"]['id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $name = $fname." ".$lname;
    $bday = $_POST['bday'];
    $pnum = $_POST['pnum'];
    $email = $_POST['email'];
    $add = $_POST['add'];
    $role = $_POST['role'];

    $file = $_FILES['fileUpload'];
    
    $file_name = $file['name'];
    $file_tmpname = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];

    $file_extn = explode('.', $file_name);
    $file_actual_extn = strtolower(end($file_extn));

    $allowed_type = array('jpg', 'jpeg', 'pdf', 'docx');

    if (in_array($file_actual_extn, $allowed_type)) {
        
        if ($file_error === 0) {
            if ($file_size < 5000000) {
                
                $check_sql = mysqli_query($conn, "SELECT * FROM application WHERE idSeeker='$idSeeker' AND Role='$role' LIMIT 1");
                if (mysqli_num_rows($check_sql) > 0) {
                    echo "<script> alert('You already applied the same role.') </script>";
                } else {
                    $timestamp = time();
                    $new_filename = $lname."_".$fname.$timestamp.'.'.$file_actual_extn;

                    $file_destination = '../RESUME/'.$new_filename;
                    move_uploaded_file($file_tmpname, $file_destination);
                    $apply_query = mysqli_query($conn, "INSERT INTO Application(Name, idSeeker, Bday, Phone_no, Email, Address, Role,  Filename, status_of_application) VALUES('$name', '$idSeeker', '$bday', '$pnum', '$email', '$add', '$role', '$new_filename', 'Not Yet Reviewed') LIMIT 1");
                    
                    echo "<script>alert('Application Successful!');
                    
                    window.location.href = '../js_portal.php';</script>";
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script type="text/javascript" href="jquery.js"></script> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Form</title>

    <style>
        .form {
        margin:auto;
        max-width: 500px;
        width: 100%;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0px 0px 0px 4px rgba(52, 52, 53, 0.185);
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        }

        .title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 20px;
        color: #1a202c;
        }

        .label {
        color: rgb(0, 0, 0);
        margin-bottom: 4px;
        }

        .input {
        padding: 10px;
        margin-bottom: 20px;
        width: 95%;
        font-size: 1rem;
        color: #4a5568;
        outline: none;
        border: 1px solid transparent;
        border-radius: 4px;
        transition: all 0.2s ease-in-out;
        }

        .input:focus {
        background-color: #fff;
        box-shadow: 0 0 0 2px #cbd5e0;
        }

        .input:valid {
        border: 1px solid green;
        }

        .input:invalid {
        border: 1px solid rgba(14, 14, 14, 0.205);
        }

        .submit {
        background-color: #1a202c;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        }

        select {
            height: 50px;
            margin-bottom: 30px;
            margin-top: 10px;
        }
            
    
    </style>
</head>
<body>
    <form class="form" action="" method="post" enctype="multipart/form-data">
        
        <span class="title">Application Form</span>

            <label class="label">First Name</label>
            <input class="input" type="text" name="fname" id="fname" required>
            <label class="label">Last Name</label>
            <input class="input" type="text" name="lname" id="lname" required>
        
            <label class="label">Birthday </label>
            <input class="input" type="text" name="bday" id="bday" class="input" placeholder="dd/mm/yyyy"
                    onfocus="(this.type='date')" onblur="(this.type='text')" required>
        
        
            <label class="label">Phone Number</label>
            <input class="input" type="number" name="pnum" id="pnum" required>
        
            <label class="label">Email</label>
            <input class="input" type="email" name="email" id="email" required>
        
            <label class="label">Address</label>
            <input class="input" type="text" name="add" id="add" required>
        
            <label class="label" for="fileUpload">Resume</label>
            <input class="input" type="file" id="fileUpload" name="fileUpload" required>
        
            <label class="label" for="fileUpload">Applying For</label>
            
            <select name='role' id='role'>  
                <option value="">Job Tittle</option>  
                <option value="Hardinero" required>Hardinero</option>  
                <option value="Yaya" required>Yaya</option>  
                <option value="Taga-luto" required>Taga-luto</option>  
                <option value="Taga-laba" required>Taga-laba</option> 
                <option value="All-arround" required>All-arround</option> 
            </select>
            
        
        <button class="submit" class="button-submit" name="submit" id="submit">Submit</button>
    </form>
</body>
</html>