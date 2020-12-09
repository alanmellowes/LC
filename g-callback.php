<?php 
	require_once "config.php";

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if(isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token; //stores token above to the session & person has been authorised
	} else{
	header('Location: index.php');
	exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);	//get data from person above
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['email'] = $userData['email']; //saves infor to session
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];

	header('Location: Events.php');
	exit();
 ?>