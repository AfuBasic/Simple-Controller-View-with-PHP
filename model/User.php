<?php

class User extends Model
{
	public function getUser()
	{
		return $this->select("Me");
	}
}