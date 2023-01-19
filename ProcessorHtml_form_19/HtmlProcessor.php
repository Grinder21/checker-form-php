<?php


if ($_SERVER["REQUEST_METHOD"]) {
        if (json_decode($_POST['json']) == '') {
            http_response_code(500);
        } else {
            header('Content-Type: application/json');
            $name = json_decode($_POST['json'], 1);
            $pattern = '/\<a\s.*?\>(.*?)\<\/a\>/iums';
            preg_replace($pattern, '', $name);
            // реализация curl
        }
}


