<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/serv_beni_style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Rembo Portal | Benefits</title>
    <link rel="icon" href="Assets/east logo.png" type="image/icon type">
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

    </style>
</head>
<body>

    <?php include('navbar.php');?> <!-- NAVIGATION BAR -->

    <div class="top-bottom" >
    </div>
    

    <div id="pwd" class=" headertitle">
      <h1>Persons With Disabilities Benefits</h1>
    </div>


<div class="div">
<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/empowering.png">
  </div>
  <div class= "title">
        <h1> Empowerment of PWDs  </h1>
  </div>
  <div class="des">
    <p>   Empowerment of Persons with Disabilities (PWDs) through the organization of PWD Organizations in every Barangay in Makati City.
    </p>
   
  </div>
</div>

<!---- box 2-->




<div class = "cards">
  <div class="image">
    <img src= "benefits_images/pwd-imgs/pwd-id.jpg  ">
  </div>
  <div class="title">
    <h1> Granting of Special Privileges to PWDs: </h1>
  </div>
  <div class="des">
    <p>PWD Transport ID Card Plus that entitles the cardholder to fare discount on the MRT, LRT, provincial buses and local transport groups.
      PWD Movie ID Card Plus that grants all registered PWDs the privileges of watching movies for free in any Makati theater.
    </p>
  </div>
</div>

<!---- box 3-->


<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/mobility.jpg     ">
  </div>
  <div class= "title">
    <h1>  Continuous provision of mobility aids</h1>
  </div>
  <div class="des">
    <p> continuous provision of mobility aids such as wheelchairs, canes, crutches and walkers.

    </p>
  </div>
</div>

<!---- box 4 -->

<div class = "cards">
  <div class="image">
    <img src="benefits_images/pwd-imgs/therapy.jpg    ">
  </div>
  <div class="title">
    <h1>Provision of Rehabilitation Services and free physical therapy session
    </h1>
  </div>
  <div class="des">
    <p>   Provision of Rehabilitation Services and free physical therapy sessions at the Ospital ng Makati.
      Community-based rehabilitation in coordination with KASAMA CBR Foundation, an NGO partner.


    </p>


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


</div>
</div>

</div>

</div>
</div>

<div id="senior" class=" headertitle" style="background: linear-gradient(to right, #6B240C, #BE3144);">
  <h1>Senior Citizen's Benefits</h1>
</div>

<div class = "cards">
  <div class="image">
    <img src="benefits_images/sc-imgs/makatizen-card.jpg ">
  </div>
  <div class="title">
    <h1> Blu Card  </h1>
  </div>
  <div class="des">
    <p>  The Makati City Council passed City Ordinance No. 2019-A-023
       granting P10,000 in cash gift to Blu cardholders between 90-99
       years old, and from age 101 years for as long as they live. Since
        2012, the city has also granted a P100,000 centenarian incentive
         for qualified residents who reach 100 years of age.
    </p>
   
  </div>
  </div>


<!---- box 2-->


<div class = "cards">
  <div class="image">
    <img src="benefits_images/sc-imgs/medical.jpg ">
  </div>
  <div class="title">
    <h1>  Free Services </h1>
  </div>
  <div class="des">
    <p> Free medicines and subsidized health care services.
    </p>
  </div>
</div>


<!---- box 3-->

<div class = "cards">
  <div class="image">
    <img src="benefits_images/sc-imgs/cake.jpg ">
  </div>
  <div class="title">
    <h1> Free Cakes  </h1>
  </div>
  <div class="des">
    <p>  Free Birthday cakes  for senior citizens .
    </p>
  </div>
</div>

<!---- box 4 -->

<div class = "cards">
  <div class="image">
    <img src="benefits_images/sc-imgs/free haircut.jpg     ">
  </div>
  <div class="title">
    <h1>  Free Hair Cut and Spa </h1>
  </div>
  <div class="des">
    <p>   Free haircut and spa services for senior citizens.
    </p>

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