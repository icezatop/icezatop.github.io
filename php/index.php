<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
          body{
              background-color:#FFFAF0;
          }
          p{
              color:#A52A2A;
          }
    </style>
</head>
<body>
<center>
</br>
<p style="font-size:50px;">
            Welcome to My php...
</p>
</br>
<form action="#" method="post" enctype="multipart/form-data">
        Select file : *photo only .png  
        <input type="file" name="file" id="file"><br>
        <input type="submit" value="Upload" name="submit2">
</form>
</br>
        <form method="post" action="#" class="form-group" id = "add"> 
            <Label class="name-Label">name :</Label> 
            <input type="text" name ="name" placeholder="name" class="input_name"><br>
            <Label class="city-Label">city :</Label> 
            <input type="text" name ="city" placeholder="city" class="input_city"><br>
            <Label class="people-Label">people :</Label> 
            <input type="text" name ="people" placeholder="people" class="input_people"><br>
            <button type="submit" name="submit" class="btn-add">Add</button>
        </form> 
<?php
    if (isset($_POST['submit'])){
        $handle = fopen("file.csv", "a");
         $line = array(($_POST['name']),($_POST['city']),($_POST['people']));
         fputcsv($handle, $line);
        fclose($handle);
    }
?>
<?php
    if (isset($_POST['submit2'])){
         $upload = "";
         $filename = $_FILES['file']['name'];
         $imageFileType = pathinfo($filename, PATHINFO_EXTENSION);
        $uploadfile = "";
        if(strpos($filename, '.csv')){
            $uploadfile = $upload . "file.csv";
        }
        if(strpos($filename, '.png')){
            $uploadfile = $upload . "photo.png";
        }
        if(move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)){
            echo " ";
        }
    }
?>
<br>

<?php
$objCSV = fopen("file.csv", "r");
?>
<table width="600" border="1" style="color:#000080">
<tr>
<th width="91"> <div align="center">Name </div></th>
<th width="98"> <div align="center">city </div></th>
<th width="98"> <div align="center">People </div></th>
</tr>
<?php
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
?>
<tr>
<td><div align="center"><?php echo $objArr[0];?></div></td>
<td><div align="center"><?php echo $objArr[1];?></td>
<td><div align="center"><?php echo $objArr[2];?></td>
</tr>
<?php
}
fclose($objCSV);
?>
</table>
</br>
<form method ="post" >
    <input type="submit" value = "download" name = "Download">
</form>
</br>
<img src="photo.PNG" alt="photo">
<?php
    
    if(isset($_POST['Download'])){
        header('Location: file.csv');
    }
?>

</center>
</body>
</html>