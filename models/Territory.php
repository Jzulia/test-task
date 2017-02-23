<?php

class Territory {

    public $ter_id;
    public $ter_pid;
    public $address;
    public $ter_level;
    public $ter_type_id;
    public $reg_id;
    

    public function __construct($ter_id = null, $address = null, $ter_level = null, $reg_id = null, $ter_pid = null, $ter_type_id = null) {

        $this->ter_id = $ter_id;
        $this->address = $address;
        $this->ter_level = $ter_level;
        $this->reg_id = $reg_id;
        $this->ter_pid = $ter_pid;
        $this->ter_type_id = $ter_type_id;
        
        
        
    }

    /**
     * 
     * @param  $ter_level
     * @param  $reg_id
     * @param  $ter_type_id
     * @return \Territory
     */
    public function selectTerritory($ter_level, $reg_id = null, $ter_pid = null) {

        $db = Db::getInstance();

        if (gettype($ter_level) == 'integer') {
            
            $where = "where ter_level = '$ter_level'";
            
        } else {
            
            $where = "where ter_level $ter_level";
            
        }
        
        if ($reg_id) {
            $where .= " AND reg_id = '$reg_id' ";
        }
        
         if ($ter_pid) {
            $where .= " AND ter_pid = '$ter_pid'";
         }
      

        $req = $db->query("SELECT * FROM t_koatuu_tree $where");
        
        $list = [];

        foreach ($req->fetchAll() as $row) {

            $list[] = new Territory($row['ter_id'], $row['ter_address'], $row['ter_level'], $row['reg_id'], $row['ter_pid'], $row['ter_type_id']);
        }

        return $list;
        
    }

}
