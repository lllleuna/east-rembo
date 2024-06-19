<?php require '../PAGES/config.php'; ?>

<?php

if (!isset($_SESSION["seeker-login"])) {
    echo
        "<script> alert('ACCESS DENIED!'); 
        window.location.href = '../index.php';
        
        </script>";  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/data.css">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<style>
    div.apply {
        margin: auto;
        width:20%;
        text-align: center;
        margin-bottom: 100px;
    }
    .btn-apply {
  position: relative;
  transition: all 0.3s ease-in-out;
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
  padding-block: 0.5rem;
  padding-inline: 1.25rem;
  background-color: rgb(0 107 179);
  border-radius: 9999px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #ffff;
  gap: 10px;
  font-weight: bold;
  border: 3px solid #ffffff4d;
  outline: none;
  overflow: hidden;
  font-size: 25px;
}


.btn-apply:hover {
  transform: scale(1.05);
  border-color: #fff9;
}

.btn-apply:hover .icon {
  transform: translate(4px);
}

.btn-apply:hover::before {
  animation: shine 1.5s ease-out infinite;
}

.btn-apply::before {
  content: "";
  position: absolute;
  width: 100px;
  height: 100%;
  background-image: linear-gradient(
    120deg,
    rgba(255, 255, 255, 0) 30%,
    rgba(255, 255, 255, 0.8),
    rgba(255, 255, 255, 0) 70%
  );
  top: 0;
  left: -100px;
  opacity: 0.6;
}

@keyframes shine {
  0% {
    left: -100px;
  }

  60% {
    left: 100%;
  }

  to {
    left: 100%;
  }
}


.header-logo-title {
    width: 50%;
    margin-bottom: 50px;
}
.header-logo-title span {

}
.header-logo-title h1 {
    width: 600px;
    float: right;
    font-size: 40px;
}
</style>
<body style="padding: 20px">

    <script>
        function goToMain() {
            window.location.href = '../index.php'; 
        }
    </script>

    <div class="header-logo-title">
        <span onclick="goToMain()" style="cursor: pointer;"><img src="../Assets/east logo.png" alt="" style="width: 120px;"></span>
        <h1 class="title"></h1> 
        <!-- get from db the name of seeker -->
    </div>
    <div class="tabContainer">
        <div class="buttonContainer">
            <button onclick="showPanel(0,'#7393B3')">Your Job</button>
            <button onclick="showPanel(1,'#7393B3')">Rules</button>
        </div>

        <div class="tabPanel">
            <!-- Tab 2:Content SEE WHO HIRED THEM-->
            <div class="table-wrapper">
                <table border = 1 class="fl-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>YOUR NAME</th>
                        <th>ROLE</th>
                        <th>EMPLOYER NAME</th>
                        <th>CONTACT</th>
                        <th>PLACE</th>
                        <th>DATE</th>
                        <th>TIME</th>
                        <th>HIRING STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $id_seeker = $_SESSION["logged_seeker"]['id'];
                    $rows = mysqli_query($conn, "SELECT * FROM job_details WHERE  idSeeker='$id_seeker'");
                    foreach($rows as $row) :
                    ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $row["seeker_name"]; ?> </td>
                        <td> <?php echo $row["Role"]; ?> </td>
                        <td> <?php echo $row["employer_name"]; ?> </td>
                        <td> <?php echo $row["contact"]; ?> </td>
                        <td> <?php echo $row["place"]; ?> </td>
                        <td> <?php echo $row["date"]; ?> </td>
                        <td> <?php echo $row["time"]; ?> </td>
                        <td> <?php echo $row["hiring_status"]; ?> </td>
                        <?php 
                            $idSeeker = $row["idSeeker"]; 
                            $idapply = $row["idapply"];
                        ?>
                        <td> 
                            <button onclick="accept_hire('<?php echo $idSeeker; ?>', '<?php echo $idapply; ?>'); hideShowButtons('reject', 'accept') ">ACCEPT</button>
                            <button onclick="reject_hire('<?php echo $idSeeker; ?>', '<?php echo $idapply; ?>'); hideShowButtons('accept', 'reject') ">REJECT</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tabPanel">
        <div class="apply">
                <button onclick="goToAnotherPage()" class="btn-apply" name="submit" id="apply">Apply now!</button>
            </div>
        </div>
    </div>

    <div id="popupDiv" class="popup">
        <p id="mssg"></p>
    <form action="" method='post'>
        <input type="text" name="seekerID" id="seekerID" style="display: none;">
        <input type="text" name="appliID" id="appliID" style="display: none;">
        <button type="submit" name="accept" id="accept" >Yes</button>
        <button type="submit" name="reject" id="reject" >Yes</button>
        <button onclick="closePopup()">Cancel</button>
    </form>
    </div>

    <?php
        if (isset($_POST['accept'])) {
            $seekerID = $_POST['seekerID'];
            $appliID = $_POST['appliID'];


            $update_hiring_status = mysqli_query($conn, "UPDATE job_details SET hiring_status = 'ACCEPTED' WHERE idSeeker = '$seekerID' AND idapply = '$appliID'");

            $update_hiring_status = mysqli_query($conn, "UPDATE application SET hiring_status = 'ACCEPTED' WHERE idSeeker = '$seekerID' AND idapply = '$appliID'");


            echo "<script> alert('JOB ACCEPTED!'); </script>";
        } elseif (isset($_POST['reject'])) {
            $seekerID = $_POST['seekerID'];
            $appliID = $_POST['appliID'];


            $update_hiring_status = mysqli_query($conn, "UPDATE job_details SET hiring_status = 'REJECTED' WHERE idSeeker = '$seekerID' AND idapply = '$appliID'");

            $update_hiring_status = mysqli_query($conn, "UPDATE application SET hiring_status = 'REJECTED' WHERE idSeeker = '$seekerID' AND idapply = '$appliID'");


            echo "<script> alert('JOB REJECTED!'); </script>";
        }
    ?>
<!-- BUTTON -->

    <script>
        function accept_hire(seekerID, appliID) {
            document.getElementById('popupDiv').style.display = 'block';
            document.getElementById('seekerID').value = seekerID;
            document.getElementById('appliID').value = appliID;
            var mssg = document.getElementById('mssg');
            mssg.textContent = 'Are you sure you want to ACCEPT this job?';
        }

        function reject_hire(seekerID, appliID) {
            document.getElementById('popupDiv').style.display = 'block';
            document.getElementById('seekerID').value = seekerID;
            document.getElementById('appliID').value = appliID;
            var mssg = document.getElementById('mssg');
            mssg.textContent = 'Are you sure you want to REJECT this job?';
        }

        function hideShowButtons(buttonToHide, buttonToShow) {
            // Hide the button to hide
            document.getElementById(buttonToHide).style.display = 'none';

            // Show the button to show
            document.getElementById(buttonToShow).style.display = 'block';
        }


        function closePopup() {
        // Hide the popup
        document.getElementById('popupDiv').style.display = 'none';
        }
    </script>

<script src="myScript.js"></script>
</body>
</html>