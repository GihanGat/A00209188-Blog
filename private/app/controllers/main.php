<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    /*
     * http://localhost/
     */
    function Index () {
        $this->view("template/header");
        $this->view("main/index");
        $this->view("template/footer");
    }

    function Other () {

        $this->view("template/header");
        $this->view("main/other");
        echo("<br><br><br>hello there");
        $this->view("template/footer");
        
    }

    function Article () {

        $this->view("template/header");
        $this->view("main/article");
        echo("<br><br><br>blog article");
        $this->view("template/footer");
      
    }

    function Home () {

        $this->view("template/header");
        $this->view("main/other");
        $this->view("main/home");
        echo("<br><br><br>Home page");
        $this->view("template/footer");
        
    }

}

?>