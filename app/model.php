<?php

class Model
{
    public $db;

    public function __construct()
    {
        $config = include "config.php";
        $config = (object) $config['database'];

        $this->db = new mysqli($config->host, $config->user, $config->pass, $config->db) or die($this->db->error);
    }
    
    if($limit != "") {
        $query .= " LIMIT ".$limit;
    }

    
    public function select_many($table, $where = '', $orderBy = '' )
    {
        $query = "SELECT * FROM ".$table." ";

        if($where != "") {
            $query .= " WHERE ".$where;
        }

        if($orderBy != "") {
            $query .= " ORDER BY ".$orderBy;
        }

        $query = $this->db->query($query)  or die($this->db->error);;

        $data = [];

        if($query->num_rows > 0) {
            while ($row = $query->fetch_object()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    public function select_one($table, $where) {
        $query = "SELECT * FROM ".$table. " WHERE ". $where;

        $query = $this->db->query($query) or die($this->db->error);

        if($query->num_rows > 0)
            return $query->fetch_object();

        return [];

    }

    public function insert($table, $data)
    {
        $query = "INSERT INTO ".$table."(";

        foreach($data as $key => $val) {
            $query .= $key.",";
        }

        $query = substr($query, 0, -1).") VALUES(";

        foreach($data as $value) {
            $query .= "'".$this->db->escape_string($value)."',";
        }

        $query = substr($query, 0, -1).")";

        $this->db->query($query)  or die($this->db->error);;

        return true;
    }
}
