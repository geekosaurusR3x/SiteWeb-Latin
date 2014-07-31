<?php
/**
    Load config file and return array
*/
$string = file_get_contents(__DIR__."/config/config.json");
$config = json_decode($string);

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

$cache_template = ($config->env == "prod")?true:false;
/*Initialise le template */
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem($config->theme->base_dir."/".$config->theme->name); // Dossier contenant les templates
$twig = new Twig_Environment($loader, array(
	'cache' => $cache_template
));

?>
