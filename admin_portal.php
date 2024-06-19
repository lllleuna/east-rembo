<?php // NEW NEW NEW NEW VERSION ADMIN PORTAL
require 'PAGES/config.php';
include('PAGES/authentication.php');

 //Get Update id and status  
 if (isset($_GET['id']) && isset($_GET['status'])) {  
      $id=$_GET['id'];  
      $status=$_GET['status'];  
      mysqli_query($conn,"UPDATE Application set status_of_application='$status' where idapply='$id'");  
      header("location:admin_portal.php");  
      die();  
 }  
 ?> 


<!DOCTYPE html>  <!-- NEW VERSION PAGE --> <!-- NEW VERSION PAGE --> <!-- NEW VERSION PAGE -->
<html lang="en">
<head>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/data.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
 include 'user_nav.php';
?>
<!-- LEFT SIDE NAV -->
    <div id="mySidenav" class="sidenav">
        <a href="#" id="about"  class="active" onclick="showPanel(0,'#fff')">Participants</a>
        <a href="#" id="blog" onclick="showPanel(1,'#fff')">Registered Citizen</a>
        <a href="#" id="projects" onclick="showPanel(2,'#fff')">Job Seeker</a>
        <a href="#" id="event" onclick="showPanel(3,'#fff')">Event Participants</a>
        <!-- <a href="#" id="contact"></a> -->
    </div>

    <!-- SEARCH FILTER -->

    <div class="cont tabContainer">
            <div class="buttonContainer">
                <button onclick="showPanel(0,'#fff')">Participants</button>
                <button onclick="showPanel(1,'#fff')">Registered Citizen</button>
                <button onclick="showPanel(2,'#fff')">Job Seeker</button>
                <button onclick="showPanel(3,'#fff')">Event Participants</button>
            </div>

            <!-- 1 -->
            <div class="tabPanel">
                <h3>Event Participants</h3>
                <?php require 'data_parti.php'; ?>
            </div>

            <!-- 2 -->
            <div class="tabPanel">
                <!-- Registered Citizen -->
                <h3>Registered PWD and Senior Citizen</h3>
                <?php
                    include "PAGES/data.php";
                ?>
            </div>

            <!-- 3 -->
            <div class="tabPanel">
                    <!-- Job Seeker -->
                <h3>Job Seeker Application</h3>
                <div class="table-wrapper">
                    <table border = 1 class="fl-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAME</th>
                            <th>BIRTHDAY</th>
                            <th>PHONE NO.</th>
                            <th>EMAIL</th>
                            <th>ADDRESS</th>
                            <th>ROLE</th>
                            <th>RESUME</th>
                            <th>TIME SUBMITTED</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        $rows = mysqli_query($conn, "SELECT * FROM Application");
                        foreach($rows as $row) :
                        ?>
                        <tr>
                            <td> <?php echo $i++; ?> </td>
                            <td> <?php echo $row["Name"]; ?> </td>
                            <td> <?php echo $row["Bday"]; ?> </td>
                            <td> <?php echo $row["Phone_no"]; ?> </td>
                            <td> <a href=""><?php echo $row["Email"]; ?></a> </td>
                            <td> <?php echo $row["Address"]; ?> </td>
                            <td> <?php echo $row["Role"]; ?> </td>
                            <td> <a href="RESUME/<?php echo $row["Filename"]; ?>"><?php echo $row["Filename"]; ?></a> </td>
                            <td> <?php echo $row["submitted_at"]; ?> </td>
                            <td> <?php echo $row["status_of_application"]; ?> </td>
                            <td>  
                                <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['idapply'] ?>')">  
                                    <option value="">Update Status</option>  
                                    <option value="PENDING">Pending</option>  
                                    <option value="ACCEPTED">Accept</option>  
                                    <option value="REJECTED">Reject</option>  
                                </select>  
                            </td> 
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <script type="text/javascript">  
                        function status_update(value,id){  
                            //alert(id);  
                            let url = "http://localhost/east_brgy_portal/admin_portal.php";  
                            window.location.href= url+"?id="+id+"&status="+value;  
                        }  
                    </script> 
                </div>

            </div>

    <script>
        // Add event listener to each link to toggle the 'active' class
        document.addEventListener("DOMContentLoaded", function() {
            var links = document.querySelectorAll("#mySidenav a");
            links.forEach(function(link) {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    // Remove 'active' class from all links
                    links.forEach(function(link) {
                        link.classList.remove("active");
                    });
                    // Add 'active' class to the clicked link
                    this.classList.add("active");
                });
            });
        });


        var tabButtons=document.querySelectorAll(".tabContainer .buttonContainer button");
        var tabPanels=document.querySelectorAll(".tabContainer  .tabPanel");

        function showPanel(panelIndex,colorCode) {
            tabButtons.forEach(function(node){
                node.style.backgroundColor="white";
                node.style.color="white";
            });
            tabButtons[panelIndex].style.backgroundColor=colorCode;
            tabButtons[panelIndex].style.color="white"; // visited color of tab text
            tabPanels.forEach(function(node){
                node.style.display="none";
            });
            tabPanels[panelIndex].style.display="block";
            tabPanels[panelIndex].style.backgroundColor=colorCode;
        }
        showPanel(0,'white');
    </script>
        
</body>
</html>