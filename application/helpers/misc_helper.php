<?php  

/**
 * @package    studio_hub / 2015
 * @author     Alikuro, Alnol, Sabbana
 * @copyright  PT. Kompas Cyber Media
 * @version    1.0
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function create_refid($ref='') {
    if(empty($ref)) $ref = time();
    $salt = md5($ref);
    return $ref."-".substr($salt,11,4)."-".substr($salt,15,4)."-".substr($salt,19,1).mt_rand(111,999);
}

function duration_time($time) {
    $res = '';
    if($time>=3600)
        $res = sprintf("%02d",floor($time/3600));
    if(($time%3600) > 0)
        $res .= ':'.sprintf("%02d",floor(($time%3600)/60));
    if((($time%3600)%60) > 0)
        $res .= ':'.sprintf("%02d",(($time%3600)%60));
    $res =preg_replace("/^:/", '', $res);
    return $res;
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