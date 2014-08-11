<?php
$user = null;
$logged = false;

if($form_value['dest'] == "login")
{
	$user = Users::first(array('conditions' => array('email = ? AND password = ?', $form_value['email'], $form_value['md5'])));
	$_SESSION['email'] = $form_value['email'];
	$logged = true;
}

if($form_value['dest'] == "logout")
{
	session_destroy();
	$logged = false;
}

if(isset($_SESSION['email']) && !$form_send){
	$user = Users::find_by_email($_SESSION['email']);
	$logged = true;
}

if($user != null){
	/* Render template */
	if($form_send)
	{
		$template_file = "user";
	}

	$return_array = array_merge($return_array,[
		"logged" => $logged,
		"pseudo" => $user->pseudo,
		"first_name" => $user->first_name,
		"last_name" => $user->last_name,
		"lvl" => $user->lvl,
		"actual_xp" => $user->actual_xp,
		"total_xp" => 100,
		"percent_xp" => 45,
	]);
}
else
{
	if($form_send)
	{
		$template_file = "login";
	}
}


?>
