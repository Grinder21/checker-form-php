<?php


if ($_SERVER["REQUEST_METHOD"]) {
        if (json_decode($_POST['json']) == '') {
            http_response_code(500);
        } else {
            $name = json_decode($_POST['json'], 1);
            $pattern = '/\<a\s.*?\>(.*?)\<\/a\>/iums';
            echo preg_replace($pattern, '', $name);
            header('Content-Type: application/json');
        }
}


