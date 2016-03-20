<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$config["upload_path"] = '/home/kcm_video/www/public_html/studio_hub/uploads/'; //refer to server dir
$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . '/studio_hub/uploads/';
$config["upload_url"] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http") . "://".$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']) . 'studio_hub/uploads/';
$config["front_path"] = FCPATH . 'uploads\\';
$config["public_url"] = "http://10.9.8.72/studio_hub/uploads/";

//Brightcove credentials
$config["account_id"] = "4147600768001";
$config["client_id"] = "be057a07-dfc0-4830-8eb4-2c529dc81b82";
$config["client_secret"] = "AVWx5OVnG5nknsoUJrSTCwSUcaX7sD24LzIHgHHj9Hr9Pr4WzDm7izg1Ot3pA3nA6jW_el8rWT8GXAyTgO1OjQ";
$config["standard_profile"] = "videocloud-default-v1";

// Brightcove Analytic kompas.com
$config['analytic_kompascom'] = '7a92cab4-642b-43f7-83a3-c08b0feec5b4';
$config['analytic_kompascom_secret'] = '5xCpZYPSA7APC_pqPBBduI_g5hPDtYmD19ujFb3z0pl4pxfX7_VO4YvIRpBFQoe00c_PiOgrfhkUL5EfBwOmMQ';

// Brightcove Analytic kompasTV
$config['analytic_kompastv'] = '5069cc90-d3a4-4f8a-814e-fd1eb33946c3';
$config['analytic_kompastv_secret'] = 'GiRxQmrDvzWdu2EPfvSbH_lIQvDUvBXc2WqOgD6kHX0MBCnemlKioIf8hjuOhq_4ECSrVlnxW7YRQSzLuORSuA';

/**
 * top menu config
 * 
 */
$config['top_menu'] = array(
		// array(
		// 	"funct" => array( "messages", "data_messages", ),
		// ),
		array(
			"name" => "ADMIN",
			"title" => "Administrative tool",
			"icon" => "fa fa-cogs",
			"path" => "admintools",
			"module" => "admintools",
			"sub" => array(
				array( "module" => "admintools", "funct" => array( "admintools", "data_admintools"), ), 
				),
		),
		array(
			"name" => "",
			"title" => "Log out",
			"icon" => "fa fa-sign-out",
			"path" => "login/signout",
		),
);

/**
 * left menu config
 * 
 * 
 * 
 */
$config['left_menu'] = array(
		array(
			"name" => "Video Analytics",
			"title" => "Video analylics",
			"icon" => "fa fa-bar-chart-o",
			"path" => "analytics",
			"module" => "analytics",
		),
		array(
			"name" => "Uploads",
			"title" => "Video upload",
			"icon" => "fa fa-cloud-upload",
			"path" => "upload",
			"module" => "upload",
		),
		array(
			"name" => "Media",
			"title" => "Video media list",
			"icon" => "fa fa-video-camera",
			"path" => "media",
			"module" => "media",
			"sub" => array(
					array(
						"name" => "Videos",
						"title" => "Video media list",
						"icon" => "glyphicon glyphicon-film",
						"path" => "media",
						"module" => "media",
						"badge" => "total_media",
					),
					array(
						"name" => "Folders",
						"title" => "Video media list",
						"icon" => "fa fa-folder-open",
						"path" => "media/folder",
						"module" => "media",
						"sub" => array( 
							array( "module" => "media", "funct" => array( "media_folders", "data_media_folder"), ), 
							),
					),
				),
		),
		array(
			"name" => "Playlist",
			"title" => "Video playlist",
			"icon" => "fa fa-list",
			"path" => "playlist",
			"module" => "playlist",
			"sub" => array(
					array(
						"name" => "All Playlist",
						"title" => "Video playlist",
						"icon" => "glyphicon glyphicon-film",
						"path" => "playlist",
						"module" => "playlist",
					),
					array( "module" => "playlist", "funct" => array( "media_playlists", "data_media_playlist", ), ),
				),
		),
		array(
			"name" => "Geo Restriction",
			"title" => "Video geo restriction",
			"icon" => "fa fa-globe",
			"path" => "georestrict",
			"module" => "georestrict",
			"sub" => array(
					array(
						"name" => "All Geo",
						"title" => "Geo permissions list",
						"icon" => "fa fa-globe",
						"path" => "georestrict",
						"module" => "georestrict",
					),
					array( "module" => "georestricts", "funct" => array( "georestricts", "data_georestrict", ), ),
				),
		),
		array(
			"name" => "Ads",
			"title" => "Video advertisement",
			"icon" => "fa fa-bullhorn",
			"path" => "ads",
			"module" => "ads",
		),
		array(
			"name" => "Channel Video",
			"title" => "Channel Video",
			"icon" => "fa fa-youtube-play",
			"path" => "video",
			"module" => "video",
			"sub" => array(
					array(
						"name" => "Headline",
						"title" => "Channel video headline",
						"icon" => "fa fa-dot-circle-o",
						"path" => "video/headline",
						"module" => "video",
					),
				),
		),
		array(
			"name" => "Channel TV",
			"title" => "Channel TV",
			"icon" => "fa fa-desktop",
			"path" => "tv",
			"module" => "tv",
			"sub" => array(
					array(
						"name" => "Headline",
						"title" => "Channel TV headline",
						"icon" => "fa fa-dot-circle-o",
						"path" => "tv/headline",
						"module" => "tv",
					),
				),
		),
		array(
			"name" => "Channel Foto",
			"title" => "Channel Foto",
			"icon" => "fa fa-camera-retro",
			"path" => "foto",
			"module" => "foto",
			"sub" => array(
					array(
						"name" => "Headline",
						"title" => "Channel foto headline",
						"icon" => "fa fa-dot-circle-o",
						"path" => "foto/headline",
						"module" => "foto",
					),
				),
		),
		array(
			"name" => "360",
			"title" => "Galery 360",
			"icon" => "fa fa-refresh",
			"path" => "threesixty",
			"module" => "threesixty",
			"sub" => array(
					array(
						"name" => "Headline",
						"title" => "Galery 360",
						"icon" => "fa fa-dot-circle-o",
						"path" => "threesixty/headline",
						"module" => "threesixty",
					),
				),
		),
	);

$config['admintool_menu'] = array(
		array( "name" => "Profiles", "title" => "Profiles", "icon" => "fa fa-university", "path" => "admintools/profiles", "badge" => "total_profile", ),
		array( "name" => "Users", "title" => "User list", "icon" => "fa fa-users", "path" => "admintools/users", "badge" => "total_user", ),
		array( "name" => "divider", ),
		array( "name" => "Categories", "title" => "Categories", "icon" => "fa fa-th-large", "path" => "admintools/categories", "badge" => "total_category", ),
		array( "name" => "Video Renditions", "title" => "Video renditions", "icon" => "fa fa-tasks", "path" => "admintools/renditions", "badge" => "total_rendition", ),
		array( "name" => "divider", ),
		array( "name" => "Messages Center", "title" => "Messages center", "icon" => "fa fa-envelope", "path" => "admintools/messages", "badge" => "total_message", ),
		array( "name" => "Newsletters", "title" => "Newsletters", "icon" => "fa fa-newspaper-o", "path" =>"admintools/newsletter", "badge"=> "total_newsletter", ),
		array( "name" => "Schedules", "title" => "Schedules", "icon" => "fa fa-history", "path" => "admintools/schedules", "badge" => "total_schedule", ),
	);
