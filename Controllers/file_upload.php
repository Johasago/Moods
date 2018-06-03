<?php

class File_upload extends Controller {

    function __construct() {
        parent::__construct(); 
    }

    public function index() {
        $this->view->render('file_upload/index');
    }
    
      
        
    public static function uploadFile() {
$target_file = 'Movies.xml';
// Specifies the path of the file to be uploaded
$target_dir = 'Uploads/'.$target_file;//This is setting the destination of our upload;
// Specifies directory where file is going to be stored


$uploadOk = 1;

$FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Stores file extensions in lower case


// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000){
    echo nl2br ("Sorry, your file is too large." . PHP_EOL);
    $uploadOK = 0;
}

// Allow certain file formats
if($FileType != "xml"){
    echo nl2br ("Sorry, only .xml files are allowed.".PHP_EOL);
    $uploadOK = 0;
}

// Check if $uploadOK is set to 0 by an error
if($uploadOK = 0){
    echo nl2br ("Sorry, your file was not uploaded.".PHP_EOL);
} else{
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir)){
        echo nl2br ("The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded. Returning to homepage".PHP_EOL);
        header( "refresh:3; ../index" );
    } else {
        echo nl2br ("Sorry, there was an error uploading your file.".PHP_EOL);
        }
}
    }

    
    public function uploadImages() {
    
    // File upload configuration
    $targetDir = 'Images/';
    $allowTypes = array('jpg', 'jpeg');
    $max_file_size = 1024*100; //100kb
    $count = 0;
            
        //Loop $_FILES to execute all files
        foreach ($_FILES['files']['name'] as $f => $name) {
            if($_FILES['files']['error'][$f] == 4) {
                continue; //Skip file if error found
            }
            if ($_FILES['files']['error'][$f] == 0) {
                if ($_FILES['files']['size'][$f] > $max_file_size) {
                    $message[] = "$name is too large!";
                    continue; //Skip large files
                }
                if(!in_array(pathinfo($name, PATHINFO_EXTENSION), $allowTypes)) {
                    $message[] = "$name is not a valid format"; 
                    continue; //skip invalid file format
                }
                else {//no error found. Move uploaded files to target directory
                    if(move_uploaded_file($_FILES['files']['tmp_name'][$f],$targetDir.$name))
                            $count++; //number of successfully uploaded files
                    echo "$name successfully uploaded.";
                            header( "refresh:3; ../index" );

                }
            }
    
    
    }
    }
    }
