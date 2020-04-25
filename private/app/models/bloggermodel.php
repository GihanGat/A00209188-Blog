<?php

class BloggerModel extends Model{

    function __construct(){
        parent::__construct();
    }

    function authenticateBlogger($name, $password){
            $cl_name = htmlentities($name);
            $cl_passwd = htmlentities($password);
            print_r($this->db);
            $sql = "SELECT `passwd_hash`, `first_name`, `last_name` FROM `authors` WHERE email = ?";
            print_r($sql);
            $exec_stmt = $this->db->prepare($sql);
            $results = $exec_stmt->execute(Array($cl_name));
            $row = $exec_stmt->fetch();
            $passwd_hash = $row[2];
            $is_authorised = FALSE;

            if(isset($passwd_hash)){
                  $is_authorised = password_verify($cl_passwd,$passwd_hash);
                  if($is_authorised){
                    $_SESSION[`firstname`] = $row[0];
                    $_SESSION[`lastname`]  = $row[1];
                    $_SESSION[`loginname`] = $cl_name;

                    $update_sql = "UPDATE  `authors` SET 'last_login' = CURRENT_TIMESTAMP() WHERE `email` = ?";
                    $update_stmt = $this->db->prepare($update_sql);
                    $update_stmt->execute(Array($cl_name));
                  }else{

                }          
            }
    }

    function createAuthor($email,$password,$display_name ,$first_name ,$last_name , $intro ,$profile){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO authors (email, passwd_hash, display_name, first_name , last_name , intro , profile) values (?, ?, ?, ?, ?,?,?)";

        $stmt = $this->db->prepare($sql);
        $results = $stmt->execute(Array($email,$password_hash,$display_name ,$first_name ,$last_name , $intro ,$profile));

        $success = false;
        if ($results)
        {
            $success = true;
        }
        return $success;
    }
}

?>