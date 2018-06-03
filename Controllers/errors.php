<?php

class Errors extends Controller {

    function __construct() {
        parent::__construct();
        
        
       //testing if view and controllers are working
       //  echo "error";
        
    }
    
     function index(){
        $this->view->msg = 'this page does not exist';
        $this->view->render('errors/index');
    }
    
    

}

?>