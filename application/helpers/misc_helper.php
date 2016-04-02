<?php  

/**
 * @package    studio_hub / 2015
 * @author     Alikuro, Alnol, Sabbana
 * @copyright  PT. Kompas Cyber Media
 * @version    1.0
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function UR_exists($url){
	if($url != ''){
		$headers=get_headers($url);
		return stripos($headers[0],"200 OK")?true:false;
	}else
		return false;
}

function image_url($url){
	if(UR_exists($url))
		$img = $url;
	else if($url == '')
		$img = site_url().'assets/img/default.jpg';
	else
		$img = site_url().'assets/img/default.jpg';
	return $img;
}

function generatePassword($length, $strength){
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength & 1)
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    if ($strength & 2) 
        $vowels .= "AEUY";
    if ($strength & 4) 
        $consonants .= '23456789';
    if ($strength & 8) 
        $consonants .= '@#$%';

    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++){
        if ($alt == 1){
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        }else{
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}
function headline($txt){
	$str = strip_tags($txt);
	return substr($str, 0, 200);
}

function generate_code_member($count){
	$count = sprintf("%04d",$count);
	$string = 'IBF'.date('Y').$count;
	return $string;
}

function label_privilage($uid, $app_id, $priv){
	switch($priv){
		case 0 : $label = '<span class="badge badge-danger" data-toggle="modal" data-target="#modalPriv" style="cursor:pointer" onclick="return privilage(\''.$app_id.'#'.$uid.'#'.$priv.'\')">B</span>'; break;
		case 1 : $label = '<span class="badge badge-success" data-toggle="modal" data-target="#modalPriv" style="cursor:pointer"  onclick="return privilage(\''.$app_id.'#'.$uid.'#'.$priv.'\')">U</span>'; break;
		case 2 : $label = '<span class="badge badge-warning" data-toggle="modal" data-target="#modalPriv" style="cursor:pointer" onclick="return privilage(\''.$app_id.'#'.$uid.'#'.$priv.'\')">R</span>'; break;
		case 3 : $label = '<span class="badge badge-primary" data-toggle="modal" data-target="#modalPriv" style="cursor:pointer" onclick="return privilage(\''.$app_id.'#'.$uid.'#'.$priv.'\')">A</span>'; break;
	}
	return $label;
}

?>