<?php

/**
 * Step 1: Instantiate a Doctrine instance
 */

require_once "bootstrap.php";

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */

require_once "slim-bootstrap.php";



require_once "src/com/4geeks/routes/Sesiones.routes.php";
require_once "src/com/4geeks/routes/Base.routes.php";

$rootUri = $app->request()->getResourceUri();
$url = explode('/', trim($rootUri, '/'));
$first_segment = "";
if(count($url)>=0) $first_segment = $url[0];

require_once "src/com/4geeks/routes/".ucfirst($first_segment).'.routes.php';


/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();