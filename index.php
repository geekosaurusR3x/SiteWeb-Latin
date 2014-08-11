<?php
session_start ();
require_once("include.php");

/*config global var*/
$config=null;
include("config.php");

/*set post answer or not*/
$form_send = false;
/* form value global */
$form_value = ["dest"=>"index"];
include("sanitise_post.php");

/** set config for rendering **/
$template_file = "index";
$return_array = [
	'site_title' => $config->SiteName,
	'base_template'=>$config->theme->base_dir."/".$config->theme->name];


/* Main() */
include("user_infos.php");

$template_file .= ".twig";

/** rendering **/

$template = $twig->loadTemplate($template_file);
echo $template->render($return_array);

?>
