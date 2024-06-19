<?php
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/serv_beni_style.css">
    <link rel="stylesheet" href="job.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>East Rembo Portal | Job</title>
    <link rel="icon" href="Assets/east logo.png" type="image/icon type">
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

</style>
<body>

    <div class="top" id="top">top</div>
    <?php include('navbar.php');?> <!-- NAVIGATION BAR -->

    <div class="top-bottom" >

        <div class="sec service-header" >
            <p class="text title">JOB FOR HIRE</p>
            <p class="text info">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad voluptatibus officiis cum suscipit hic magni autem non et! Odio, ipsum! Aliquam odio neque laboriosam aut fugit aliquid, placeat cum! Reprehenderit! Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, est! Corrupti voluptatum placeat eligendi impedit repellat dolor minus. Delectus rem nulla unde voluptates quas sint et perspiciatis esse iure ad!</p>
        </div>

        <div class="sec second">
            <p class="text sectitle">Mga KASAMBAHAY na Saklaw ng Batas</p>
            <div class="job-list">
                <div class="list one">
                    <p class="name">Hardinero</p>
                    <img src="Assets/hardinero.jpg" alt="Hardinero">
                </div>
                <div class="list two">
                    <p class="name">Yaya</p>
                    <img src="Assets/yaya.jpg" alt="Yaya">
                </div>
                <div class="list three">
                    <p class="name">Taga-luto</p>
                    <img src="Assets/tagaluto.jpg" alt="Taga-luto">
                </div>
                <div class="list four">
                    <p class="name">Taga-laba</p>
                    <img src="Assets/tagalaba.jpg" alt="Taga-laba">
                </div>
                <div class="list five">
                    <p class="name">All-around</p>
                    <img src="Assets/all1.png" alt="All-rounder">
                </div>
            </div>
            <p class="note">
                Hindi saklaw ng batas ang family drivers, service provider, mga batang nasa foster family arrangement, at sinumang nagtratrabaho ng "side-line".
            </p>
        </div>

        <div class="service-details">
            <div class="division">
                <div class="arrow-div">
                    <p class="details-title">Edad na Pinapayagan ng Batas</p>
                </div>
                <div class="details">
                    <p class="intro">
                            Ang <u> edad na pinapayagan ng batas upang makapagtrabaho ay 15 taong gulang.</u> Bawal kumuha ng kasambahay na may edad na mas mababa dito.
                        </p>
                        <p class="content-list">
                            <ul class="list">
                                <li>Kailangan ang pahintulot ng magulang/guardian kung ang edad ay mula 15 taon pataas hanggang wala pang 18 taong gulang.</li>
                                <li>May mga regulasyon sa oras ng trabaho at iba pa na ipinatutupad para sa kasambahay na nasa ganitong edad.</li>
                                <li>Bawal silang gumawa ng mga trabahong makapipinsala sa kanilang kalusugan, kaligtasan at moralidad.</li>
                            </ul>
                        </p>
                </div>
                
            </div>
            <div class="division">
                <div class="arrow-div">
                    <p class="details-title">Mga Kondisyon sa Pagtratrabaho</p>
                </div>
                <div class="details">
                    <p class="intro">
                    <b>Kontrata sa pagtratrabaho</b><br>
                        Nakasaad ang magiging trabaho bilang kasambahay, tagal ng pagsisilbi, sweldo at mga kaukulang kaltas, oras ng trabaho at mga karagdagang bayad, araw ng pahinga at pinapayagang pag-absent sa trabaho, pagkain at tirahan, at iba pang kondisyon na napagkasunduan.
                        </p>
                        <p class="content-list">
                            <ul class="list">
                                <li>Walang babayaran na anumang fees ang kasambahay sa pagkuha sa kanya mula sa agency.</li>
                                <li>Karapatan ng kasambahay na magkaroon ng kopya ng kontrata.</li>
                                <li>Dapat ding mabigyan ng kopya ang barangay na sumasakop sa pinagtratrabahuran ng kasambahay para ma-rehistro siya dito.</li>
                            </ul>
                        </p>
                </div>
                
            </div>
            
            
        </div>

    
    </div>

    <div class="apply">
        <button onclick="goToAnotherPage()" class="btn-apply" name="submit" id="apply">Apply now!</button>
    </div>
       
    <script>
        function goToAnotherPage() {
            // Redirect to another page
            window.location.href = 'job/apply_form.php';
        }
    </script>

    <?php include('footer.php');?> <!-- FOOTER -->

</body>
</html>