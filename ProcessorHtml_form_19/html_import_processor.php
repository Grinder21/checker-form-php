<html>
<head>
</head>
<body>
<form action="html_import_processor.php" method="POST">
    <label for="enter-text">Ссылка веб-ресурса: </label>
    <input type="text" name="enter-url">
    <input type="submit" value="Отправить адрес">
</form>
</body>
</html>

<?php


$siteUrl = $_POST["enter-url"];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $siteUrl);
curl_setopt($curl, CURLOPT_HTTPGET, 80);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_PORT, 443);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$array_to_json = array('raw_text' => curl_exec($curl));
$json = json_encode($array_to_json);

curl_close($curl);

$curl = curl_init();
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
curl_setopt($curl, CURLOPT_URL, '/localhost/HtmlProcessor.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_exec($curl);

curl_close($curl);

var_dump($array_to_json);
var_dump($_POST);
var_dump($json);