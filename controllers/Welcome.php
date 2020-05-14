<?php 

class Welcome extends Controller
{
	public function index()
	{
		return $this->view('site/welcome');
	}
}