<?php

class Utils
{
    public static function renderResult($data)
    {
		return array(
				    "success"  => true, 
				    "response" => $data
				);
    }

    public static function renderFault($message)
    {
		return array(
				    "success"  => "false", 
				    "response" => array(
				    	"message" => $message
				    	)
				);
    }
}


