<?php

class File_upload extends Controller {

    function __construct() {
        parent::__construct(); 
    }

    public function index() {
        $this->view->render('file_upload/index');
    }
    
      
    //Calls function from model    
    public function uploadFile() {
       $model = new Model();
       $model->uploadFile();
    }

    
    public function uploadImages() {
    
        $model = new Model();
        $model->uploadImages();
    }
    
}