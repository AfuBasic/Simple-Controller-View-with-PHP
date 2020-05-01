<?php 

class Model
{
	public $db;

	public function __construct()
	{
		$config = include "config.php";
		$config = (object) $config['database'];
		$this->db = new mysqli($config->host, $config->user, $config->pass, $config->db);
	}

	public function select_many($table, $where = '', $orderBy = '', )
	{
		$query = "SELECT * FROM ".$table." ";

		if($where != "") {
			$query .= $where;
		}

		$query = $this->con($query);

		$data = [];

		if($query->num_rows > 0) {
			while ($row = $query->fetch_object()) {
				$data[] = $row;
			}
		}

		return $data;
	}

	public function select_one($table, $where) {
		$query = "SELECT * FROM ".$table. " ". $where;

		$query = $this->con->query($query);

		return $query->fetch_object();

	}
}