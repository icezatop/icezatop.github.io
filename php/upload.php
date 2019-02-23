<?php
    $upload = "";
    $filename = $_FILES['file']['name'];
    $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadfile = "";
        if(strpos($filename, '.jpg')){
            $uploadfile = $upload . "photo.jpg";
        }
        if(strpos($filename, '.csv')){
            $uploadfile = $upload . "file.csv";
        }
        if(strpos($filename, '.png')){
            $uploadfile = $upload . "photo.png";
        }
        if(move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)){
            echo "Complete";
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Back</a>
</body>
</html>