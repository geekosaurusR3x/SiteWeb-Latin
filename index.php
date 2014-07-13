<?php
require_once("include.php");
/*config global var*/
$config=null;
include("config.php");
/* initialize ActiveRecord */
ActiveRecord\Config::initialize(function($cfg){
	global $config;
	$cfg->set_model_directory('models');
	$cfg->set_connections(array(
		'devel'=> $config->database->driver.'://'.$config->database->user.':'.$config->database->passwd.'@'.$config->database->host.'/'.$config->database->name.'_dev',
		'prod' => $config->database->driver.'://'.$config->database->user.':'.$config->database->passwd.'@'.$config->database->host.'/'.$config->database->name.'_prod'
	));
	$cfg->set_default_connection($config->env);
});

/*Main()*/
$user=User::find_by_pseudo('test');
print_r($user);

?>
