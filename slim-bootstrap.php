<?php

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Slim\Slim(array(
    'debug' => true
));
$app->view(new \JsonApiView());
$app->add(new \JsonApiMiddleware());

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'myappsecret')));

$authenticate = function ($app) {
    return function () use ($app) {
        if (!isset($_SESSION['user']) || $_SESSION['user']=='') {
            //$app->flash('error', 'Login required');
            $app->render(404,array(
                'error' => false,
                'msg'   => 'You need to login.',
            ));
        }
    };
};