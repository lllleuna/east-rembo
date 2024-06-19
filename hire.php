<?php require 'PAGES/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="job/css.css">
    <link rel="stylesheet" href="css/data.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker</title>
</head>
<body>

<a href="citizen_portal.php"> <button type="button" name="button">Dashboard</button></a>
<hr>
<center><h1 style="color:#1e5892;">HIRE A KASAMBAHAY</h1></center>
<!-- <h1>Kasambahay you can Hire</h1> -->
<div class="table-wrapper">
    <table border = 1 class="fl-table">
        <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>PHONE NO.</th>
            <th>EMAIL</th>
            <th>JOB TITLE</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM application WHERE status_of_application='ACCEPTED'");
        foreach($rows as $row) :
        ?>
        <tr>
            <?php 
                $idapply=$row["idapply"];
                $idSeeker=$row["idSeeker"];
            ?>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $name=$row["Name"]; ?> </td>
            <td> <?php echo $contact=$row["Phone_no"]; ?> </td>
            <td> <a href=""><?php echo $row["Email"]; ?></a> </td>
            <td> <?php echo $role=$row["Role"]; ?> </td>
            <td> <?php echo $hiring_status=$row["hiring_status"]; ?> </td>
            <td>
                <button onclick="confirm_hire('<?php echo $name; ?>', '<?php echo $role; ?>', '<?php echo $contact; ?>', '<?php echo $idapply; ?>', '<?php echo $idSeeker; ?>')">Hire</button>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Popup div -->
    <div id="popupDiv" class="popup">
        <!-- <p id='confirm_mssg'>Are you sure you want to hire </p> -->

        <h3>Job Details</h3>
        <form action="" method="post">
            <div class="job_details">
                <h4>Kasambahay Info</h4>
                <label for="" id="nm" name="nm">Name: </label><br><br>
                <input type="text" name="ka_name" id="ka_name" style="display: none;">
                <input type="text" name="idapply" id="idapply" style="display: none;">
                <input type="text" name="job_role" id="job_role" style="display: none;">
                <input type="text" name="id_Seeker" id="id_Seeker" style="display: none;">
                <label for="" id="cn" name="cn">Contact: </label><br><br>
                <label for="" id="ro" name="ro">Role: </label>
            </div>
            <div class="job_details">
                <h4>Employer Info</h4>
                <label for="">Name:</label>
                <input type="text" id="em_name" name="em_name" required><br><br>
                <label for="">Contact:</label>
                <input type="text" id="em_con" name="em_con" required><br><br>
                <label for="">Place:</label>
                <input type="text" id="place" name="place" required><br><br>
                <label for="">Date:</label>
                <input type="text" name="date" id="date" class="input" placeholder="dd/mm/yyyy"
                    onfocus="(this.type='date')" onblur="(this.type='text')" required> <br><br>
                <label for="">Time:</label>
                <input type="time" id="time" name="time" required><br><br>
            </div>

            <br><br>
            <div class="btn">
                <button type="submit" name="hire_submit">Submit</button>
                <button onclick="closePopup()">Cancel</button>
            </div>
        </form>
    </div>

    <?php
        if (isset($_POST['hire_submit'])) {
            $seeker_name = $_POST['ka_name'];
            $idapply = $_POST['idapply'];
            $employer_name = $_POST['em_name'];
            $contact = $_POST['em_con'];
            $place = $_POST['place'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $job_role = $_POST['job_role'];
            $idSeeker = $_POST['id_Seeker'];

            $check_if_hired = mysqli_query($conn, "SELECT * FROM job_details WHERE idapply='$idapply' AND idSeeker='$idSeeker' AND employer_name='$employer_name' AND Role='$job_role'");

            if (mysqli_num_rows($check_if_hired)>0) {

                echo "<script> alert('You already hired the kasambahay you selected.')";
                
            } else {
                $hire_query = mysqli_query($conn, "INSERT INTO job_details(seeker_name, idSeeker, idapply, Role, employer_name, contact, place, date, time, hiring_status) VALUES('$seeker_name', '$idSeeker', '$idapply', '$job_role', '$employer_name', '$contact', '$place', '$date', '$time', 'PENDING') LIMIT 1");
                $update_query = mysqli_query($conn, "UPDATE application SET hiring_status='PENDING' WHERE idapply='$idapply'");
                echo "<script> alert('Submitted Successfully!'); </script>";
            }
                
        }
    ?>

    <script>
        function confirm_hire(rowname, rowrole, rowcontact, idapply, idSeeker) {
        // Display the popup
        // var paragraph = document.getElementById('confirm_mssg');
            var name = document.getElementById('nm');
            var contact = document.getElementById('cn');
            var role = document.getElementById('ro');
            document.getElementById('popupDiv').style.display = 'block';
            document.getElementById('ka_name').value = rowname;
            document.getElementById('idapply').value = idapply;
            document.getElementById('job_role').value = rowrole;
            document.getElementById('id_Seeker').value = idSeeker;
            // paragraph.textContent = 'Are you sure you want to hire '+rowname+"."+role;

            name.textContent = 'Name: '+rowname;
            contact.textContent = 'Contact: '+rowcontact;
            role.textContent = 'Role: '+rowrole;
        }


        function closePopup() {
        // Hide the popup
        document.getElementById('popupDiv').style.display = 'none';
        }
    </script>
    


    <!-- ADD CANCEL BUTTON w/ confirmation pop up HIRE CITIZEN hire.php -->
    <!-- SEEKER DASHBOARD SEE WHO HIRED THEM SEE job_details -->
</div>
</body>
</html>