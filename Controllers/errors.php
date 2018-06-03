<?php

class Errors extends Controller {

    function __construct() {
        parent::__construct();
        
        
    }
    
     function index(){
        $this->view->msg = 'Uh oh, something went wrong! <br> This page does not exist. <br> Please go back to the main page';
        $this->view->render('errors/index');
    }
    
    

}

?>