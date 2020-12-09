<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <script src="scripts/scripts.js"> </script>
 <?php
$servername = "eu-cdbr-west-03.cleardb.net";
$username = "b6d0c874bc79b5";
$password = "7cda2c8a";
$dbname  = "heroku_7e527134bf57a8d"; 
 
$conn = new mysqli($servername, $username, $password, $dbname); 

 if($conn->connect_error){
	 die("Connection failed:"  . $conn->connect_error);
 }
 ?>
 
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Start Bootstrap </div>
      <div class="list-group list-group-flush">
        <a href="Events.php" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Pub Crawl</a>
        <a href="./liveChat/liveChat/public/index.html" class="list-group-item list-group-item-action bg-light">Pub chat</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Settings</a>
		<a class="list-group-item list-group-item-action bg-light" data-toggle="modal" data-target="#locationModal">Set Location </a> 
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

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
			<div class = "col-md-4 col-xs-4 eventname collapsed events collapsed"> Events
				<button type="button" class="btn btn-primary btn-sm floatright blue" data-toggle="modal" data-target="#eventsModal">
					+
					</button>
			</div> 
			<div class = "col-md-8 col-xs-8 eventname nopadding eventschat">
            <button type="button" class="btn btn-primary btn-sm collapsebutton collapsefunction"><</button>Event Name </div> 
			</div> 
			<div class = "row row-no-padding d-flex height100vh">
				<div class = "col-md-4 no-padding  eventlist h-100 events collapsed">
					<div class = "list-group eventlist d-flex flex-column nopadding" id="list">
						<!----<a href="#" class="list-group-item-action align-items-start nopadding collapsefunction">
						<div class = "col-md-12 eventdisplay nopadding d-flex w-100 justify-content-between collapsefunction" id="eventdesc">
								Event Name</br>
								User1:message</br>
								User2:message</br>
								User3:message</br>	

								<div class = "col-md-3" id="usercount">
									<small>User1, user2 + n others</small> 
								</div>
						</div>
						</a> ---->
						
						<?php 
						$query1 = "SELECT * FROM events";
						$result = mysqli_query($conn, $query1); 
						
						
						while($row = mysqli_fetch_assoc($result)) {
				
						echo '<a href="#" class="list-group-item-action align-items-start nopadding collapsefunction" value = "' . $row["name"] . '">';
						echo '<div class = "col-md-12 eventdisplay nopadding d-flex w-100 justify-content-between collapsefunction" id="eventdesc">';
						echo $row["name"] . '</br>';
						echo $row["location"]; 
						echo '</div> </a>';
						}
						?>
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
						
	<div class="modal fade" id="eventsModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create an Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
		<div class="modal-body">
			<form method = "post" action="authenticate.php"">
				<div class = "form-group">
					<label for = "eventName">Event Name</label>
					<input type="text" class = "form-control" id="eventName" name = "eventName">
					</br>
					</br>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id = "createEventButton" name = "createEventButton" >Save changes</button>
				</div>
			</form>
		</div>
			
		
		</div>
		</div>
	</div>
	
	<div class="modal fade" id="locationModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Set Location</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
		<div class="modal-body">
			<form  method = "post" action="authenticate.php" id = "locationSetter">
				<div class = "form-group">
					<label for = "eventName">Location:</label></br>
					<select id = "locationSet" name = "locationSet"> 
						<option value = "Dublin 1"> Dublin 1 </option>
						<option value = "Dublin 2"> Dublin 2 </option>
						<option value = "Dublin 3"> Dublin 3 </option>
						<option value = "Dublin 4"> Dublin 4 </option>
						<option value = "Dublin 5"> Dublin 5 </option>
						<option value = "Dublin 6"> Dublin 6 </option>
						<option value = "Dublin 7"> Dublin 7 </option>
						<option value = "Dublin 8"> Dublin 8 </option>
						<option value = "Dublin 9"> Dublin 9 </option>
						<option value = "Dublin 10"> Dublin 10 </option>
						<option value = "Dublin 11"> Dublin 11 </option>
						<option value = "Dublin 12"> Dublin 12 </option>
						<option value = "Dublin 13"> Dublin 13 </option>
						<option value = "Dublin 14"> Dublin 14 </option>
						<option value = "Dublin 15"> Dublin 15 </option>
						<option value = "Dublin 16"> Dublin 16 </option>
						<option value = "Dublin 17"> Dublin 17 </option>
						<option value = "Dublin 18"> Dublin 18 </option>
						<option value = "Dublin 19"> Dublin 19 </option>
						<option value = "Dublin 20"> Dublin 20 </option>
						<option value = "Dublin 21"> Dublin 21 </option>
						<option value = "Dublin 22"> Dublin 22 </option>
						<option value = "Dublin 23"> Dublin 23 </option>
						<option value = "Dublin 24"> Dublin 24</option>
					</select></br></br>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" id = "locationConfirm" name = "locationConfirm">Save changes</button>
			</div>
			</div>
		</form>
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
