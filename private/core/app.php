<?php

    class App {

        private $config = [];

        public $db;

        function __construct () {

            define("URI", $_SERVER['REQUEST_URI']);
            define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "\cmp-blog-master");

        }

        function configure() {
            // require(ROOT . "/private/core/config/database.php");
            require(ROOT . "/private/core/config/database.php");

            //print_r($this->config["database"]["username"].":".$this->config["database"]["password"]);

            if (isset($this->config["database"])) {
                try {
                    $this->db = new PDO($this->config["database"]["driver"] .
                        ":host=" . $this->config["database"]["dbhost"] .
                        ";dbname=" . $this->config["database"]["dbname"]
                        , $this->config["database"]["username"]
                        , $this->config["database"]["password"]);
                } catch(PDOException $ex) {
                    echo($ex->getMessage());
                }
            }
        }

        function load () {
            spl_autoload_register(function ($class) {

                $class = strtolower($class);
                if (file_exists(ROOT . "/private/core/classes/$class.php")) {

                    require_once(ROOT . "/private/core/classes/$class.php");

                } else if (file_exists(ROOT . "/private/core/helpers/$class.php")) {

                    require_once(ROOT . "/private/core/helpers/$class.php");

                }

            });
            
        }

        function require ($path) {
            require (ROOT . $path);
        }

        function start () {
            $route = explode('/', URI);

            $route[1] = strtolower($route[1]);
            session_start();
//            print_r($route[1]);
//            print_r("<br><br>");
//            print_r($route[3]);
//            print_r("<br><br>");
            //require(ROOT . "/setup/install.php");
            //$installer = new Installer();
           // alert($route[3]);
            $this->configure();

            if (file_exists(ROOT . "/private/app/controllers/" . $route[1] . ".php")) {
                $this->require("/private/app/controllers/" . $route[1] . ".php");
                $controller = new $route[1]();

            } else {
                print_r('executing main');
                $this->require("/private/app/controllers/main.php");
                $main = new Main();
            }
        }
    }
?>