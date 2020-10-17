<?php
require __DIR__ . '/vendor/autoload.php';
/*
Plugin Name: micro-crm
Plugin URI: http://www.micro-crm.com
Description: Le défi Micro-CRM
Author: Quy Nam Nguyen
Version: 1.0.0
License: GPL2 or later
Text Domain: crm
*/

// Exit (die) if accessed directly
if(!defined('ABSPATH')) {
  exit;
  // die;
}

// Load Scripts
// require_once(plugin_dir_path(__FILE__).'/includes/crm-scripts.php');

use Crm\Activator;
$activator = new Activator();

$activator->crm_init();