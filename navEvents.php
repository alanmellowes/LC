<?php 
  session_start();

  if(!isset($_SESSION['access_token'])){        //if person is not authorised redirect them
    header('Location: loginPage.php');
    exit();
  }
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Navigation drawer</title>
    <link rel="stylesheet" href="./css/navDrawer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  
  <body>
    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <label for="check">
        <i class="fas fa-bars" id="sidebar_btn"></i>
      </label>
      <div class="left_area">
        <h3>Kra<span>wla</span></h3>
      </div>
      <div class="right_area">
        <a href="logout.php" class="logout_btn">Logout
        </a>
      </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <div class="sidebar">
      <center>
        <img src="<?php echo $_SESSION['picture']  ?>" class="profile_image" alt="">
        <h4> <?php echo $_SESSION['givenName'] ?> </h4>
      </center>
      <a href="./Events.html"><i class="fas fa-desktop"></i><span>Events</span></a>
      <a href="./pubCrawl.html"><i class="fas fa-cogs"></i><span>Pub Crawl</span></a>
      <a href="./settings.html"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
    <!--sidebar end-->



    <div class="content">
	shit
    </div>

  </body>
</html>


































































































<!---->
