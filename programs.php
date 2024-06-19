<?PHP 
 require 'PAGES/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/serv_beni_style.css">
    <meta charset="UTF-8">
    <script src="script/script.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Rembo Portal | Programs</title>
    <link rel="icon" href="Assets/east logo.png" type="image/icon type">
</head>
<body>

    <?php include('navbar.php');?> <!-- NAVIGATION BAR -->

    <div class="top-bottom">
    </div>
    
<!-- upload loop -->
    
    <?php 
                $post_sql = mysqli_query($conn, "SELECT * FROM admin_post WHERE page_name='PROGRAMS' ORDER BY idAdmin_Post DESC");
            
                echo "<div id='trigger'>";
                if (mysqli_num_rows($post_sql) > 0) {
                    while ($image = mysqli_fetch_assoc($post_sql)) { ?>
                <div class="upload-prog-imgs" >
                    <img src="ADMIN_UPLOADS/<?=$image['filename']?>" class="clickable-image" alt="img" data-image-name="<?=$image['filename']?>">
                </div>
            <?php   }
                } 
                echo "</div>";
    ?>

    
<!-- upload loop -->

    <div class="program-cont">
        <div class="program-item">
            <div class="item right-text">
                <p class="main text1">PROJECT</p>
                <p class="sub text2">PERSONS WITH DISABILITY</p>
                <p class="main text3">PERFUME&nbsp;AND CANDLE&nbsp;MAKING</p>
                <p class="desc text4">Final Demo of Livelihood Project Tulong Pangka-buhayan ng may K"pansanan  Perfume and Candle Making</p>
            </div>
            <div class="item left-img">
                <img src="programs-imgs/candle.jpg" alt="">
            </div>
        </div>
        <div class="program-item">
            <div class="item right-text">
                <p class="main text1">EVENT</p>
                <p class="sub text2">PERSONS WITH DISABILITY</p>
                <p class="main text3">Seminar and Workshop</p>
                <p class="desc text4">Attended VIR-DRRMO Seminar and Workshop at Brgy. Bel-Air</p>
            </div>
            <div class="item left-img">
                <img src="programs-imgs/VIR-DRRMO1.jpg" alt="">
            </div>
        </div>
    </div>


    <?php include('footer.php');?> <!-- FOOTER -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-circle-arrow-up"></i></button>
   
</body>
</html>