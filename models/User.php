<?php

class User {

    public $id;
    public $name;
    public $email;
    public $territory;

    public function __construct($name = null, $email = null, $territory = null, $id = null) {

        $this->name = $name;
        $this->email = $email;
        $this->territory = $territory;
        $this->id = $id;
        
    }

    public function save() {

        $db = Db::getInstance();
        $req = $db->query("INSERT INTO users (name, email, territory) VALUES ('$this->name', '$this->email', '$this->territory')");
    }

    /**
     * @param $email
     * @return boolean
     */
    public function select($email) {

        $db = Db::getInstance();

        $req = $db->query("SELECT users.name, users.email, users.id, t_koatuu_tree.ter_address as territory "
                . "FROM users inner join t_koatuu_tree on users.territory = t_koatuu_tree.ter_id where email = '$email'");

        $row = $req->fetch();
        if (empty($row)){      
            return false;
        }

        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->territory = $row['territory'];
        $this->id = $row['id'];

        return true;
        
    }

}
