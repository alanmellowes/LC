<?php 
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("597739374969-ugihjscj6dioaafp5fo4n58qlii3knq0.apps.googleusercontent.com");
	$gClient->setClientSecret("mx8awmYMpXnpmkYogow2nl2e");
	$gClient->setApplicationName("Krawla");
	$gClient->setRedirectUri("https://krawla.herokuapp.com/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email"); //scopes asks user for permissions to get their info

 ?>