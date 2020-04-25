<?php
class Installer{
    function dbconfigure() {
        // require(ROOT . "/private/core/config/database.php");
        require(ROOT . "/private/core/config/database.php");
    }

    function dbinstall(){
        if (isset($this->config["database"])) {
            try {
                $this->db = new PDO($this->config["database"]["driver"] .
                    ":host=" . $this->config["database"]["dbhost"] .
                    ";dbname=" . $this->config["database"]["dbname"]
                    , $this->config["database"]["username"]
                    , $this->config["database"]["password"]);

                    $sql = file_get_contents(ROOT . "\setup\init.sql");
                    //echo($sql);
                    $this->db->exec($sql);
                    echo("Detabase has been setup");
            } catch(PDOException $ex) {
                echo($ex->getMessage);
            }
        }
    }

}

$installer = new Installer();
$installer->dbconfigure();
$installer->dbinstall();
?>