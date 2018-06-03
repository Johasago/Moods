<?php

class Model {

    function __construct() {
        
    }

     public function uploadFile() {
$target_file = 'Movies.xml';
// Specifies the file where the data will be saved. If it doesn't exist, it will be created. If it already exists, it will be overwritten.
// Regardless of what the user calls the file, it will be saved as Movies.xml
$target_dir = 'Uploads/'.$target_file;
// Specifies directory where file is going to be stored


$uploadOk = 1;

$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Stores file extensions in lower case


// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000){
    echo nl2br ("Sorry, your file is too large." . PHP_EOL);
    $uploadOK = 0;
}

// Allow only xml file formats
if($FileType != "xml"){
    echo nl2br ("Sorry, only .xml files are allowed.".PHP_EOL);
    $uploadOK = 0;
}

// Check if $uploadOK is set to 0 by an error
if($uploadOK = 0){
    echo nl2br ("Sorry, your file was not uploaded.".PHP_EOL);
} else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)){
        echo nl2br ("The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded. <br> Returning to homepage...".PHP_EOL);
        header( "refresh:3; ../index" );
    } else {
        echo nl2br ("Sorry, there was an error uploading your file.".PHP_EOL);
        }
}
    }
    
    public function uploadImages(){
    // File upload configuration
    $targetDir = 'Images/';
    $allowTypes = array('jpg', 'jpeg');
    $count = 0;
            
        //Loop $_FILES to execute all files
        foreach ($_FILES['files']['name'] as $f => $name) {
            if($_FILES['files']['error'][$f] == 4) {
                continue; //Skip file if error found
            }
           
                if(!in_array(pathinfo($name, PATHINFO_EXTENSION), $allowTypes)) {
                    echo "$name is not a valid format"; 
                    continue; //skip invalid file format
                }
                else {//no error found. Move uploaded files to target directory
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$f],$targetDir.$name))
                            $count++; //number of successfully uploaded files
                    echo "$name successfully uploaded.<br>";
                          
                            header( "refresh:3; ../index" );

                }
            }
    
    
    }
}

