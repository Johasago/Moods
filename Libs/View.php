<?php

class View {

    function __construct() {
        //echo "this is the view <br>";
    }

    public function render($name,  $objects = null) {
        require 'Views/Includes/Head_section.php';
        require 'Views/' . $name . '.php';
    }

}
