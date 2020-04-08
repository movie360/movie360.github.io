<?php

include 'bits.php';

$myIp = "118.70.128.21";


 function isVietNamIp($ip)
 {
 	# code...

 	if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }

 	$vietnam = false;   
	$data = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/movie360/country/vietnam.txt');
	$ips = explode("\n", $data);

	// echo $ips;

	foreach ($ips as $range) {
	    $range = trim($range);
	    $range = str_replace('#', '/', $range);
	  
	    $ok = ip_in_range($ip, $range);
	    if ($ok) {
	        $vietnam = true;
	        break;
	    }
	}

	/*
	if ($vietnam == true ) {

	    echo "VN";

	} else {

	    echo "not VN";

	}
	*/
	

	return $vietnam;
 }


// isVietNamIp("212.58.246.79");
