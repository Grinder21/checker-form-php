<?php


if ($_SERVER["REQUEST_METHOD"]) {
        $name = json_decode($_POST['json'], 1);
        $pattern = '/\<a\s.*?\>(.*?)\<\/a\>/iums';
        echo preg_replace($pattern, '', $name);
        header('Content-Type: application/json');
}


