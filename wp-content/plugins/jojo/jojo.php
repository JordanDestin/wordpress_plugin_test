<?php

/*
Plugin Name: Jojo
Plugin URI: https://wordpress.com/fr/
Description: Plugin de test
*/

use Jojo\Test\JojoPlugin;

if ( !defined('ABSPATH') )
	exit;

    define('JOJO_PLUGIN_DIR', plugin_dir_path(__FILE__));

    require JOJO_PLUGIN_DIR . 'vendor/autoload.php';

    $plugin = new JojoPlugin(__FILE__);