<?php
    session_start();
    $error = [];
    if (! isset($_SESSION['sent'])) {
        $_SESSION['sent'] = 0;
    }

    if (isset($_FILES['photo']) && $_POST['form-checker'] && (!$error)) {
        try {
            $infoFormat = new SplFileInfo($_FILES['photo']['name']);
            $file = $_FILES['photo']['name'];
                if (($infoFormat == 'PNG' || $infoFormat == 'JPG') && (filesize($file <= 2048))) {
                $_SESSION['sent']++;
                $error['sent'] = 'ok';
                $path = 'C:/xampp/htdocs/session_php/images';
                mkdir($path, 0777, true);
                move_uploaded_file($_FILES['photo']['tmp_name'], './images' . $_FILES['photo']['name']);
                header('Location: http://localhost/session_php/images/' . $_FILES['photo']['name']);

            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
?>

<html>
<form method="post" action="send_photo.php" enctype="multipart/form-data">
    <input type="hidden" name="form-checker" value="1">
    <input type="file" name="photo">
    <input type="submit" value="Отправить файл">
</form>
</html>
