<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />


  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUzBG6_XlJi4ijq_hS3rg0A8vD3djUowE&libraries=places">
	</script>
	
	 <script src="scripts/scripts.js"> </script>

 <?php
 $servername = "eu-cdbr-west-03.cleardb.net";
 $username = "b6d0c874bc79b5";
 $password = "7cda2c8a";


 $conn = new mysqli($servername, $username, $password); 

 if($conn->connect_error){
	 die("Connection failed:"  . $conn->connect_error);
 }
 
 echo "Connected successfully"; 
 
 ?>
 
</head>
<body onload="displayPubs()">
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="Events.php" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Pub Crawl</a>
        <a href="./liveChat/public/index.html" class="list-group-item list-group-item-action bg-light">Pub chat</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Settings</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button id="menu-toggle" style="font-size:24px">Menu <i class="fa fa-th-large"></i></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
			<li>
			<a href="logout.php" class="logout_btn">Logout
			</a>
			</li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
		<div class = "row eventname">
			<div class = "col-md-4 col-xs-4 eventname collapsed events collapsed"> Events </div> 
			<div class = "col-md-8 col-xs-8 eventname nopadding eventschat">
            <button type="button" class="btn btn-primary btn-sm collapsebutton collapsefunction"><</button>Event Name </div> 
			</div> 
			<div class = "row row-no-padding d-flex height100vh">
				<div class = "col-md-4 no-padding  eventlist h-100 events collapsed">
					<div class = "list-group eventlist d-flex flex-column nopadding" id="eventlist">
						<a href="#" class="list-group-item-action align-items-start nopadding collapsefunction">
						<div class = "col-md-12 eventdisplay nopadding d-flex w-100 justify-content-between collapsefunction" id="eventdesc">
								Event Name</br>
								User1:message</br>
								User2:message</br>
								User3:message</br>	

								<div class = "col-md-3" id="usercount">
									<small>User1, user2 + n others</small> 
								</div>
						</div>
						</a>
							</div>
						</div>			
						<div class = "col-md-8 eventschat">
							<div id="messagedisplay" class = "row ">
								messages here 
							</div>
							<div class = "row inputmessage">
							<div class = "col-11 nopadding">
								<input id="messageinput" class = "height100 width100 " placeholder = "Enter message here"> 
							</div>
							<div class = "col-1 ">
								<button class="btn btn-primary" type="submit">Send</button>	
							</div>
							</div> 

						</div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>

