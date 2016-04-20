<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config["image_upload_path"] = $_SERVER['DOCUMENT_ROOT'] . '/images/uploads/';
$config["image_upload_url"] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://".$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']) . 'images/uploads/';


