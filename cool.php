<?php

include 'country/index.php';

// header('Content-Type: application/json');


if (isVietNamIp(nil)) {
    # code...
    $str = file_get_contents('coolApp_vi.html');


} else{
    # code...
    $str = file_get_contents('coolApp.html');
}

echo "$str";

?>