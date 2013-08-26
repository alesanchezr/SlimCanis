<?php

class CanisUser
{
	var $id;
	var $name;
	var $status;
	var $locationId;
	var $roleId;
	var $roleName;

	public function CanisUser($id, $name="anonymus",$locationId="none",$roleName='invalid')
	{
		$this->id   = $id;
		$this->roleName   = $roleName;
		$this->locationId = $locationId;
		$this->name       = $name;
		$this->status     = 'invalid';
		$this->roleId   = -1;
	}

	public function isValid()
	{
		return !($this->status=='invalid');
	}

}


?>