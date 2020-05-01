<?php 

class Controller
{
	protected $config;

	public function __construct()
	{
		$this->config = (object)include "config.php";
	}

	public function url($route)
	{
		return $this->config->base_url."/".$route;
	}

	public function view($page, $data = [])
	{
		$app = $this;
		include $this->config->base_dir."/views/".$page.".php";
	}

	public function redirect($url)
	{
		echo "<script>window.location='".$this->url($url)."'</script>";
	}

	public function isGuest()
	{
		if(!isset($_SESSION['user'])) 
			$this->redirect('welcome/login');
	}


	public function setSession($data = [] ) {
		if(!empty($data) && is_array($data)) {
			foreach($data as $key => $value) {
				$_SESSION[$key] = $value;
			}
		}
	}

	public function deleteSession($key) {
		unset($_SESSION[$key]);
	}


	public function loadModel($model) {
		include "model.php";

		$model = ucfirst($model);
		include "model/".$model.".php";

		return new $model();
	}
}