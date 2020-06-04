<?php $OCPATH = 'http://' . $_SERVER['HTTP_HOST'] . '/jason/';
// General labels of the entire pages.
$oceana_content = array(
	"title"			=> "OCEANA HR Solutions",
	"-late"			=> "Late siya!",
	"-ontime"		=> "Sakto ang entrance!",
	"-okout"			=> "Nag-out siya ng tama!",
	"-latebutokout"	=> "Late siya, pero nag-out naman ng tama!",
	"-undertime"		=> "Paki-verify lang sa HR, baka Undertime siya!"
	);

// Assets path, you can edit this if the folder is renamed.
$assets = array(
	"folder"	=> "assets/",
	"bower"		=> "assets/bower_components/",
	"dst"			=> "assets/dist/",
	"img"				=> "assets/images/"
	);

// Plugins path, you can edit this if the folder is renamed.
$plugins = array(
	"pdf" => "tcpdf/",
	"*"		=> "plugins/"
	);

// List of employeement types
$job_type = array (
	"Probationary"	=> "Probationary Employment",
	"Casual"				=> "Casual Employment",
	"Seasonal"		=> "Seasonal Employment",
	"Project"			=> "Project Employment",
	"Fixed"			=> "Term or Fixed Employment",
	"Regular"			=> "Regular or Permanent Employment"
	);
?>
