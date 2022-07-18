<?php
include ('Database/db.con.php');
$statusMsg = '';
$targetDir = "uploads/";
$fileName = basename(@$_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
   
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
     
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            
            if($result){
                echo "<script>
                    alert('Upload ຮູບພາບສຳເລັດ');
                    window.location.href='index.php';
                    </script>";
            }else{
                echo "File upload failed, please try again.";
            } 
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}
?>