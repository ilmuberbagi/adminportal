<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function asset_url($path = NULL){
    //Local Server
	return $path == "" ? base_url() : base_url().preg_replace("/^\//","",$path);
}

function assets_url($path = NULL){
    //Local Server
	return $path == "" ? base_url().'assets/' : base_url().'assets/'.preg_replace("/^\//","",$path);
	
	//Assets Server
	//return $path == "" ? 'http://assets.kompas.com/data/2015/kompascom/studio_hub/' : 'http://assets.kompas.com/data/2015/kompascom/studio_hub/'.preg_replace("/^\//","",$path);
}

function js_url($path = '') {
    return assets_url("js/" . (empty($path) ? '' : "/" . preg_replace("/^\//", "", $path)));
}

function css_url($path = '') {
    return assets_url("css/" . (empty($path) ? '' : "/" . preg_replace("/^\//", "", $path)));
}

function newsletter_uri($url_source, $id, $name){
	$url = base_url().'home/'.$id.'.'.strtolower(str_replace(' ','.',$name));
	$pattern = "/http:\/\//";
	if (preg_match($pattern, $url_source)){
		return $url_source;
	}else{
		return $url;
	}
}