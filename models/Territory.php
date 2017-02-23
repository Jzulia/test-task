<?php

class Territory {

    public $id;
    public $address;
    public $ter_level;
    public $reg_id;
    public $ter_id;

    public function __construct($id = null, $address = null, $ter_level = null, $reg_id = null, $ter_id = null) {

        $this->id = $id;
        $this->address = $address;
        $this->ter_level = $ter_level;
        $this->reg_id = $reg_id;
        $this->ter_id = $ter_id;
        
    }

    /**
     * 
     * @param  $ter_level
     * @param  $reg_id
     * @param  $ter_type_id
     * @return \Territory
     */
    public function selectTerritory($ter_level, $reg_id = null, $ter_type_id = null) {

        $db = Db::getInstance();

        $where = "where ter_level = '$ter_level'";

        if ($reg_id) {
            $where .= " AND reg_id = '$reg_id' ";
        }

        if ($ter_type_id) {
            $where .= " AND ter_type_id = '$ter_type_id'";
        }

        $req = $db->query("SELECT * FROM t_koatuu_tree $where");

        $list = [];

        foreach ($req->fetchAll() as $row) {

            $list[] = new Territory($row['ter_id'], $row['ter_address'], $row['ter_level'], $row['reg_id'], $row['ter_id']);
        }

        return $list;
        
    }

}
