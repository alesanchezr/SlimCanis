<?php

namespace Entity;

class BaseEntity
{

	public function toArray()
	{
	    $result = array();
	    $methods = get_class_methods($this);
	    foreach($methods as $method) {
	        if ('get' == substr($method, 0, 3)) {
	            $result[substr($method, 3)] = $object->$method();
	        }
	    }
	    return $result;
	}

}


?>