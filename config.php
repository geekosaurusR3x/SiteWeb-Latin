<?php
/**
    Load config file and return array
*/
$string = file_get_contents(__DIR__."/config/config.json");
$config = json_decode($string);
?>
