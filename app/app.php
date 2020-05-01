<?php

class App
{	
	protected $config;

	public function __construct($config) {
		$this->config = (object) $config;
	}

	public function load(){

		$path = isset($_GET['page']) ? $_GET['page'] : $this->config->default_route;

		$data = [];

		$path = explode("/", $path);
		

		if(isset($path[0])) {
			$data['controller'] = $path[0];
		}

		unset($path[0]);

		if(isset($path[1])) {
			$data['method']		= $path[1];
		} else {
			$data['method']		= "index";
		}

		unset($path[1]);

		$data['args'] = $path;

		return $data;

	}

	public function dd($data)
	{
		echo json_encode($data);
		exit;
	}


	public function run()
	{
		$data = $this->load();


		include "Controller.php";

		$class = ucfirst($data['controller']);

		include "controllers/".$class.".php";

		$class = new $class;

		call_user_func_array([$class, $data['method']], $data['args']);

	}


}
