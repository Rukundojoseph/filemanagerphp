<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if($_SERVER["REQUEST_METHOD"] == "POST"){
$file = $_FILES['file'];
$filetmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileterror= $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt =  explode('/' , $fileType );
$fileActualExt =  strtolower( end($fileExt) );
$allowed = array('jpg', 'jpeg', 'png');
echo $fileActualExt;
if( in_array($fileActualExt, $allowed) ){
if($fileterror === 0){

    if($fileSize < 1000000){
        $filenameNew =  uniqid('', true) . "." . $fileActualExt;
        $filedestination = '/uploads' .  $filenameNew;
        move_uploaded_file($filetmpName ,  $filedestination);
        echo "your file has been uploaded";

    }else{
        echo "your file is too big";
    }

}else{
    echo "there has been an error uploading yout file";
}

}else{
    echo "you can not ipload files of this type";
}

}
else{ 
    echo "no submit found ";
}