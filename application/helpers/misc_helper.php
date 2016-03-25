<?php  

/**
 * @package    studio_hub / 2015
 * @author     Alikuro, Alnol, Sabbana
 * @copyright  PT. Kompas Cyber Media
 * @version    1.0
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function image_url($url){
	if(file_exists($url))
		$img = $url;
	else $img = site_url().'assets/img/default.png';
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


    echo generatePassword(6,4);
?>