<?php

namespace LetterLinks;

function current_user($returnResponse = false){
	$connectedApp = "letter-links";
	$flow = "webserver";//set globally
	//$_SESSION["connecte"][$flow]["user"];
	return \User::getUserFromSession($connectedApp,$flow);
}