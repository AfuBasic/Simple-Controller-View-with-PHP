<?php

class Welcome extends Controller
{

	public function index()
	{
		$this->isGuest();
		$data = [
			'title'	=> 'Welcome to the Sender Application'
		];
		$this->view('site/welcome');
	}

	public function login()
	{
		$data = ['title'=> 'Login to the Sender Application'];

		$this->view('auth/login');
	}
}