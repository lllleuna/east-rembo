<!DOCTYPE html>
<html lang="en"> 
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <script src="script/script.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>East Rembo Portal</title>
    <link rel="icon" href="Assets/east logo.png" type="image/icon type">
</head>
<body>

    
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-circle-arrow-up"></i></button>
    <?php include('navbar.php');?> <!-- NAVIGATION BAR -->

    <div class="homebody" > <!-- TAGLINE/WELCOME -->
        <div class="blur">
            <div class="homebody-content">
                <p class="welcome-text">Welcome to east rembo community care</p>
                <p class="bodycontent-header">Together, we create a brighter future for Senior Citizen & PWD in  our community.</p>
                <p class="bodycontent-sub">We are here to help and ensure that Senior Citizen and PWDs can age gracefully and live confidently.</p>
                <a href="PAGES/contact.php"><button><span>GET IN TOUCH WITH US</span></button></a>
            </div>
        </div>
    </div>


    <div class="about-section" id="About-Us"> <!-- ABOUT SECTION -->
        <div class="about-content">
            <p class="about-title">ABOUT US</p>
            <p class="about-desc">Barangay East Rembo has a land area of 48.11 hectares with a population of 28,087 and a total household of 6,903. It has a 3-storey modern multi-purpose barangay hall, two public daycare centers, an elementary school (ERES), and a high school (THS). The barangay also has a covered court, health center, livelihood center, children's park, cemented roads, sufficient potable water supply, and a stable drainage system. Residents are mainly business owners, office employees, teachers, active and retired military personnel.</p>
        </div>
        <div id="serviceslist" class="about-more">
            <a href="about_us_thea.php">See more</a>
        </div>
    </div>

    
   
    
    <div class="benefits-container">
        <p class="benefit-title">BENEFITS FOR SENIOR CITIZENs & PWDs</p>
        <div class="benefit-list">
            <div class="photos"><img src="Assets/freemed.png" alt="">
                <p class="photo-desc">FREE MEDICINE</p>
            </div>
            <div class="photos"><img src="Assets/discountid.png" alt="">
                <p class="photo-desc">DISCOUNT ID</p>
            </div>
            <div class="photos"><img src="Assets/cashgifts.png" alt="">
                <p class="photo-desc">CASH GIFTS</p>
            </div>
        </div>

        <div class="about-more">
            <a href="benefits.php">See more</a>
        </div>
    </div>


    <div class="location-container">
        <div class="loc left-text">
            <p class="header-location">LOCATION</p>
            <p class="location">EAST REMBO BARANGAY HALL, TAGUIG CITY, METRO MANILA, PHILIPPINES</p>
            <p class="sub-location">CLICK THIS LINK FOR DIRECTION: 
                <a href="https://maps.app.goo.gl/tyeEqx8AjXW4kNYo7">https://maps.app.goo.gl/tyeEqx8AjXW4kNYo7</a>
            </p>
            <p class="sub-location">ADDRESS: 109 7TH AVE, TAGUIG, 1216 METRO MANILA (NEAR BUTING INTERSECTION)</p>
        </div>
        <div class="loc right-map">
            <img src="Assets/location_east_front.jpg" alt="Brgy. East Rembol Hall">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7723.612842263536!2d121.0566222!3d14.5530598!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c889d0971349%3A0x3e02ac99185d5cb5!2sBarangay%20Hall%20East%20Rembo!5e0!3m2!1sen!2sph!4v1699122965552!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


    
    <div class="sponsors"> <!-- SPONSORS/ORGANIZATIONS -->
        <div class="org-logo">
            <a href="https://www.ncsc.gov.ph/"><img src="Assets/ncsc.png" alt="NCSC"></a>
        </div>
        <div class="org-logo">
            <a href="https://www.dswd.gov.ph/"><img src="Assets/dswd.png" alt="DSWD"></a>
        </div>
        <div class="org-logo">
            <a href="https://www.ivolunteer.com.ph/organization/293"><img src="Assets/gfpwd.png" alt="GRAIN F."></a>
        </div>
        <div class="org-logo">
            <a href="https://www.philhealth.gov.ph/"><img src="Assets/philhealth.png" alt="PHILHEALTH"></a>
        </div>
        <div class="org-logo">
            <a href="https://redcross.org.ph/"><img src="Assets/redcross.png" alt="REDCROSS"></a>
        </div>
        <div class="org-logo">
            <a href="http://"><img src="Assets/opwd.png" alt="PWD ORG"></a>
        </div>
    </div>

    <div class="footer-quotes">
        <div class="f-quotes">
            <p class="">you are an important part of our history and culture</p>
        </div>
    </div>
   


    <?php include('footer.php');?> <!-- FOOTER --> 

 
    
    <script>
        window.addEventListener('beforeunload', function(event) {
                localStorage.clear();
            });
    </script>
</body>
</html>