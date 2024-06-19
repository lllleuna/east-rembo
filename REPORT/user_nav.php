<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <title>Nav</title> -->
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    * {
    margin: 0;
    padding: 0;
}
    nav.nav {
    display: flex;
	font-family: 'Poppins', sans-serif;
	background: rgb(69, 0, 0);
    align-items: center;
    overflow: hidden;
    width: 100%;
    padding: 8px;
}

div.left {
    padding-left: 1%;
    color: #f9f9f9;
    width: 100%;
    display: flex;
    align-items: center;
    img {
        height: 80px;
    }

    p {
        /* white-space: nowrap; */
        font-size: 2.5ch;
        padding-left: 10px;
    }
}

div.right {
    justify-content: right;
    width: 100%;
    align-items: center;
    display: flex;
    padding-right:5%;

    a.title {
        margin: 0 4% 0 4%;
        color: #ddd;
        text-decoration: none;
        font-size: 1.6ch;

    }

}

/* PROFILE DROP START */
.dropdown {
    overflow: hidden;
    margin-left: 15px;
  }
  
  .dropdown .dropbtn { 
    border: none;
    outline: none;
    color: #ddd;
    padding: 14px 16px;
    background-color: inherit;

    img {
        height: 40px;
    }
  }
  
  .right a.title:hover, .dropdown:hover .dropbtn {
    color: rgb(255, 255, 186);
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    padding-top: 10px;
    padding-bottom: 10px;
    right: 5px;
  }
  
  .dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  
  .dropdown-content a:hover {
    background-color: #ddd;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
/* PROFILE DROP END */
  @media screen and (max-width: 786px) {
    div.left  {
        display: none;
    }
  }
</style>
<body>
    <nav class="nav">
        <div class="left">
            <img src="../Assets/east logo.png" alt="east rembo logo">
            <p class="title">East Rembo - Dashboard</p>
        </div>
        <div class="right">
            <a class="title" href="../index.php">Home</a>
            <?php if(isset($_SESSION["admin-login"])) : ?>
            <a class="title" href="../admin_portal.php">Dashboard</a>
            <?php endif ?>
            <?php if(isset($_SESSION["super-login"])) : ?>
            <a class="title" href="../SuperAdmin/sa_portal.php">Dashboard</a>
            <?php endif ?>
            
            
            <div class="dropdown">
                <button class="dropbtn">
                <img class="profile-nav" src="../ADMIN_UPLOADS/default-profile.webp" alt=""> 
                </button>
            </div> 
        </div>
    </nav>
</body>
</html>