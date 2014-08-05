<?php
require_once("include.php");

/*config global var*/
$config=null;
include("config.php");

/*set post answer or not*/
$form_send = false;
/* form value global */
$form_value = [];
include("sanitise_post.php");

/* Main() */
if($form_value['dest'] == "login")
{
	$user = Users::first(array('conditions' => array('email = ? AND password = ?', $form_value['email'], $form_value['md5'])));
}

/* Render template */
/** set config for rendering **/
$template_file = "index";
$return_array = [
	'site_title' => $config->SiteName,
	'base_template'=>$config->theme->base_dir."/".$config->theme->name];

if($form_send)
{
	$template_file = "user";
	print_r($user);
}

$template_file .= ".twig";

/** rendering **/

$template = $twig->loadTemplate($template_file);
echo $template->render($return_array);

?>
