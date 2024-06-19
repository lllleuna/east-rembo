

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="css/serv_beni_style.css">
  <meta charset="UTF-8">
  <title>benefits</title>
  
  <link rel="stylesheet"  type="text/css" href="style.css">
</head>

<style>
  .headertitle {
          font-size: 25px;
          color: #fff;
          margin: 0;
          height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
          background: #450101;
          /* Fallback color */
          background: linear-gradient(to right, #9ADE7B, #508D69);
          /* Gradient */
          border-radius: 10px;
          height: 125px;
          padding: 20px;
          margin: 20px;

        }

        body{
          background-color:#f0f0f0 ;
        }

        *{
          box-sizing: border-box;
        }

        .cards{
        width: 23%;
        height: 405px;
        display: inline-block ;
        margin: 65px;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 2px 2px 10px    #B0A695  ;
        vertical-align: top ;
        transition: transform 0.5s;

        }

        div.div {
            display: inline-block;
        }

        .cards:hover {
          transform: translateY(-10px);


        }


        .image img {

        width: 100%;
        height: 165px;
        object-fit: cover;
        border-top-right-radius: 5px ;
        border-top-left-radius: 5px;


        }
        .title{
        text-align: center;
        padding: 5px;
        font-size: 11px;

        }

        .des{
          text-align: center;
          padding:5px;
        font-size: 15px;

        }
        @media screen  and (max-width:768px){
            .cards{
        width: 70%;
            }
            .headertitle {
                height: 270px;
            }
        }

        .btn {
          color: black;
        }

.overlay {
  display: none;
  position: fixed;
  top: 0;
  left: 47%;
  transform: translateX(-47%);
  width: 95%;
  height: 99%;
  background: #808080;
  border-radius: 20px;
  margin: 10px auto;
}




 
.close-button {
  position: left;
  top: 10px;
  right: 10px;
  cursor: pointer;
  z-index: 10; /* Ensure it's above the content */
}






.overlay-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 20px;
  margin: 35px 80px 35px 80px; /* Top, Right, Bottom, Left */
  width: 99%;
  max-height: 99%; /* Set a maximum height for the content */
  overflow-y: auto;
  box-sizing: border-box; /* Include padding and border in the height calculation */
  position: relative; /* Needed for pseudo-elements */


}






.overlay-content::-webkit-scrollbar {
  width: 8px; /* Width of the scrollbar */
}


.overlay-content::-webkit-scrollbar-thumb {
  background-color: #888; /* Color of the scrollbar thumb */
  border-radius: 4px; /* Border radius for the thumb */
  box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.5); /* Inset box shadow for space inside the thumb */
}


.overlay-content::-webkit-scrollbar-track {
  background-color: transparent; /* Make the scrollbar track transparent */
  border-radius: 10px; /* Border radius for the track */
}


.overlay-content::-webkit-scrollbar-corner {
  background-color: transparent; /* Hide the scrollbar corner */
}


.overlay-content::-webkit-scrollbar-thumb:hover {
  background-color: #555; /* Color of the thumb on hover */
}


.overlay-content h2 {
text-align: center;
padding: 10px;
font-size: 20px;


}


.overlay-content p {
  font-size: 1rem; /* Adjust the font size as needed */
  text-align: justify;
  padding-left: 30px;
  padding-right: 30px;
  line-height: 1.1 ;


}


</style>

<body>




<div class=" headertitle">
  <h1>Persons With Disabilities Benefits</h1>
</div>





<a href="#cartag" class="btn" onclick="openCarTagOverlay()">
<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/empowering.png">
  </div>
  <div class= "title">
    <h1> CAR TAG FOR PWDs  </h1>
  </div>
  <div class="des">
    <p>  The issuance of special car tags or vehicle registration plates for persons with disabilities (PWDs)
    </p>
       <!-- Button to open the overlay --> 
</div>
</div>
</a> 
<!-- Overlay HTML -->
<div class="overlay" id="carTagOverlay">
  <div class="overlay-content">
    <span class="close-button" onclick="closeCarTagOverlay()">X</span>
    <h2>CAR TAG FOR PWDs</h2>
    <p>The issuance of special car tags or vehicle registration plates for persons with disabilities (PWDs) varies by country and local jurisdiction. These special car tags are often provided to PWDs to signify that the vehicle is being used by or for the benefit of a person with a disability, and they may come with certain benefits or privileges such as parking concessions.</p>




    <p> the Philippines, including Makati City, the Land Transportation Office (LTO) is the government agency responsible for vehicle registration and issuance of license plates. To inquire about special car tags for PWDs in Makati City, you can contact the LTO office in Makati or visit their official website for the most up-to-date information. </p>
     <h2>REQUIREMENTS:</h2>
     <pre>
      1. PWD ID
      2. Duly accomplished Applicant’s Form
      3. Marriage Contract/Affidavit of Cohabitation (in case the applicant is the spouse
      or common-law spouse of the PWD)
      4. Birth Certificate or Affidavit of Guardianship (in case the applicant is the parent
      or guardian)
      5. Picture of the PWD with the vehicle and plate number (if car owner)
      6. Vehicle Registration (valid)
      7. Company Certification (if vehicle is company assigned)</pre>


      <h2>PROCEDURES:</h2>
      <pre>
        1. Obtain and fill out Application Form at the MSWD.
        2. Present all the requirements to MSWD staff for verification.
        3. Proceed to Miscellaneous Office and pay Php50.00 for the Car Tag.
        4. Go back to MSWD and present the receipt.
        5. Wait for the release of the Car Tag.</pre>


 
  </div>
</div>




<!---- box 2-->


<div class = "cards">
  <div class="image">
    <img src= "benefits_images/pwd-imgs/pwd-id.jpg  ">
  </div>
  <div class="title">
    <h1>  Special Privileges to PWDs: </h1>
  </div>
  <div class="des">
    <p>PWD ID, purchase booklet
      and movie booklet</p>
    <!-- Button to open the overlay -->
    <a href="#cartag" class="btn" onclick="openPrivilegesOverlay()">read more</a>  
</div>
</div>
<!-- Overlay HTML -->
<div class="overlay" id="overlay">
  <div class="overlay-content">
    <span class="close-button" onclick="closePrivilegesOverlay()">X</span>


</div>
</div>




<!---- box 3-->


<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/mobility.jpg     ">
  </div>
  <div class= "title">
    <h1>  Provision of mobility aids</h1>
  </div>
  <div class="des">
    <p> Continuous provision of mobility aids such as wheelchairs, canes, crutches and walkers.
    </p>
    <!-- Button to open the overlay -->
    <a href="#cartag" class="btn" onclick="openMobilityAidsOverlay() ">Read More</a>  
</div>
</div>
<!-- Overlay HTML -->
<div class="overlay" id="overlay">
  <div class="overlay-content">
    <span class="close-button" onclick="closeMobilityAidsOverlay()">X</span>




</div>
</div>


</div>
</div>


<!---- box 4 -->


<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/therapy.jpg    ">
  </div>
  <div class="title">
    <h1> Rehabilitation Services
    </h1>
  </div>
  <div class="des">
    <p> Provision of Rehabilitation Services  at the Ospital ng Makati in coordination with KASAMA CBR Foundation, an NGO partner.
    </p>
    <div class="btn-container">
    <a href="" class="btn">Read More</a>
</div>
</div>
</div>


<!-- 5-->




<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/employment.webp    ">
  </div>
  <div class="title">
    <h1>Employment assistance
    </h1>
  </div>
  <div class="des">
    <p>  Employment assistance through “Tulong Alalay sa mga Taong may Kapansanan”
    </p>
    <div class="btn-container">
    <a href="" class="btn">Read More</a>


<script>
  function openCarTagOverlay() {
    document.getElementById('carTagOverlay').style.display = 'flex';
  }




  function closeCarTagOverlay() {
    document.getElementById('carTagOverlay').style.display = 'none';
  }




  function openPrivilegesOverlay() {
    document.getElementById('privilegesOverlay').style.display = 'flex';
  }




  function closePrivilegesOverlay() {
    document.getElementById('privilegesOverlay').style.display = 'none';
  }




  function openMobilityAidsOverlay() {
    document.getElementById('mobilityAidsOverlay').style.display = 'flex';
  }




  function closeMobilityAidsOverlay() {
    document.getElementById('mobilityAidsOverlay').style.display = 'none';
  }
</script>












</div>
</div>
</div>


</div>
</div>



<div class="bottom-nav">
        <ul class="wrapper">
            <li class="icon up">
                <span class="tooltip">Up</span>
                <a href="#top"><span><i class="fa-solid fa-arrow-up"></i></i></span></a>
            </li>
            <li class="icon care">
                <span class="tooltip">PWD</span>
                <a href="#pwd"><span><i class="fa-solid fa-wheelchair"></i></span></a>
            </li>
            <li class="icon driver">
                <span class="tooltip">Senior</span>
                <a href="#senior"><span><i class="fa-solid fa-person-walking-with-cane"></i></span></a>
            </li>
        </ul>
    </div> 

    <?php include('footer.php');?> <!-- FOOTER -->

</body>
</html>









