<html>
<head>
</head>
<body>
<form action="HtmlProcessor.php" method="POST">
    <label for="enter-text">Ссылка веб-ресурса: </label>
    <input type="text" name="enter-url">
    <input type="submit" value="Отправить адрес">
</form>
</body>
</html>

<?php
$siteUrl = $_POST["enter-url"];
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $_POST[$siteUrl]);
curl_setopt($curl, CURLOPT_HTTPGET, 80);
curl_setopt($curl, CURLOPT_PORT, 443);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$array_to_json = array('raw_text' => curl_exec($curl));
$json = json_encode($array_to_json);
curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

var_dump($array_to_json);
var_dump($_POST);
var_dump($json);