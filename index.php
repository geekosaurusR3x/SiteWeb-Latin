<?php
require_once("include.php");
/*config global var*/
$config=null;
include("config.php");

/* Main() */


/* Render template */
$template = $twig->loadTemplate('index.twig');
echo $template->render(array(
	'site_title' => $config->SiteName
));

?>
